<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowInvoiceRequest;
use App\Models\Review;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Category;
use PDF;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        $company = Company::first();
        $reviews = Review::latest()->get();

        return view('frontend.index', compact('categories', 'company', 'reviews'));
    }

    /**
     * Search the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = $request->get('search');
        $invoices = Invoice::where('vin', 'LIKE', '%' . $data . '%')->get();

        if (count($invoices) == 0) return back()->with(['failure' => 'Brak wyników wyszukiwania dla:', 'old_search' => $data]);
        else {
            $company = Company::first();

            return view('frontend.search', compact('data', 'invoices', 'company'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Requests\ShowInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function show(ShowInvoiceRequest $request)
    {
        $data = $request->get('search');
        $company = Company::first();
        
        if($company->password_pdf !== $request->invoicePassword) return redirect()->back()->with('failure_invoicePassword', 'Podane hasło nie jest poprawne.');
        else {
            $invoices = Invoice::where('vin', 'LIKE', '%' . $data . '%')->get();
            foreach ($invoices as $key => $invoice) {
                $invoice->products = json_decode($invoice->products);
                $invoice->parts = json_decode($invoice->parts);
            }

            return view('frontend.show', compact('data', 'company', 'invoices'));
        }



        // else return view('category.show', compact('data', 'invoices', 'company'));
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

        $data['products'] = json_decode($data['products'], true);
        $data['parts'] = json_decode($data['parts'], true);

        $pdf = PDF::loadView('frontend.invoice.pdf', compact('company', 'data'));

        return $pdf->download('VAG_Autoserwis_' . $data->registration . '_' . $data->created_at->format('Y-m-d') . '.pdf');
    }
}
