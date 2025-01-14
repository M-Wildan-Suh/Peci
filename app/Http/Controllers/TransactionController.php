<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkout(Request $request) {
        $newdata = null;
        
        // Cari transaksi dengan subtotal dan user_id yang sama
        $existingTransaction = Transaction::where('user_id', Auth::id())
        ->where('status', 'pending')
        ->first();

        // dd($existingTransaction);
        
        if ($existingTransaction) {

            $newdata = $existingTransaction;

            $newdata->subtotal = $request->subtotal;
            $newdata->save();

            TransactionItem::where('transaction_id', $existingTransaction->id)->delete();
        
            if ($request->cartitem) {
                $cartitems = collect($request->cartitem)->map(fn($item) => json_decode($item, true));
                foreach ($cartitems as $item) {
                    $cart = Cart::where('product_id', $item['id'])->where('user_id', Auth::id())->first();

                    $cart->quantity = $item['quantity'];

                    $cart->save();

                    $newitem = new TransactionItem();
                    $newitem->transaction_id = $newdata->id;
                    $newitem->product_id = $item['id'];
                    $newitem->quantity = $item['quantity'];
                    $newitem->save();
                }
            } elseif ($request->one_new) {
                $newitem = new TransactionItem();
                $newitem->transaction_id = $newdata->id;
                $newitem->product_id = $request->one_new;
                $newitem->quantity = $request->quantity;
                $newitem->save();
            }
        }
        
        if (!$newdata) {
            // Jika tidak ada transaksi yang cocok, buat transaksi baru
            $newdata = new Transaction();
            $newdata->transaction_code = 'PEC - ' . rand();
            $newdata->subtotal = $request->subtotal;
            $newdata->user_id = Auth::id();
            $newdata->save();

            if ($request->cartitem) {
                $cartitems = collect($request->cartitem)->map(fn($item) => json_decode($item, true));
                foreach ($cartitems as $item) {
                    $cart = Cart::where('product_id', $item['id'])->where('user_id', Auth::id())->first();

                    $cart->quantity = $item['quantity'];

                    $cart->save();

                    $newitem = new TransactionItem();
                    $newitem->transaction_id = $newdata->id;
                    $newitem->product_id = $item['id'];
                    $newitem->quantity = $item['quantity'];
                    $newitem->save();
                }
            } elseif ($request->one_new) {
                $newitem = new TransactionItem();
                $newitem->transaction_id = $newdata->id;
                $newitem->product_id = $request->one_new;
                $newitem->quantity = $request->quantity;
                $newitem->save();
            }
        }
        $mainaddress = Address::where('user_id', Auth::id())->where('active', true)->first();

        $address = Address::where('user_id', Auth::id())->orderByDesc('active')->get();
        
        $data = Transaction::find($newdata->id);

        return view('guest.checkout', compact('data', 'mainaddress', 'address'));
    }

    public function checkoutget() {
        $mainaddress = Address::where('user_id', Auth::id())->where('active', true)->first();

        $address = Address::where('user_id', Auth::id())->orderByDesc('active')->get();

        $data = Transaction::where('user_id', Auth::id())->where('status', 'pending')->first();

        return view('guest.checkout', compact('data', 'mainaddress', 'address'));
    }

    public function payment(Request $request) {
        $data = Transaction::find($request->id);

        $data->status = 'on going';

        foreach ($data->transactionitem as $item) {
            $cart = Cart::where('product_id', $item->product_id)->where('user_id', Auth::id())->first();

            if ($cart) {
                $cart->delete();
            }
        }

        $data->save();

        $phone = '6285624203799'; // Ganti dengan nomor tujuan
        $message = 'Halo, Saya ingin melakukan pembayaran produk dengan kode transaksi '.$data->transaction_code; // Pesan yang ingin dikirimkan
        
        // Encode pesan agar URL valid
        $encodedMessage = urlencode($message);
        
        // Buat URL WhatsApp
        $whatsappUrl = "https://wa.me/{$phone}?text={$encodedMessage}";

        // dd($data);
        // Redirect ke URL WhatsApp
        return redirect()->away($whatsappUrl);
    }

    public function receive(Request $request) {
        $data = Transaction::find($request->id);

        $data->status = 'success';

        $data->save();

        return redirect()->back();
        // dd($data);
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::where('status', '!=', 'pending')
        ->get();
        $data->transform(function ($data) {
            $data->username = $data->user->name;
            return $data;
        });
        return view('admin.transaction.index', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->status = $request->status;
        $transaction->waybill = $request->waybill;
        $transaction->service = $request->service;

        $transaction->save();

        return redirect()->back();
        // dd($transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
