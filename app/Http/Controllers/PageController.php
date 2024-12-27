<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function home() {
        $product = Product::all();
        $product->transform(function ($data) {
            $data->slug = Str::slug($data->name, '-');
            return $data;
        });
        return view('guest.home', compact('product'));
    }

    public function product() {
        $product = Product::all();
        $product->transform(function ($data) {
            $data->slug = Str::slug($data->name, '-');
            return $data;
        });
        return view('guest.product', compact('product'));
    }

    public function productdetail($slug, $id) {
        $product = product::find($id);
        return view('guest.product-detail', compact('product'));
    }

    public function transaction() {
        $data = Transaction::where('user_id', Auth::id())
        ->where('status', '!=', 'pending')
        ->get();
        return view('guest.transaction', compact('data'));
    }

    public function address() {
        $data = Address::where('user_id', Auth::id())->orderByDesc('active')->get();
        
        return view('guest.address', compact('data'));
    }
}
