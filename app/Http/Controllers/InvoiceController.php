<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\each;

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
        Invoice::create($formData);

        return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Invoice::findOrFail($id);
        dd(Invoice::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
