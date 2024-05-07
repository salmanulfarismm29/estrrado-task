<?php

namespace App\Http\Controllers;

use App\Models\stock;
use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = DB::table('stocks as s')
        ->leftjoin('products as p','p.id','s.product_id')
        ->select('s.id as id','product_id','s.stock as stock','p.product_name')
        ->get();

        return view('admin.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('products')->select('id','product_name')->get();
        return view('admin.stocks.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'product' => 'required',
                'stock' => 'required',
            ],
            [
                'product.required' => 'Product name is required',
                'stock.required' => 'Stock is required',
            ]
        );

        $stock = new stock();
        $stock->product_id = $request->input('product');
        $stock->stock = $request->input('stock');
        $stock->save();

        return redirect()->route('stocks.index')->with('success', 'Stock added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(stock $stock)
    {
        $products = DB::table('products')->select('id','product_name')->get();

        return view('admin.stocks.edit', compact('products','stock'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock)
    {
        $request->validate(
            [
                'product' => 'required',
                'stock' => 'required',
            ],
            [
                'product.required' => 'Product name is required',
                'stock.required' => 'Stock is required',
            ]
        );

        $stock->product_id = $request->input('product');
        $stock->stock = $request->input('stock');
        $stock->save();

        return redirect()->route('stocks.index')->with('success', 'Stock added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock)
    {
        $stock->delete();
        return redirect()->back()->with('success', 'Product Delete');

    }
}
