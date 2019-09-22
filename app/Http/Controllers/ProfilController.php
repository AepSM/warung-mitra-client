<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::get();
        $profil = Auth::user();
        return view('profil', ['kategoris' => $kategoris, 'profil' => $profil]);
    }
}
