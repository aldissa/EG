<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showProduk()
    {
        $data = Produk::with('kategori')->paginate(5);
        return view('Admin.homeAdmin', compact('data'));
    }

    public function showAddProduk()
    {
        $kategoris = Kategori::all();
        return view('Admin.addProduk', compact('kategoris'));
    }

    public function addProduk(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'foto' => 'required|image',
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('img'), $imageName);

        $produk = new Produk();
        $produk->kategori_id = $request->kategori_id;
        $produk->name = $request->name;
        $produk->harga = $request->harga;
        $produk->foto = $imageName;
        $produk->save();

        return redirect()->route('showProduk');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('showProduk')->with('message', 'Game deleted successfully.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();

        return view('admin.editProduk', compact('produk', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'foto' => 'required|image',
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('img'), $imageName);
        
        $produk->kategori_id = $request->kategori_id;
        $produk->name = $request->name;
        $produk->harga = $request->harga;
        $produk->foto = $imageName;
        $produk->save();

        return redirect()->route('showProduk');
    }

    function addKategori(Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        $kategori = new Kategori();
        $kategori = $request->name;
        $kategori->save();

        return redirect()->route('showProduk');
    }

    function showAddKategori() {
        return view('Admin.addKategori');
    }
}
