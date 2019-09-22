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
        $email = Auth::user()->email;
        $orderSementaras = OrderSementara::where('kode', $email)->get();
        $countOrder = count($orderSementaras);

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
        $email = Auth::user()->email;
        $orderSementaras = OrderSementara::where('kode', $email)->get();
        $countOrder = count($orderSementaras);

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
}
