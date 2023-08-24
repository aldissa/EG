<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function keranjang(Request $request, Produk $produk)
    {
        $request->validate([
            'banyak' => 'required',
        ]);

        DetailTransaksi::create([
            'qty' => $request->banyak,
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'status' => 'keranjang',
            'totalharga' => $produk->harga * $request->banyak
        ]);

        return redirect()->route('pelanggan.keranjang')->with('status','Done');
    }

    function hapusKeranjang($id) {
        $detailtransaksi = DetailTransaksi::findOrFail($id);
        $detailtransaksi->delete();

        return redirect()->route('pelanggan.keranjang')->with('status','Item berhasil di hapus');
    }

    public function cart(Request $request)
    {
        $detailtransaksi = DetailTransaksi::where('status','keranjang')->with('Produk')->get();

        return view('pelanggan.keranjang', compact('detailtransaksi'));
    }

    public function bayar(Request $request, DetailTransaksi $detailtransaksi)
    {
        $produk = $detailtransaksi->produk;

        return view('pelanggan.bayar', compact('produk','detailtransaksi'));
    }

    public function prosesBayar(Request $request, DetailTransaksi $detailtransaksi)
    {
        $request->validate([
            'bukti_transaksi' => 'required|file',
        ]);

        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'totalharga' => $detailtransaksi->totalharga,
            'kode' => 'INV'.Str::random(8),
        ]);

        $detailtransaksi->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'checkout',
            'bukti_transaksi' => $request->bukti_transaksi->store('img'),
        ]);

        return redirect()->route('pelanggan.summary')->with('status','Berhasil checkout/upload bukti');
    }

    public function summary(Request $request)
    {
        $detailtransaksi = DetailTransaksi::where('user_id', auth()->id())->where('status', 'checkout')->get();

        return view('Pelanggan.summary', compact('detailtransaksi'));
    }
}
