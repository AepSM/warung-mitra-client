<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Slider;
use App\Kategori;
use App\OrderSementara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        if (Auth::user()) {
            $email = Auth::user()->email;
            $orderSementaras = OrderSementara::where('kode', $email)->get();
            $countOrder = count($orderSementaras);
        } else {
            $countOrder = 0;
        }

        $kategoris = Kategori::get();
        $sliders = Slider::get();
        $slidersides = Produk::all()->random(3);
        $produks = Produk::orderBy('id', 'desc')->paginate(30);

        return view('home', [
                'order_sementara' => $countOrder,
                'kategoris' => $kategoris, 
                'produks' => $produks, 
                'sliders' => $sliders, 
                'slidersides' => $slidersides
            ]);
    }

    public function search(Request $request)
    {
        if (Auth::user()) {
            $email = Auth::user()->email;
            $orderSementaras = OrderSementara::where('kode', $email)->get();
            $countOrder = count($orderSementaras);
        } else {
            $countOrder = 0;
        }        

        $data = $request->attr;

        $kategoris = Kategori::get();
        $produks = Produk::where('nama', 'LIKE', '%'. $data . '%')
        ->orWhereHas('data_kategori', function($query) use ($data) {
            $query->where('nama', 'LIKE', '%'. $data . '%');
        })
        ->paginate(30);

        return view('search', [
                'order_sementara' => $countOrder,
                'kategoris' => $kategoris, 
                'produks' => $produks
            ]);
    }

    public function detail_produk($id)
    {
        if (Auth::user()) {
            $email = Auth::user()->email;
            $orderSementaras = OrderSementara::where('kode', $email)->get();
            $countOrder = count($orderSementaras);
        } else {
            $countOrder = 0;
        }

        $kategoris = Kategori::get();
        $produk = Produk::find($id);

        return view('detail_produk', [
                'order_sementara' => $countOrder,
                'kategoris' => $kategoris, 
                'produk' => $produk
            ]);
    }

    public function masukkan_keranjang(Request $request, $id)
    {
        if (Auth::user()) {
            OrderSementara::create([
                'produk_id' => $id,
                'qty' => 1,
                'kode' => Auth::user()->email
            ]);

            $produk = Produk::find($id);
            $produkStok = $produk->stok;
            $sisaStok = $produkStok - 1;
            $produk->stok = $sisaStok;
            $produk->save();

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
}
