<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function active($id) {
        $old = Address::where('active', true)->first();
        $old->active = false;
        $old->save();

        $new = Address::find($id);
        $new->active = true;
        $new->save();

        return redirect()->route('checkout.get')->with('open', true);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $address = Address::where('user_id', Auth::id())->first();
        $newdata = new Address;

        $newdata->user_id = Auth::id();
        $newdata->name = $request->name;
        $newdata->address = $request->address;
        $newdata->phone_number = $request->phone_number;
        $newdata->additional = $request->additional;

        if (!$address) {
            $newdata->active = true;
        }

        $newdata->save();
        
        return redirect()->route('checkout.get')->with('open', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $address->user_id = Auth::id();
        $address->name = $request->name;
        $address->address = $request->address;
        $address->phone_number = $request->phone_number;
        $address->additional = $request->additional;

        $address->save();

        return redirect()->route('checkout.get')->with('open', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->route('checkout.get')->with('open', true);
    }
}
