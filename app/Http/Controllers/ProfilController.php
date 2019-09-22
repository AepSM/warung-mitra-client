<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\OrderSementara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $orderSementaras = OrderSementara::where('kode', $email)->get();
        $countOrder = count($orderSementaras);
        
        $kategoris = Kategori::get();
        $profil = Auth::user();
        return view('profil', [
                'order_sementara' => $countOrder,
                'kategoris' => $kategoris, 
                'profil' => $profil
            ]);
    }
}
