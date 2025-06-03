<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>RumahAya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff0f5;
        }

        .navbar {
            background-color: #ffc0cb;
        }

        .hero {
            background: linear-gradient(135deg, #fbb1bd, #fff0f5);
            padding: 100px 20px;
            text-align: center;
            color: #6a1b4d;
            position: relative;
            overflow: hidden;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.25rem;
        }

        .btn-pink {
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 28px;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(255, 105, 180, 0.4);
            transition: all 0.3s ease-in-out;
        }

        .btn-pink:hover {
            background-color: #ff1493;
            transform: scale(1.05);
        }

        .category-card, .product-card {
            border-radius: 20px;
            box-shadow: 0 6px 15px rgba(255, 105, 180, 0.15);
            transition: all 0.3s ease-in-out;
        }

        .category-card:hover, .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 20px rgba(255, 105, 180, 0.3);
        }

        footer {
            background-color: #ffc0cb;
            color: white;
            padding: 20px 0;
        }

        img {
            max-width: 80px;
            height: auto;
        }

        .card-img-top {
            max-height: 150px;
            object-fit: contain;
            padding: 10px;
        }

        .hero-bg-img {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 350px;
            opacity: 0.15;
            z-index: 1;
        }

        .hero-bg-img-left {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 300px;
            opacity: 0.1;
            z-index: 1;
        }

        .hero .container {
            position: relative;
            z-index: 2;
        }
    </style>
</head>
<body>

<!-- Hero -->
<section class="hero text-white">
    <div class="container py-5 text-center">
        <h1 class="display-4 fw-bold mb-3 animate__animated animate__fadeInDown">
            💖 Belanja Seru, Cantik, dan Hemat 💖
        </h1>
        <p class="lead mb-4 animate__animated animate__fadeInUp">
            Dari makanan lezat, minuman segar, hingga elektronik kekinian — semua ada di sini!
        </p>
        <a href="/barang" class="btn btn-pink animate__animated animate__bounceIn">
            Belanja Sekarang
        </a>
    </div>
    <img src="{{ asset('images/hero-bg.png') }}" class="hero-bg-img" alt="hiasan kanan">
    <img src="{{ asset('images/hero-bg.png') }}" class="hero-bg-img-left" alt="hiasan kiri">
</section>

<!-- Produk Unggulan -->
<section class="container my-5">
    <h2 class="text-center mb-4">Kategori</h2>
    <div class="row g-4">

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('image/makanan.jpg') }}" class="card-img-top" alt="Makanan">
                <div class="card-body text-center">
                    <h5 class="card-title">Makanan</h5>
                    <p class="text-danger fw-bold">Rp 2.000 - 20.000</p>
                    <a href="#" class="btn btn-sm btn-pink">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('image/bumbu.jpg') }}" class="card-img-top" alt="Bumbu">
                <div class="card-body text-center">
                    <h5 class="card-title">Bumbu Dapur</h5>
                    <p class="text-danger fw-bold">Rp 1.000 - 10.000</p>
                    <a href="#" class="btn btn-sm btn-pink">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('image/elektronik.jpg') }}" class="card-img-top" alt="Elektronik">
                <div class="card-body text-center">
                    <h5 class="card-title">Elektronik</h5>
                    <p class="text-danger fw-bold">Rp 125.000</p>
                    <a href="#" class="btn btn-sm btn-pink">Lihat</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card product-card">
                <img src="{{ asset('image/aksesoris.jpg') }}" class="card-img-top" alt="Aksesoris">
                <div class="card-body text-center">
                    <h5 class="card-title">Aksesoris</h5>
                    <p class="text-danger fw-bold">Rp 15.000</p>
                    <a href="#" class="btn btn-sm btn-pink">Lihat</a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Footer -->
<footer class="text-center">
    <div class="container">
        <p class="mb-1">💕 RumahAya - Semua Kebutuhan dalam Satu Tempat 💕</p>
        <p class="small mb-0">Instagram | WhatsApp | TikTok</p>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
