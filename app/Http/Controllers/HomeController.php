<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('welcome', compact('produks'));
    }

    public function detail($id)
    {
        $product = Produk::with('kategori')->findOrFail($id);

        return view('Produk.detail', compact('product'));
    }

    function search(Request $request) {
        $keyword = $request->input('search');
        $produks = Produk::where('name', 'like', '%'. $keyword . '%')->get();

        return view('welcome', compact('produks'));
    }
}
