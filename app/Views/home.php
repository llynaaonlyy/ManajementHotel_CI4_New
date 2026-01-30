<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelku - Pemesanan Hotel, Villa & Apartemen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .top-bar {
            background: #ffffff;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            animation: slideDown 0.5s ease-out;
            border-bottom: 1px solid #e5e7eb;
        }
        
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .logo:hover {
            color: #1e40af;
            transform: scale(1.05);
            text-shadow: none;
        }
        
        .logo i {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .user-menu {
            position: relative;
        }
        
        .user-name {
            color: #1f2937;
            margin-right: 10px;
            font-weight: 500;
            text-shadow: none;
        }
        
        .profil-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #eaf2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563eb;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }
        
        .profil-icon:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }
        
        .dropdown-menu {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            border: none;
            overflow: hidden;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .dropdown-item {
            padding: 12px 20px;
            transition: all 0.3s ease;
        }
        
        .dropdown-item:hover {
            background: #2563eb;
            color: white;
            transform: translateX(5px);
        }
        
        .search-box {
            background: white;
            border-radius: 50px;
            padding: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .search-box:hover {
            box-shadow: 0 8px 30px rgba(0,0,0,0.25);
            transform: translateY(-2px);
        }
        
        .search-box input {
            border: none;
            padding: 12px 25px;
            font-size: 15px;
        }
        
        .search-box input:focus {
            outline: none;
            box-shadow: none;
        }
        
        .search-box button {
            border-radius: 50px;
            padding: 12px 35px;
            background: #2563eb;
            border: none;
            transition: all 0.3s ease;
            font-weight: 600;
        }
        
        .search-box button:hover {
            background: #1e40af;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .filter-tabs {
            margin: 20px 0;
            overflow-x: auto;
            overflow-y: visible;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 10px;
            padding-top: 5px;
            scrollbar-width: thin;
            scrollbar-color: #667eea #f0f0f0;
        }
        
        .filter-tabs::-webkit-scrollbar {
            height: 8px;
        }
        
        .filter-tabs::-webkit-scrollbar-track {
            background: #f0f0f0;
            border-radius: 10px;
        }
        
        .filter-tabs::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        .filter-btn {
            display: inline-block;
            padding: 12px 30px;
            margin-right: 15px;
            border: 2px solid #2563eb;
            border-radius: 30px;
            background: white;
            color: #2563eb;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .filter-btn:hover {
            background: #2563eb;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
            position: relative;
            z-index: 10;
        }
        
        .filter-btn.active {
            background: #2563eb;
            color: white;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        }
        
        .card-akomodasi {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            margin-bottom: 30px;
            height: 100%;
            background: white;
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card-akomodasi:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }
        
        .image-container {
            position: relative;
            overflow: hidden;
            height: 260px;
            background: #eaf2ff;
        }
        
        .card-akomodasi img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: all 0.5s ease;
        }
        
        .card-akomodasi:hover img {
            transform: scale(1.1) rotate(2deg);
        }
        
        .default-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eaf2ff;
            color: white;
            font-size: 60px;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .badge-tipe {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .badge-hotel { background: #22c55e; }
        .badge-villa { background: #f59e0b; }
        .badge-apart { background: #2563eb; }

        .rating {
            color: #FFC107;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            background: #fef3c7;
            border-radius: 20px;
        }
        
        .rating i {
            animation: sparkle 1.5s infinite;
        }
        
        @keyframes sparkle {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }
        
        .price {
            background: none;
            color: #2563eb;
            -webkit-background-clip: text;
            -webkit-text-fill-color: initial;
            background-clip: text;
            font-size: 26px;
            font-weight: bold;
        }
        
        .location {
            color: #666;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .location i {
            color: #2563eb;
        }
        
        .alert {
            border-radius: 15px;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: slideInRight 0.5s ease;
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .no-results {
            padding: 60px 20px;
            text-align: center;
        }
        
        .no-results i {
            color: #ccc;
            margin-bottom: 20px;
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .card-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            font-size: 20px;
        }
        
        .card-text {
            font-size: 14px;
            height: 42px;
            overflow: hidden;
            color: #666;
            line-height: 1.5;
        }
        
        .price-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }
        
        @media (max-width: 768px) {
            .logo { 
                font-size: 22px;
            }
            
            .search-box { 
                margin-top: 20px;
            }
            
            .image-container {
                height: 200px;
            }
            
            .user-name { 
                display: none;
            }
            
            .filter-btn {
                padding: 10px 20px;
                font-size: 14px;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .price {
                font-size: 22px;
            }
            
            .top-bar {
                padding: 15px 0;
            }
        }
        
        @media (max-width: 576px) {
            .badge-tipe {
                top: 10px;
                right: 10px;
                padding: 8px 15px;
                font-size: 11px;
            }
            
            .filter-tabs {
                margin: 20px 0;
            }
        }
        
        a, button, .card, .badge, .filter-btn {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-6">
                    <a href="/ana/ManajementHotel_CI4_New/public/home" class="logo">
                        <i class="fas fa-hotel"></i> Hotelku
                    </a>
                </div>
                <div class="col-md-7 col-12 order-md-2 order-3">
                    <form action="<?= base_url('/search') ?>" method="post" class="search-box">
                        <?= csrf_field() ?>
                        <div class="row g-0 align-items-center">
                            <div class="col">
                                <input type="text" name="keyword" class="form-control" 
                                       placeholder="Cari hotel, villa, atau apartemen..." 
                                       value="<?= esc($keyword) ?>">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-6 text-end order-md-3 order-2">
                    <div class="user-menu d-flex align-items-center justify-content-end">
                        <span class="user-name d-none d-md-inline"><?= esc(session('nama')) ?></span>
                        <div class="dropdown">
                            <a href="#" class="profil-icon" data-bs-toggle="dropdown">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="/ana/ManajementHotel_CI4_New/public/profil">
                                        <i class="fas fa-user-circle me-2"></i>Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="/ana/ManajementHotel_CI4_New/public/logout">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Filter Tabs -->
    <div class="container">
        <div class="filter-tabs">
            <a href="/ana/ManajementHotel_CI4_New/public/home?tipe=semua" class="filter-btn <?= $tipe_aktif == 'semua' ? 'active' : '' ?>">
                <i class="fas fa-th"></i> Semua
            </a>
            <a href="/ana/ManajementHotel_CI4_New/public/home?tipe=hotel" class="filter-btn <?= $tipe_aktif == 'hotel' ? 'active' : '' ?>">
                <i class="fas fa-hotel"></i> Hotel
            </a>
            <a href="/ana/ManajementHotel_CI4_New/public/home?tipe=villa" class="filter-btn <?= $tipe_aktif == 'villa' ? 'active' : '' ?>">
                <i class="fas fa-home"></i> Villa
            </a>
            <a href="/ana/ManajementHotel_CI4_New/public/home?tipe=apart" class="filter-btn <?= $tipe_aktif == 'apart' ? 'active' : '' ?>">
                <i class="fas fa-building"></i> Apartemen
            </a>
        </div>
    </div>

    <!-- Daftar Akomodasi -->
    <div class="container mb-5">
        <div class="row">
            <?php if(empty($akomodasi)): ?>
                <div class="col-12 no-results">
                    <i class="fas fa-search fa-5x"></i>
                    <h4 class="text-muted mt-4">Tidak ada hasil ditemukan</h4>
                    <p class="text-muted">Coba kata kunci lain atau ubah filter pencarian</p>
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach($akomodasi as $item): ?>
                        <div class="col-lg-4 col-md-6 col-12">
                            <a href="/ana/ManajementHotel_CI4_New/public/detail/<?= $item['id'] ?>" class="card-link">
                                <div class="card card-akomodasi">
                                    <div class="image-container">
                                        <?php if(!empty($item['foto_utama']) && file_exists('uploads/akomodasi/' . $item['foto_utama'])): ?>
                                            <img src="<?= base_url('uploads/akomodasi/' . $item['foto_utama']) ?>"
                                                alt="<?= esc($item['nama']) ?>">
                                        <?php else: ?>
                                            <div class="default-image">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        <?php endif; ?>
                                        <span class="badge badge-<?= $item['tipe'] ?> badge-tipe">
                                            <?= ucfirst($item['tipe']) ?>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?= esc($item['nama']) ?></h5>
                                        <div class="location mb-3">
                                            <i class="fas fa-map-marker-alt"></i> 
                                            <span><?= esc($item['kota']) ?></span>
                                        </div>
                                        <div class="rating mb-3">
                                            <i class="fas fa-star"></i> <?= number_format($item['rating'], 1) ?>
                                        </div>
                                        <p class="card-text">
                                            <?= esc($item['deskripsi']) ?>
                                        </p>
                                        <div class="price-container">
                                            <div class="price">
                                                Rp <?= number_format(500000 + ($item['id'] * 100000), 0, ',', '.') ?>
                                            </div>
                                            <small class="text-muted">/ malam</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>  
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll enhancement
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add stagger animation to cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card-akomodasi');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
</body>
</html>