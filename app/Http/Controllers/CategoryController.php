<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Models\Category::all()->sortBy('category');
        //$categories = \App\Models\Category::find(2);
        //$categories = \App\Models\Category::where('category', '=', 'Marvel')->get();
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $rules = [
            'category' => 'required|max:50|unique:categories,category'
        ];
        $validator = $this->validate($request, $rules);

        $category = new \App\Models\Category;
        $category->category = $request->category;
        $category->save();

        Session::flash('success', 'A new category has been added to the database');
        return redirect()->route('categories.index');
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
        $category = \App\Models\Category::find($id);

        if ($category != null) {
          return view('categories.edit')->with('category', $category);
            
        } else {
            Session::flash('error', $category->category.' not found!');           
            return redirect()->route('categories.index');
        }
        
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
        $rules = [
            'category' => 'required|max:50|unique:categories,category,'.$id
        ];
        $validator = $this->validate($request, $rules);
        $category = \App\Models\Category::find($id);

        if ($category != null) {
            $category->category = $request->category;
            $category->save();
            Session::flash('success', $category->category.' has been updated! ');
            
        } else {
            Session::flash('error', $category->category.' not found!');           
        }
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = \App\Models\Category::find($id);
        if ($category != null) {
            $category->delete();
            Session::flash('success', $category->category.' has been deleted! ');
            
        } else {
            Session::flash('error', $category->category.' not found!');           
        }
        return redirect()->route('categories.index');
    }
}
