@extends('Template.html')

@section('title', 'Keranjang')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        <h4 class="text-light">Keranjang</h4>
        <hr>
        @foreach ($detailtransaksi as $item)
            <div class="card mt-3">
                <div class="row">
                    <div class="col-2 p-4">
                        <img src="img/{{ $item->Produk->foto }}" alt="{{ $item->name }}" class="card-thumbnail" width="180px"
                            height="100%">
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->Produk->name }}</h5>
                            <hr>
                            <p class="card-text">Harga Rp. {{ number_format($item->Produk->harga, 0, ',', '.') }}</p>
                            <input type="number" name="banyak" id="" class="form-control"
                            value="{{ $item->qty }}" required readonly>
                            <hr>
                            <p class="card-text">Total Rp. {{ number_format($item->totalharga, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="col-2 p-5">
                        <a href="{{ route('pelanggan.bayar', $item->id) }}" class="btn btn-info mb-2 w-100">Bayar</a>
                        <form action="{{ route('hapusKeranjang', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
