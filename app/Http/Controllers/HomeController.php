<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Slider;
use App\Kategori;
use Illuminate\Http\Request;

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
        $kategoris = Kategori::get();
        $sliders = Slider::get();
        $slidersides = Produk::all()->random(3);
        $produks = Produk::orderBy('id', 'desc')->paginate(30);
        return view('home', ['kategoris' => $kategoris, 'produks' => $produks, 'sliders' => $sliders, 'slidersides' => $slidersides]);
    }

    public function search(Request $request)
    {
        $data = $request->attr;

        $kategoris = Kategori::get();
        $produks = Produk::where('nama', 'LIKE', '%'. $data . '%')
        ->orWhereHas('data_kategori', function($query) use ($data) {
                $query->where('nama', 'LIKE', '%'. $data . '%');
        })
        ->paginate(30);
        return view('search', ['kategoris' => $kategoris, 'produks' => $produks]);
    }
}
