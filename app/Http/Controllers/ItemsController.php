<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Image;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$category = \App\Models\Category::find(2);
        foreach($category->itemsAll as $items) {

        }
        //dd($category->itemsAll);*/

        $items = \App\Models\Items::all()->sortBy('items');

        return view('items.index')->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required|max:50|unique:items,category_id',
            'title'=>'required|unique:items,title',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'sku'=>'required|unique:items,sku',

        ];
        $this->validate($request, $rules);

        $items = new \App\Models\Items;
        $items->category_id = $request->category_id;
        $items->title = $request->title;
        $items->description = $request->description;
        $items->price = $request->price;
        $items->quantity = $request->quantity;
        $items->sku = $request->sku;
        //save image
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('images/'. $filename);
            Image::make($image)->resize(800,400)->save($location);
            $items->image = $filename;
        }
        $items->save();

        Session::flash('success', 'A new item has been added to the database');
        return redirect()->route('items.index');
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
        $items = \App\Models\Items::find($id);

        if ($items != null) {
          return view('items.edit')->with('itemForm', $items);
            
        } else {
            Session::flash('error', $items->item.' not found!');           
            return redirect()->route('items.index');
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
        //dd($request);
        $rules = [
            'category_id' => 'required',
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'sku'=>'required',

        ];
        $this->validate($request, $rules);
        $item = \App\Models\Items::find($id);

        if ($item != null) {
            $item->category_id = $request->category_id;
            $item->title = $request->title;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->quantity = $request->quantity;
            $item->sku = $request->sku;
            //image
            if ($request->hasFile('featured_image')) {
                $image = $request->file('featured_image');
                $filename = time() . '.'. $image->getClientOriginalExtension();
                $location = public_path('images/'. $filename);
                Image::make($image)->resize(800,400)->save($location);
                $item->image = $filename;
            }
            $item->save();
            Session::flash('success', 'Item has been updated! ');
            
        } else {
            Session::flash('error', 'Item not found!');           
        }
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = \App\Models\Items::find($id);
        if ($item != null) {
            $item->delete();
            Session::flash('success', 'Item Number '. $item->id.' has been deleted! ');
            
        } else {
            Session::flash('error', 'Item Number '. $item->id.' not found!');           
        }
        return redirect()->route('items.index');
    }
}
