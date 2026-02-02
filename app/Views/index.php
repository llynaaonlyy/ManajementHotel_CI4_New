<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelku - Platform Pemesanan Hotel, Villa & Apartemen Terbaik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></style>
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
            overflow-x: hidden;
        }
        
        /* Navbar */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0,0,0,0.1);
            padding: 25px 0;
            transition: all 0.3s ease;
        }
        
        .navbar-custom.scrolled {
            padding: 15px 0;
            box-shadow: 0 8px 40px rgba(102, 126, 234, 0.2);
        }
        
        .logo {
            font-size: 35px;
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
        
        .nav-link {
            color: #333 !important;
            font-weight: 600;
            margin: 0 10px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .btn-nav-login {
            background: transparent;
            border: 2px solid #2563eb;
            color: #2563eb !important;
            padding: 10px 30px;
            border-radius: 30px;
            font-weight: 700;
            transition: all 0.3s ease;
        }
        
        .btn-nav-login:hover {
            background: #2563eb;
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
        }
        
        .btn-nav-register {
            background: #2563eb;
            border: none;
            color: white !important;
            padding: 10px 30px;
            border-radius: 30px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        .btn-nav-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 100px;
        }
        
        /* Animated background shapes */
        .hero-section::before,
        .hero-section::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
        }
        
        .hero-section::before {
            width: 500px;
            height: 500px;
            top: -200px;
            left: -200px;
            animation: float1 8s ease-in-out infinite;
        }
        
        .hero-section::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            right: -150px;
            animation: float2 10s ease-in-out infinite;
        }
        
        @keyframes float1 {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(50px, 50px) scale(1.1);
            }
        }
        
        @keyframes float2 {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(-50px, -50px) scale(1.15);
            }
        }
        
        .hero-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
            animation: float 6s ease-in-out infinite;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            top: 20%;
            right: 10%;
            animation-delay: 0s;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            bottom: 20%;
            left: 15%;
            animation-delay: 2s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(10deg);
            }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            padding: 80px 0;
        }
        
        .hero-title {
            font-size: 64px;
            font-weight: 900;
            margin-bottom: 25px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 26px;
            margin-bottom: 50px;
            opacity: 0.95;
            animation: fadeInUp 1.2s ease;
            font-weight: 400;
            text-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        .btn-hero {
            padding: 18px 50px;
            font-size: 18px;
            font-weight: 700;
            border-radius: 50px;
            border: none;
            margin: 10px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-hero::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-hero:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-hero span {
            position: relative;
            z-index: 1;
        }
        
        .btn-primary-custom {
            background: white;
            color: #ffffff;
            box-shadow: 0 8px 25px rgba(255,255,255,0.3);
            animation: fadeInUp 1.4s ease;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
            color: #2563eb;
        }
        
        .btn-outline-custom {
            background: transparent;
            color: #2563eb;
            border: 3px solid white;
            animation: fadeInUp 1.6s ease;
        }
        
        .btn-outline-custom:hover {
            background: white;
            color: #667eea;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255,255,255,0.4);
        }
        
        /* Scroll indicator */
        .scroll-indicator {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
            animation: bounce-slow 2s infinite;
        }
        
        @keyframes bounce-slow {
            0%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }
        
        .scroll-indicator i {
            font-size: 36px;
            color: white;
            opacity: 0.7;
        }
        
        /* Features Section */
        .features-section {
            padding: 120px 0;
            background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
            position: relative;
        }
        
        .section-title {
            font-size: 48px;
            font-weight: 800;
            color: #333;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 5px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            border-radius: 3px;
        }
        
        .section-subtitle {
            font-size: 20px;
            color: #666;
            margin-bottom: 60px;
        }
        
        .feature-card {
            text-align: center;
            padding: 50px 35px;
            background: white;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            height: 100%;
            margin-bottom: 30px;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.6s ease;
        }
        
        .feature-card:hover::before {
            left: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.4);
            border-color: rgba(102, 126, 234, 0.3);
        }
        
        .feature-icon {
            font-size: 70px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 25px;
            display: inline-block;
            transition: all 0.4s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .feature-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }
        
        .feature-desc {
            color: #666;
            font-size: 16px;
            line-height: 1.7;
        }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            padding: 100px 0;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
            opacity: 0.5;
        }
        
        .stat-item {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
            padding: 30px;
            transition: all 0.3s ease;
        }
        
        .stat-item:hover {
            transform: scale(1.1);
        }
        
        .stat-number {
            font-size: 56px;
            font-weight: 900;
            margin-bottom: 15px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.2);
            animation: countUp 2s ease-out;
        }
        
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stat-label {
            font-size: 20px;
            opacity: 0.95;
            font-weight: 500;
        }
        
        .stat-icon {
            font-size: 40px;
            margin-bottom: 15px;
            opacity: 0.8;
        }
        
        /* CTA Section */
        .cta-section {
            padding: 120px 0;
            background: white;
            text-align: center;
            position: relative;
        }
        
        .cta-title {
            font-size: 48px;
            font-weight: 800;
            color: #333;
            margin-bottom: 25px;
            line-height: 1.3;
        }
        
        .cta-subtitle {
            font-size: 22px;
            color: #666;
            margin-bottom: 50px;
            line-height: 1.6;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Footer */
        footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 60px 0 30px;
            position: relative;
        }
        
        footer h5 {
            font-weight: 700;
            margin-bottom: 25px;
            font-size: 20px;
        }
        
        footer a {
            transition: all 0.3s ease;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        footer a:hover {
            color: #3b82f6 !important;
            transform: translateX(5px);
        }
        
        footer hr {
            border-color: rgba(255,255,255,0.2);
            margin: 40px 0 30px;
        }
        
        .social-links a {
            display: inline-block;
            width: 45px;
            height: 45px;
            line-height: 45px;
            text-align: center;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            color: #3b82f6 !important;
            transform: translateY(-5px);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease;
        }
        
        /* Mobile Responsive */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 48px;
            }
            
            .hero-subtitle {
                font-size: 20px;
            }
            
            .section-title {
                font-size: 36px;
            }
            
            .cta-title {
                font-size: 36px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar-custom {
                padding: 15px 0;
            }
            
            .logo {
                font-size: 26px;
            }
            
            .hero-section {
                padding-top: 80px;
            }
            
            .hero-title {
                font-size: 36px;
            }
            
            .hero-subtitle {
                font-size: 18px;
            }
            
            .btn-hero {
                padding: 15px 35px;
                font-size: 16px;
            }
            
            .section-title {
                font-size: 32px;
            }
            
            .section-subtitle {
                font-size: 16px;
            }
            
            .feature-card {
                padding: 40px 25px;
            }
            
            .stat-number {
                font-size: 42px;
            }
            
            .stat-label {
                font-size: 16px;
            }
            
            .cta-title {
                font-size: 28px;
            }
            
            .cta-subtitle {
                font-size: 18px;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 28px;
            }
            
            .hero-subtitle {
                font-size: 16px;
            }
            
            .btn-hero {
                padding: 12px 25px;
                font-size: 14px;
                margin: 5px;
            }
            
            .section-title {
                font-size: 28px;
            }
            
            .feature-icon {
                font-size: 50px;
            }
            
            .stat-number {
                font-size: 36px;
            }
        }
        
        /* Smooth scroll padding */
        section {
            scroll-margin-top: 80px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand logo" href="/">
                <i class="fas fa-hotel me-2"></i>Hotelku
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-nav-login" href="auth/login">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-nav-register" href="auth/register">
                            <i class="fas fa-user-plus me-2"></i>Daftar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-shape shape-1"></div>
        <div class="hero-shape shape-2"></div>
        
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    Temukan Akomodasi<br>Impian Anda
                </h1>
                <p class="hero-subtitle">
                    Pesan hotel, villa, dan apartemen terbaik dengan mudah dan cepat
                </p>
                <div>
                    <a href="auth/register" class="btn btn-hero btn-primary-custom">
                        <span>
                            <i class="fas fa-rocket me-2"></i>Mulai Sekarang
                        </span>
                    </a>
                    <a href="#features" class="btn btn-hero btn-outline-custom">
                        <span>
                            <i class="fas fa-info-circle me-2"></i>Pelajari Lebih Lanjut
                        </span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Mengapa Memilih Hotelku?</h2>
                <p class="section-subtitle">Platform terbaik untuk memenuhi kebutuhan akomodasi Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search-location"></i>
                        </div>
                        <h3 class="feature-title">Pencarian Mudah</h3>
                        <p class="feature-desc">
                            Temukan akomodasi yang Anda inginkan dengan fitur pencarian canggih dan filter yang lengkap
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h3 class="feature-title">Harga Terbaik</h3>
                        <p class="feature-desc">
                            Dapatkan penawaran harga terbaik untuk hotel, villa, dan apartemen pilihan Anda
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Aman & Terpercaya</h3>
                        <p class="feature-desc">
                            Sistem pembayaran yang aman dan data Anda dijamin terlindungi dengan baik
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="feature-title">Booking 24/7</h3>
                        <p class="feature-desc">
                            Lakukan pemesanan kapan saja, di mana saja, tanpa batasan waktu
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="feature-title">Layanan 24 Jam</h3>
                        <p class="feature-desc">
                            Tim customer service kami siap membantu Anda kapan pun dibutuhkan
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="feature-title">Responsif</h3>
                        <p class="feature-desc">
                            Akses dari perangkat apa pun - desktop, tablet, atau smartphone
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-hotel"></i>
                        </div>
                        <div class="stat-number">10,000+</div>
                        <div class="stat-label">Akomodasi</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-number">50,000+</div>
                        <div class="stat-label">Pengguna</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <div class="stat-number">100+</div>
                        <div class="stat-label">Kota</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-number">4.8/5</div>
                        <div class="stat-label">Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="about">
        <div class="container">
            <h2 class="cta-title">Siap Memulai Perjalanan Anda?</h2>
            <p class="cta-subtitle">
                Bergabunglah dengan ribuan pengguna yang sudah merasakan kemudahan<br>booking akomodasi bersama Hotelku
            </p>
            <a href="auth/register" class="btn btn-hero btn-primary-custom">
                <span>
                    <i class="fas fa-user-plus me-2"></i>Daftar Gratis Sekarang
                </span>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>
                        <i class="fas fa-hotel me-2"></i>Hotelku
                    </h5>
                    <p class="text-white-50 mb-4">
                        Platform pemesanan hotel, villa, dan apartemen terpercaya di Indonesia
                    </p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="auth/login" class="text-white-50 text-decoration-none">Login</a></li>
                        <li><a href="auth/register" class="text-white-50 text-decoration-none">Register</a></li>
                        <li><a href="#features" class="text-white-50 text-decoration-none">Fitur</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Hubungi Kami</h5>
                    <p class="text-white-50">
                        <i class="fas fa-envelope me-2"></i>info@hotelku.com<br>
                        <i class="fas fa-phone me-2"></i>+62 821 2345 6789
                    </p>
                </div>
            </div>
            <hr class="bg-white-50">
            <div class="text-center text-white-50">
                <p class="mb-0">&copy; 2025 Hotelku. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>