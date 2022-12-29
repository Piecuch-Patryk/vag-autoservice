<?php

namespace App\Http\Controllers;

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
            $categories = Category::orderBy('order', 'asc')->get();
            $company = Company::first();
            $reviews = Review::latest()->get();

            return view('frontend.search', compact('data', 'invoices', 'categories', 'company', 'reviews'));
        }
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

        $pdf = PDF::loadView('invoice.pdf', compact('company', 'data'));

        $pdf->get_canvas()->get_cpdf()->setEncryption($data->vin, $company->password_pdf);

        return $pdf->download('VAG_Autoserwis_' . $data->registration . '_' . $data->created_at->format('Y-m-d') . '.pdf');
    }
}
