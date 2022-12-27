<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index', ['categories' => Category::orderBy('order', 'asc')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $lastOrderNumber = Category::orderBy('order', 'desc')->limit(1)->get()->toArray()[0]['order'];
        Category::create([
            'catName' => $request->catName,
            'description' => $request->description ? $request->description : null,
            'order' => $lastOrderNumber + 1,
        ]);

        return redirect()->route('category.index')->with('success', 'Dodano nową kategorię');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $categories = Category::get();
        $company = Company::first();
        
        return view('category.show', compact('category', 'categories', 'company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::latest()->get();
        $category = Category::find($id);

        return view('category.edit', compact(['category', 'categories']));
    }

    /**
     * Show the form for editing the order.
     *
     * @return \Illuminate\Http\Response
     */
    public function editOrder()
    {
        $categories = Category::orderBy('order', 'asc')->get();

        return view('category.editOrder', compact(['categories', 'categories']));
    }

    /**
     * Update resource order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        foreach ($request->id as $key => $value) {
            Category::find($value)->update([
                'order' => $key + 1,
            ]);
        }

        return redirect()->route('category.index')->with('success', 'Zaktualizowano kolejność kategorii');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        Category::find($id)->update($request->all());

        return back()->with('success', 'Zaktualizowano kategorię');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        $categories = Category::orderBy('order', 'asc')->get();

        foreach ($categories as $key => $category) {
            $category->update([
                'order' => $key + 1,
            ]);
        }

        return back()->with('success', 'Usunięto wybraną kategorię');
    }
}
