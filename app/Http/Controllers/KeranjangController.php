<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use App\OrderSementara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $email = Auth::user()->email;
            $order_sementaras = OrderSementara::where('kode', $email)->get();
            $countOrder = count($order_sementaras);
        } else {
            $countOrder = 0;
        }

        $kategoris = Kategori::get();

        return view('keranjang', [
                'order_sementara' => $countOrder,
                'kategoris' => $kategoris
            ]);
    }

    public function masukkan_keranjang(Request $request, $id)
    {
        if (Auth::user()) {
            $produk = Produk::find($id);
            $produkStok = $produk->stok;
            $sisaStok = $produkStok - 1;
            $produk->stok = $sisaStok;
            $produk->save();

            $email = Auth::user()->email;
            $order_sementara = OrderSementara::where('kode', $email)->where('produk_id', $id)->first();

            if ($order_sementara) {
                $order_sementara->qty = $order_sementara->qty + 1;
                $order_sementara->harga = $order_sementara->harga + $produk->harga;
                $order_sementara->save();
            } else {
                OrderSementara::create([
                    'produk_id' => $id,
                    'qty' => 1,
                    'harga' => $produk->harga,
                    'kode' => Auth::user()->email
                ]);
            }


            if ($produk->stok == 0) {
                # code...
                $request->session()->flash('stok', 'Stok habis');
            }
            
            $request->session()->flash('status', 'Berhasil masuk keranjang');

            return redirect()->route('detail_produk', ['id' => $id]);
        } else {
            return redirect()->route('login');
        }
    }

    public function beli(Request $request, $id)
    {
        if (Auth::user()) {
            $produk = Produk::find($id);
            $produkStok = $produk->stok;
            $sisaStok = $produkStok - 1;
            $produk->stok = $sisaStok;
            $produk->save();

            $email = Auth::user()->email;
            $order_sementara = OrderSementara::where('kode', $email)->where('produk_id', $id)->first();

            if ($order_sementara) {
                $order_sementara->qty = $order_sementara->qty + 1;
                $order_sementara->harga = $order_sementara->harga + $produk->harga;
                $order_sementara->save();
            } else {
                OrderSementara::create([
                    'produk_id' => $id,
                    'qty' => 1,
                    'harga' => $produk->harga,
                    'kode' => Auth::user()->email
                ]);
            }

            return redirect()->route('keranjang.index');
        } else {
            return redirect()->route('login');
        }
    }

    public function data()
    {
        $email = Auth::user()->email;
        $orderSementaras = OrderSementara::select(
                DB::raw('sum(qty) as sumQty, produk_id, sum(harga) as sumHarga')
            )
            ->where('kode', $email)
            ->groupBy('produk_id')
            ->with('data_produk')
            ->get();

        return response()->json([
            'data' => $orderSementaras
        ]);
    }

    public function tambah_data(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $email = Auth::user()->email;

        $order_sementara = OrderSementara::where('kode', $email)->where('produk_id', $id)->first();
        $order_sementara->delete();

        $produk = Produk::find($id);

        $orderSementaras = OrderSementara::create([
            'produk_id' => $id,
            'qty' => $qty,
            'harga' => $produk->harga * $qty,
            'kode' => $email
        ]);

        return response()->json([
            'data' => $orderSementaras
        ]);
    }

    public function hapus()
    {
        $orderSementara = OrderSementara::where('produk_id', $id)->first();

        $orderSementara->delete();

        $produk = Produk::find($id);
        $produkStok = $produk->stok;
        $sisaStok = $produkStok + 1;
        $produk->stok = $sisaStok;
        $produk->save();
    }
}
