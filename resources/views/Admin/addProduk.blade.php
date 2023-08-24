@extends('Template.html')

@section('title', 'Add produk')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Produk</h5>

                <form action="{{ route('addProduk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>

                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <button class="btn btn-primary mt-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
