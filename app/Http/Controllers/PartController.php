<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use App\Http\Requests\StorePartRequest;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::latest()->get();

        return view('part.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('part.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartRequest $request)
    {
        $formData = $request->all();
        $formData['price'] = $formData['price'] * 100;
        Part::create($formData);
        
        return back()->with('success', 'Dodano nową część serwisową');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('part.edit', ['part' => Part::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePartRequest $request, $id)
    {
        $formData = $request->all();
        $formData['price'] = number_format($formData['price'], 2) * 100;
        $formData['price'] = (int)$formData['price'];
        Part::find($id)->update($formData);

        return back()->with('success', 'Zaktualizowano wybraną pozycję');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Part::destroy($id);

        return back()->with('success', 'Usunięto wybraną pozycję');
    }
}
