<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\OrderSementara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $orders = OrderSementara::where('kode', $email)->get();
        $total_harga = OrderSementara::select(DB::raw('sum(harga) as sumHarga'))
        ->where('kode', $email)
        ->first();

        return view('detail_belanja', [
            'orders' => $orders,
            'total_harga' => $total_harga
        ]);
    }
}
