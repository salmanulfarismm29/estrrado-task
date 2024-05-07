<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\product;
use Illuminate\Support\Facades\Storage;

use Image;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::id();
        $products = DB::table('products')->select('id', 'product_name', 'product_discription', 'product_image')->where('vendor_id',$userid)->get();

        return view('vendor.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.products.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::id();
        $request->validate(
            [
                'product_name' => 'required|max:100',
                'product_desc' => 'required|max:255',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:4000',
            ],
            [
                'product_name.required' => 'Product name is required',
                'product_name.max' => 'Product name maximum 100 characters',
                'product_desc.required' => 'Product discription is required',
                'product_desc.max' => 'Product discription maximum 255 characters',
            ]
        );

        $product = new product();
        $product->product_name = $request->input('product_name');
        $product->product_discription = $request->input('product_desc');

        if (!empty($request->file('image'))) {
            $fileName = time() . '_' . Str::random(5) . '.' . $request->file('image')->extension();
            $img = Image::make($request->file('image')->path());
            $img->fit(config('estrrado.products.thumb_width'), (config('estrrado.products.thumb_height')));

            $img->save(Storage::disk('public')->path(config('estrrado.estrradodir') . "/" . config('estrrado.products.productthumb') . $fileName), 100);
            $img->save(Storage::disk('public')->path(config('estrrado.estrradodir') . "/" . config('estrrado.products.product') . $fileName, File::get($request->file('image'))));

            $product->product_image = $fileName;
        }
        $product->vendor_id = $userid;
        $product->save();

        return redirect()->route('vendor-product.index')->with('success', 'Product added successfully');
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
        $product = product::find($id);
        $product->product_image = empty($product->product_image) ? "" : asset('storage/' . config('estrrado.estrradodir') . "/" . config('estrrado.products.product') . $product->product_image);

        return view('vendor.products.edit', compact('product'));

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
        $userid = Auth::id();

        $product = product::find($id);

        $request->validate(
            [
                'product_name' => 'required|max:100',
                'product_desc' => 'required|max:255',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:4000',
            ],
            [
                'product_name.required' => 'Product name is required',
                'product_name.max' => 'Product name maximum 100 characters',
                'product_desc.required' => 'Product discription is required',
                'product_desc.max' => 'Product discription maximum 255 characters',
            ]
        );

        $product->product_name = $request->input('product_name');
        $product->product_discription = $request->input('product_desc');

        if (!empty($request->file('image'))) {

            if ($product->product_image) {
                if (Storage::disk('public')->exists(config('estrrado.estrradodir') . "/" . config('estrrado.products.product') . $product->product_image)) {
                    Storage::disk('public')->delete(config('estrrado.estrradodir') . "/" . config('estrrado.products.product') . $product->product_image);
                }
                if (Storage::disk('public')->exists(config('estrrado.estrradodir') . "/" . config('estrrado.products.productthumb') . $product->product_image)) {
                    Storage::disk('public')->delete(config('estrrado.estrradodir') . "/" . config('estrrado.products.productthumb') . $product->product_image);
                }
            }

            $fileName = time() . '_' . Str::random(5) . '.' . $request->file('image')->extension();
            $img = Image::make($request->file('image')->path());
            $img->fit(config('estrrado.products.thumb_width'), (config('estrrado.products.thumb_height')));

            $img->save(Storage::disk('public')->path(config('estrrado.estrradodir') . "/" . config('estrrado.products.productthumb') . $fileName), 100);
            $img->save(Storage::disk('public')->path(config('estrrado.estrradodir') . "/" . config('estrrado.products.product') . $fileName, File::get($request->file('image'))));

            $product->product_image = $fileName;
        }
        $product->vendor_id = $userid;

        $product->save();
        return redirect()->route('vendor-product.index')->with('success','Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);

        if ($product) {
            if ($product->image) {

                if (Storage::disk('public')->exists(config('estrrado.estrradodir') . "/" . config('estrrado.products.product') . $product->image)) {
                    Storage::disk('public')->delete(config('estrrado.estrradodir') . "/" . config('estrrado.products.product') . $product->image);
                }
                if (Storage::disk('public')->exists(config('estrrado.estrradodir') . "/" . config('estrrado.products.productthumb') . $product->image)) {
                    Storage::disk('public')->delete(config('estrrado.estrradodir') . "/" . config('estrrado.products.productthumb') . $product->image);
                }
            }

            $product->delete();

            return redirect()->back()->with('success', 'Product Delete');
        }

        return redirect()->back()->with('error', 'Product not found');
    }
}
