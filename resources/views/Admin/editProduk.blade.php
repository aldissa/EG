@extends('Template.html')

@section('title', 'Edit produk')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Produk</h5>

                <form action="{{ route('produk.update', ['id' => $produk->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $produk->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" value="{{ $produk->foto }}" required>
                    </div>

                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" @if ($kategori->id == $produk->kategori_id) selected
                            @endif>{{ $kategori->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary mt-3">Edit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
