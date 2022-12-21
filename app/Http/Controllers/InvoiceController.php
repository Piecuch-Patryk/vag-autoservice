<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Part;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\SearchInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::latest()->get();
        foreach ($invoices as $key => $invoice) {
            $invoice->products = json_decode($invoice->products);
            $invoice->parts = json_decode($invoice->parts);
        }

        return view('invoice.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastOrder = Invoice::orderBy('number', 'desc')->first();
        $products = Product::latest()->get();
        $parts = Part::latest()->get();

        if(!$lastOrder) $invoiceNumber = '10001';
        else $invoiceNumber = $lastOrder->number + 1;

        return view('invoice.create', compact('invoiceNumber', 'products', 'parts'));
    }

    private function prepareFormData($formData)
    {
        $formData['amount'] = 0;
        $formData['products'] = [];
        $formData['parts'] = [];

        foreach ($formData['custom']['product']['desc'] as $key => $value) {
            if($value != 0) {
                $formData['products'][$key]['desc'] = $value;
                $formData['products'][$key]['price'] = number_format($formData['custom']['product']['price'][$key] * 100, 0, '', '');
                $formData['amount'] += number_format($formData['custom']['product']['price'][$key] * 100, 0, '', '');
            }
        }

        foreach ($formData['custom']['part']['desc'] as $key => $value) {
            if($value != 0) {
                $formData['parts'][$key]['desc'] = $value;
                $formData['parts'][$key]['price'] = number_format($formData['custom']['part']['price'][$key] * 100, 0, '', '');
                $formData['amount'] += number_format($formData['custom']['part']['price'][$key] * 100, 0, '', '');
            }
        }

        unset($formData['custom']);
        unset($formData['select']);

        $formData['products'] = json_encode($formData['products']);
        $formData['parts'] = json_encode($formData['parts']);

        return $formData;
    }

    private function prepareOtherData($formData, $invoiceId)
    {
        $selectProducts = [];
        $selectParts = [];

        foreach ($formData['select']['product']['desc'] as $key => $value) {
            if($value != 0) {
                $selectProducts[$key]['product_id'] = $value;
                $selectProducts[$key]['invoice_id'] = $invoiceId;
                $selectProducts[$key]['qnty'] = $formData['select']['product']['qnty'][$key];
            }
        }

        foreach ($formData['select']['part']['desc'] as $key => $value) {
            if($value != 0) {
                $selectParts[$key]['part_id'] = $value;
                $selectParts[$key]['invoice_id'] = $invoiceId;
                $selectParts[$key]['qnty'] = $formData['select']['part']['qnty'][$key];
            }
        }

        return [
            'products' => $selectProducts,
            'parts' => $selectParts,
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $formData = $this->prepareFormData($request->all());
        $invoice = Invoice::create($formData);

        $otherData = $this->prepareOtherData($request->all(), $invoice->id);

        $invoice->products()->attach($otherData['products']);
        $invoice->parts()->attach($otherData['parts']);

        return redirect()->route('invoice.index')->with('success', 'Pomyślnie utworzono nowy rekord');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formData = Invoice::find($id);
        $formData['jobs'] = json_decode($formData['jobs'], true);
        $formData['parts'] = json_decode($formData['parts'], true);

        return view('invoice.edit', ['invoice' => $formData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, $id)
    {
        $formData = $request->validated();
        $formData['amount'] = 0;

        foreach ($formData['jobs']['price'] as $key => $value) {
            $price = (int)floatval($value * 100);
            $formData['jobs']['price'][$key] = $price;
            $formData['amount'] += $price;

            if($value == null) {
                unset($formData['jobs']['desc'][$key]);
                unset($formData['jobs']['price'][$key]);
            }
        }

        foreach ($formData['parts']['price'] as $key => $value) {
            $price = (int)floatval($value * 100);
            $formData['parts']['price'][$key] = $price;
            $formData['amount'] += $price;

            if($value == null) {
                unset($formData['parts']['desc'][$key]);
                unset($formData['parts']['price'][$key]);
            }
        }

        $formData['jobs'] = json_encode($formData['jobs']);
        $formData['parts'] = json_encode($formData['parts']);

        $invoice = Invoice::where('id', $id)->update($formData);

        return redirect()->route('invoice.edit', ['id' => $id, 'invoice' => $invoice])->with('success', 'Dane zostały zaktualizowane pomyślnie');
    }

    /**
     * Download specified resource
     * 
     * @param int $id
     * @return PDF $file
     */
    public function download($id)
    {
        $company = Company::first();
        $data = Invoice::find($id);
        $data['jobs'] = json_decode($data['jobs'], true);
        $data['parts'] = json_decode($data['parts'], true);
        $pdf = PDF::loadView('invoice.pdf', ['data' => $data, 'company' => $company]);
        
        return $pdf->download('VAG_Autoserwis_'. $data->registration . '_'. $data->created_at->format('Y-m-d') .'.pdf');
    }

    /**
     * Search specified resource
     * 
     * @param SearchInvoiceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchInvoiceRequest $request)
    {
        $data = $request->get('search');
        $invoices = Invoice::where('vin', 'LIKE', '%'.$data.'%')
            ->orWhere('number','like','%'.$data.'%')
            ->orWhere('registration','like','%'.$data.'%')
            ->get();

        if(!$invoices) return redirect()->back()->with(['failure' => 'Brak wyników wyszukiwania dla:', 'old_search' => $data]);

        foreach ($invoices as $key => $invoice) {
            $invoice->jobs = json_decode($invoice->jobs);
            $invoice->parts = json_decode($invoice->parts);
        }
        
        return view('invoice.index')->with(['invoices' => $invoices, 'search' => $data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::destroy($id);

        return redirect()->route('invoice.index')->with('success', 'Wybrany dokument został usunięty');
    }
}
