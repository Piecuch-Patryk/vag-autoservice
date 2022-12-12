<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\each;

use App\Http\Requests\CreateInvoiceRequest;
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
        $formData['jobs'] = json_encode($formData['jobs']);
        $formData['parts'] = json_encode(($formData['parts']));
        $formData['amount'] = 0;

        foreach ($request->get('jobs')['price'] as $key => $value) $formData['amount'] += $value;
        foreach ($request->get('parts')['price'] as $key => $value) $formData['amount'] += $value;

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
        $invoice->update($request->all());

        return view('invoice.edit', ['invoice' => $invoice])->with('success', 'Dane zostały zaktualizowane pomyślnie');
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
