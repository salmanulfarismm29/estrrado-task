<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Validation\Rule;


class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = DB::table('vendors')->select('id', 'vendor_name')->get();

        return view('admin.vendor.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor.create');
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
                'vendor_name' => 'required|max:55',
                'vendor_email' => ['required', 'email', Rule::unique('vendors')],
                'vendor_password' => 'required',
            ],
            [
                'vendor_name.required' => 'Vendor name is required',
                'vendor_name.max' => 'Vendor name maximum 55 characters',
                'vendor_email.required' => 'Vendor email is required',
                'vendor_email.email' => 'Invalid email',
                'vendor_email.unique' => 'Vendor email must be unique',
                'vendor_password.required' => 'Vendor password required',
            ]
        );

        $user = new User();
        $user->name = $request->input('vendor_name');
        $user->email = $request->input('vendor_email');
        $user->password = Hash::make($request->input('vendor_password'));
        $user->is_vendor = 1;
        $user->save();

        $vendor = new vendor();
        $vendor->user_id = $user->id;
        $vendor->vendor_name = $request->input('vendor_name');
        $vendor->vendor_email = $request->input('vendor_email');
        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        $user = User::find($vendor->user_id);
        return view('admin.vendor.edit', compact('vendor','user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        $request->validate([
            'vendor_name' => 'required|max:55',
            'vendor_email' => ['required', 'email', Rule::unique('vendors')->ignore($vendor->id)],
        ], [
            'vendor_name.required' => 'Vendor name is required',
            'vendor_name.max' => 'Vendor name should not exceed 55 characters',
            'vendor_email.required' => 'Vendor email is required',
            'vendor_email.email' => 'Invalid email format',
            'vendor_email.unique' => 'This email is already taken',
        ]);

        $user = User::find($vendor->user_id);
        $user->name = $request->input('vendor_name');
        $user->email = $request->input('vendor_email');
        $user->save();

        $vendor->vendor_name = $request->input('vendor_name');
        $vendor->vendor_email = $request->input('vendor_email');
        $vendor->save();

        return redirect()->route('vendors.index')->with('success', 'Vendor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        //
    }
}
