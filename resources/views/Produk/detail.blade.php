@extends('Template.html')

@section('title', 'Detail Game')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        <form action="{{ route('keranjang', $product->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="card d-flex h-100">
                        <img src="{{ asset('img/' . $product->foto) }}" alt="" class="card-img-top" height="250" width="auto">
                        <div class="card-body">
                            <h4 class="card-title text-dark mb-5">Detail <br>{{ $product->name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card d-flex h-100">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <b class="card-text">Harga: Rp.{{ number_format($product->harga, 0, ',', '.') }}</b>
                            <input type="number" name="banyak" id="" class="form-control" required value="1"
                                min="1">
                            <hr>
                            <h5>Keterangan : </h5>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa, quas officiis ea
                                perspiciatis
                                dolorem officia, vero id et ducimus voluptatibus quae consequuntur? Doloremque ipsum
                                explicabo
                                iure. Autem, optio. Aliquam, animi!</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Kategori : {{ $product->kategori->name }}</h5>
                            <button href="" class="btn btn-success mt-3 form-control">Beli</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
