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
}
