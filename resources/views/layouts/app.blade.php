<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'RumahAya')</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Tambahkan stack untuk custom styles dari halaman -->
    @stack('styles')

    <!-- Custom Inline Pink Theme -->
    <style>
        .bg-pink {
            background-color: #e83e8c !important;
        }
        .navbar .nav-link,
        .navbar-brand,
        .dropdown-menu a {
            color: white !important;
        }
        .dropdown-menu {
            background-color: #e83e8c;
        }
        .dropdown-menu .dropdown-item:hover {
            background-color: #d63384;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar Pink -->
    <nav class="navbar navbar-expand-lg bg-pink shadow-sm rounded-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('barang.index') }}">RumahAya</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <!-- Manajemen Barang -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdownBarang" role="button" data-bs-toggle="dropdown">
                            Manajemen Barang
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('kategori.index') }}">Kategori</a></li>
                            <li><a class="dropdown-item" href="{{ route('barang.index') }}">Barang</a></li>
                        </ul>
                    </li>

                    <!-- Pembeli -->
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('pembeli.index') }}">Pembeli</a>
                    </li>

                    <!-- Kulakan Barang -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="dropdownKulakan" role="button" data-bs-toggle="dropdown">
                            Pembelian Stok
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('supplier.index') }}">Supplier</a></li>
                            <li><a class="dropdown-item" href="{{ route('pembelian.index') }}">Restok Barang</a></li>
                        </ul>
                    </li>

                    <!-- Penjualan -->
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="{{ route('penjualan.index') }}">Penjualan</a>
                    </li>

                    <!-- User Session -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarUserDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @auth
                            <li>
                                <h6 class="dropdown-header text-white">
                                    {{ Auth::user()->username ?? Auth::user()->name }}
                                </h6>
                            </li>
                            <li><hr class="dropdown-divider bg-white"></li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}">Keluar</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div id="page-content" class="container mt-4 p-4 bg-white rounded shadow fade-in">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow-sm rounded-top mt-4">
        <div class="container text-center p-3">
            <div class="mb-2">
                <a href="https://www.instagram.com/rumahaya" class="text-danger me-3" target="_blank" data-bs-toggle="tooltip" title="Ikuti kami di Instagram">
                    <i class="bi bi-instagram fs-4"></i>
                </a>
                <a href="https://www.facebook.com/rumahaya" class="text-primary me-3" target="_blank" data-bs-toggle="tooltip" title="Sukai kami di Facebook">
                    <i class="bi bi-facebook fs-4"></i>
                </a>
                <a href="https://wa.me/6285733350095" class="text-success" target="_blank" data-bs-toggle="tooltip" title="Hubungi kami di WhatsApp">
                    <i class="bi bi-whatsapp fs-4"></i>
                </a>
            </div>
            <div class="fw-bold text-dark">
                © {{ date('Y') }} RumahAya. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr Notification -->
    @if (session('success'))
        <script>toastr.success("{{ session('success') }}");</script>
    @endif
    @if (session('error'))
        <script>toastr.error("{{ session('error') }}");</script>
    @endif

    <!-- Tooltip Activation -->
    <script>
        const tooltips = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltips.map(t => new bootstrap.Tooltip(t));
    </script>

    <!-- Stack for additional JS -->
    @stack('scripts')
</body>
</html>
