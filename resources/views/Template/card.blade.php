<div class="container">
    <img src="img/epic.jpg" style="width:100%; height: auto;" alt="">
    <div class="row">
        @foreach ($produks as $produk)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                <div class="card d-flex flex-grow-1">
                    <img src="img/{{ $produk->foto }}" alt="{{ $produk->name }}" class="card-img-top" width="150"
                        height="200">
                    <h5 class="card-title">{{ Str::limit($produk->name, 20) }}</h5>
                    <b class="card-text">Harga: Rp.{{ number_format($produk->harga, 0, ',', '.') }}</b>
                    <a href="{{ route('detail', ['id' => $produk->id]) }}" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
