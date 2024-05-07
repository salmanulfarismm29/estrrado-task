<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\stock;
class VendorStockontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::id();

        $stocks = DB::table('stocks as s')
        ->join('products as p','p.id','s.product_id')
        ->select('s.id as id','product_id','s.stock as stock','p.product_name')
        ->where('p.vendor_id',$userid)
        ->get();

        return view('vendor.stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = Auth::id();

        $products = DB::table('products')->select('id','product_name')->where('vendor_id',$userid)->get();

        return view('vendor.stocks.create',compact('products'));
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

        return redirect()->route('vendor-stock.index')->with('success', 'Stock added successfully');
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
        $stock = stock::find($id);
        $stock->delete();
        return redirect()->back()->with('success', 'Product Delete');
    }
}
