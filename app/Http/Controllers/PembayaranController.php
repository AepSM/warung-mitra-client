<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::where('customer_id', Auth::user()->id)->where('status_bayar', 0)->where('kode', $request->kode)->first();
        return view('pembayaran', ['orders' => $orders]);
    }

    public function store(Request $request)
    {
        $orders = Order::where('customer_id', Auth::user()->id)->where('status_bayar', 0)->where('kode', $request->kode)->first();
        $orders->jenis_bayar = $request->metode_pembayaran;
        $orders->save();

        return redirect()->route('invoice.index', ['kode' => $request->kode]);
    }
}
