<?php

namespace App\Http\Controllers;

use App\Order;
use App\Kategori;
use Carbon\Carbon;
use App\OrderDetail;
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

        if ($orders->isEmpty()) {
            return redirect()->route('home');
        } else {
            return view('detail_belanja', [
                'orders' => $orders,
                'total_harga' => $total_harga
            ]);
        }
    }

    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "kecamatan" => "required"
        ])->validate();

        $kode = str_random(6);

        $order = Order::create([
            "kode" => $kode,
            "customer_id" => Auth::user()->id,
            "tanggal" => Carbon::now(),
            "nama" => $request->nama,
            "alamat" => $request->alamat,
            "kecamatan" => $request->kecamatan,
            "total_harga" => $request->total_harga,
            "ongkir" => $request->ongkir,
            "total_bayar" => $request->total_bayar,
            "status_bayar" => 0
        ]);
        
        $order_sementara_inserts = OrderSementara::where('kode', Auth::user()->email)->get();
        foreach ($order_sementara_inserts as $key => $order_sementara_insert) {
            OrderDetail::create([
                'kode' => $kode,
                'produk_id' => $order_sementara_insert->produk_id,
                'qty' => $order_sementara_insert->qty,
                'harga' => $order_sementara_insert->harga
            ]);
        }
        

        $order_sementaras = OrderSementara::where('kode', Auth::user()->email)->get();
        foreach ($order_sementaras as $key => $order_sementara) {
            $order_sementara->delete();
        }

        return redirect()->route('pembayaran.index', ['kode' => $kode]);
    }
}
