<nav class="navbar navbar-expand-lg" style="background-color: #202020">
    <a class="navbar-brand text-light" href="/">
        <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="">
        Home
    </a>
    <div class="navbar-nav">
        @guest
            <a class="nav-item nav-link text-light" href="/">Store</a>
            <a class="nav-item nav-link text-light" href="{{ route('loginform') }}">Login</a>
        @endguest
        @auth
            @if (auth()->user()->role == 'admin')
                <a class="nav-item nav-link text-light" href="{{ route('showProduk') }}">Produk</a>
                <a href="{{ route('showAddProduk') }}" class="nav-item nav-link text-light">Tambah Produk</a>
                <a href="{{ route('showAddKategori') }}" class="nav-item nav-link text-light">Tambah Kategori</a>
            @else
                <a class="nav-item nav-link text-light" href="{{ route('pelanggan.summary') }}">Library</a>
                <a class="nav-item nav-link text-light" href="{{ route('pelanggan.keranjang') }}">Cart</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-item nav-link btn btn-link text-light">Logout</button>
            </form>
        @endauth
    </div>
    <form class="form-inline my-lg-3" action="{{ route('search') }}" method="GET">
        <div class="input-group">
            <input type="search" name="search" class="form-control mr-sm-2 rounded" placeholder="Search" aria-label="Search" style="width: 20vh;">
            <div class="input-group-append" style="margin-left: 5px">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </div>
        </div>
    </form>
    
</nav>
