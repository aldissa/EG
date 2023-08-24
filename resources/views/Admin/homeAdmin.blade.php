@extends('Template.html')

@section('title', 'Home Admin')

@section('body')
    @include('Template.nav')

    <div class="container">
        <h2 class="text-light">Produk</h2>
        <table class="table table-bordered mt-4">
            <thead style="background-color: #202020">
                <tr>
                    <th class="text-light">No</th>
                    <th class="text-light">Gambar</th>
                    <th class="text-light">Nama</th>
                    <th class="text-light">Kategori</th>
                    <th class="text-light">Harga</th>
                    <th class="text-light">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-light" width="50">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                        <td width="150"><img src="img/{{ $item->foto }}" alt="{{ $item->name }}" width="150" height="100"></td>
                        <td class="text-light" width="300">{{ $item->name }}</td>
                        <td class="text-light" width="150">{{ $item->kategori->name }}</td>
                        <td class="text-light" width="150">Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td width="150">
                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-secondary">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $item->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($data->onFirstPage())
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a></li>
                    @endif
            
                    @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                        <li class="page-item{{ $data->currentPage() == $page ? ' active' : '' }}"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endforeach
            
                    @if ($data->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                    @endif
                </ul>
            </nav>
    </div>
    
    
    @foreach ($data as $item)
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="deleteModal{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin untuk menghapus produk ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('produk.destroy', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="deleteProduk({{ $item->id }})">Yakin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
