@extends('Template.html')

@section('title', 'Library')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        <h4 class="text-light">Library</h4>
        <hr>
        @foreach ($detailtransaksi as $item)
            <div class="card mt-3">
                <div class="row">
                    <div class="col-2 p-4">
                        <img src="img/{{ $item->Produk->foto }}" alt="{{ $item->name }}" class="card-thumbnail" width="180px" height="100%">
                    </div>

                    <div class="col-10">
                        <div class="card-body">
                            <h3 class="card-title">{{ $item->Produk->name }}</h3>
                            <h5 class="card-title">Invoice : {{ $item->transaksi->kode}}</h5>
                            <hr>
                            <p class="card-text">Harga : Rp. {{ number_format($item->Produk->harga, 0,',','.') }}</p>
                            <p class="card-text">Banyak : {{ $item->qty }}</p>
                            <hr>
                            <p class="card-text">Total : Rp. {{ number_format($item->totalharga, 0,',','.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
