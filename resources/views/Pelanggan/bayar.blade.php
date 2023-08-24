@extends('Template.html')

@section('title', 'Bayar')

@section('body')

    @include('Template.nav')
    <form action="{{ route('pelanggan.prosesbayar', $detailtransaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <h4 class="text-light">Upload bukti pembayaran</h4>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('img/' . $produk->foto) }}" alt="" class="card-img-top" width="180px"
                            height="100%">
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $produk->name }}</h3>
                            <hr>
                            <p class="card-text">Harga Rp. <b>{{ number_format($produk->harga, 0, ',', '.') }}</b></p>
                            <p class="card-text">Total harga <b>Rp. {{ number_format($detailtransaksi->totalharga, 0, ',', '.') }}</b></p>
                            <p class="card-text">Banyak : {{ $detailtransaksi->qty }}</p>
                            <hr>
                            <div class="mb-2">
                                <label class="form-control mb-2"><b>Bukti pembayaran</b></label>
                                <input type="file" name="bukti_transaksi" accept="image/*" required>
                            </div>
                            <hr>
                            <h5>Keterangan :</h5>
                            <p>Silahkan Lakukan transfer ke bank berikut dan tunggu konfirmasi dari kami</p>
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
