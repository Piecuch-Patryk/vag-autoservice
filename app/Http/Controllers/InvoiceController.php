<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Company;
use App\Models\Invoice;
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
            $invoice->jobs = json_decode($invoice->jobs);
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

        if(!$lastOrder) $invoiceNumber = '10001';
        else $invoiceNumber = $lastOrder->number + 1;

        return view('invoice.create', ['invoiceNumber' => $invoiceNumber]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateInvoiceRequest $request)
    {
        $formData = $request->all();
        $formData['amount'] = 0;

        foreach ($formData['jobs']['price'] as $key => $value) {
            $price = (int)floatval($value * 100);
            $formData['jobs']['price'][$key] = $price;
            $formData['amount'] += $price;
        }

        foreach ($formData['parts']['price'] as $key => $value) {
            $price = (int)floatval($value * 100);
            $formData['parts']['price'][$key] = $price;
            $formData['amount'] += $price;
        }

        $formData['jobs'] = json_encode($formData['jobs']);
        $formData['parts'] = json_encode($formData['parts']);

        Invoice::create($formData);

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

        $invoice = Invoice::find($id)->first();

        $formData = $request->all();
        $formData['amount'] = 0;

        foreach ($formData['jobs']['price'] as $key => $value) {
            $price = (int)floatval($value * 100);
            $formData['jobs']['price'][$key] = $price;
            $formData['amount'] += $price;
        }

        foreach ($formData['parts']['price'] as $key => $value) {
            $price = (int)floatval($value * 100);
            $formData['parts']['price'][$key] = $price;
            $formData['amount'] += $price;
        }

        $invoice->update($formData);

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
