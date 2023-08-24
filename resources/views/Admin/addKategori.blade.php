@extends('Template.html')

@section('title', 'Add Kategori')

@section('body')

    @include('Template.nav')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah kategori</h5>

                <form action="{{ route('addKategori') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <button class="btn btn-primary mt-3">Tambah</button>
            </div>
        </div>

    </div>
@endsection
