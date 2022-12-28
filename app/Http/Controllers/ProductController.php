<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('product.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $categories = Category::latest()->get();
        $category_id = $id;

        return view('product.create', compact('categories', 'category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $formData = $request->all();
        $formData['price'] = $formData['price'] * 100;
        $category = Category::find($request->get('category_id'));
        Product::create($formData);

        return back()->with('success', 'Utworzono nowy produkt: ' . $request->get('proName') . ' w kategorii: ' . $category->catName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $formData = $request->all();
        $formData['price'] = $formData['price'] * 100;
        Product::find($id)->update($formData);

        return redirect()->route('product.index')->with('success', 'Pomyślnie zaktualizowano: ' . $request->get('proName'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return back()->with('success', 'Usunięto wybrany produkt');
    }
}
