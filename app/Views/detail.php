<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($akomodasi['nama']) ?> - Hotelku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }
        
        .top-bar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            animation: slideDown 0.5s ease-out;
        }

        :root {
            --topbar-height: 90px; 
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
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .logo:hover {
            color: white;
            transform: scale(1.05);
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        .top-bar a.text-white {
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 20px;
        }

        .top-bar a.text-white:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
        }

        #photoCarousel {
            max-height: 450px;
            overflow: hidden;
            border-radius: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            position: relative;
            margin-top: 25px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .carousel-img {
            height: 450px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .carousel-item:hover .carousel-img {
            transform: scale(1.05);
        }

        .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .carousel-indicators button.active {
            width: 30px;
            border-radius: 6px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(102, 126, 234, 0.8);
            border-radius: 50%;
            opacity: 0;
            transition: all 0.3s ease;
        }

        #photoCarousel:hover .carousel-control-prev,
        #photoCarousel:hover .carousel-control-next {
            opacity: 1;
        }

        .carousel-control-prev {
            left: 20px;
        }

        .carousel-control-next {
            right: 20px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin: 40px 0 25px 0;
            color: #2d3748;
            position: relative;
            padding-left: 20px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            animation: expandHeight 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes expandHeight {
            from {
                height: 0;
            }
            to {
                height: 100%;
            }
        }

        .highlight-item {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 12px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .highlight-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .highlight-item:hover::before {
            left: 100%;
        }

        .highlight-item:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.2);
            border-left-width: 6px;
        }

        .facility-item {
            display: inline-block;
            padding: 12px 24px;
            margin: 6px;
            background: linear-gradient(135deg, #e8eaf6 0%, #c5cae9 100%);
            border-radius: 25px;
            color: #667eea;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(102, 126, 234, 0.15);
        }

        .facility-item:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .policy-box {
            background: linear-gradient(135deg, #fff9e6 0%, #fff3cd 100%);
            padding: 25px;
            border-radius: 15px;
            border: 2px solid #ffc107;
            box-shadow: 0 5px 20px rgba(255, 193, 7, 0.2);
            transition: all 0.3s ease;
        }

        .policy-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(255, 193, 7, 0.3);
        }

        .room-card {
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.4s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .room-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .room-card:hover::before {
            opacity: 1;
        }

        .room-card:hover {
            border-color: #667eea;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.25);
            transform: translateY(-8px);
        }

        .room-card img {
            border-radius: 12px;
            transition: all 0.4s ease;
        }

        .room-card:hover img {
            transform: scale(1.08);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .room-price {
            color: #667eea;
            font-size: 32px;
            font-weight: 800;
            text-shadow: 0 2px 10px rgba(102, 126, 234, 0.2);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .btn-pesan {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px 35px;
            border-radius: 30px;
            font-weight: 700;
            transition: all 0.4s ease;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-pesan::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-pesan:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-pesan:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-pesan:active {
            transform: translateY(-1px);
        }

        .btn-disabled {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
            color: #ffffff !important;
            cursor: not-allowed;
            padding: 14px 35px;
            border-radius: 30px;
            font-weight: 700;
            opacity: 0.7;
        }

        .badge-available {
            background: linear-gradient(135deg, #16a34a 0%, #15803d 100%);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(22, 163, 74, 0.3);
            animation: fadeIn 0.5s ease-out;
        }

        .badge-maintenance {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .date-input-group {
            background: white;
            border: 3px solid transparent;
            background-image: linear-gradient(white, white), 
            linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-origin: border-box;
            background-clip: padding-box, border-box;
            border-radius: 20px;
            padding: 25px;
            margin: 30px 0;
            position: sticky;
            top: calc(var(--topbar-height) + 20px); 
            z-index: 900;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.15);
            transition: all 0.3s ease;
        }
 
        .date-input-group:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(102, 126, 234, 0.25);
        }

        .date-input-group .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .date-input-group .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .alert-info {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border: 2px solid #2196f3;
            border-radius: 12px;
            color: #1565c0;
            font-weight: 600;
        }

        .ratio iframe {
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .ratio:hover iframe {
            box-shadow: 0 8px 35px rgba(0, 0, 0, 0.15);
        }

        .badge.bg-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
        }

        #photoCarousel {
            margin-bottom: 60px;
        }

        #photoCarousel {
            position: relative;
            z-index: 1;
        }

        .container.my-5 {
            position: relative;
            z-index: 2;
        }

        .date-input-group {
            background: white;
            border: 2px solid #667eea;
            border-radius: 10px;
            padding: 20px;
            margin: 30px 0;
        }

        @media (min-width: 992px) {
            .col-lg-4 {
                padding-top: 40px; 
            }
        }

        @media (max-width: 991px) {
            .date-input-group {
                position: static;
                margin-top: 30px;
            }
        }
        
        @media (max-width: 768px) {
            .carousel-img { 
                height: 300px; 
            }
            
            #photoCarousel {
                max-height: 300px;
            }
            
            .logo { 
                font-size: 22px; 
            }
            
            .section-title {
                font-size: 24px;
            }
            
            .room-price {
                font-size: 26px;
            }
            
            .carousel-control-prev,
            .carousel-control-next {
                width: 45px;
                height: 45px;
            }
        }

        html {
            scroll-behavior: smooth;
        }

        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="/home" class="logo">
                        <i class="fas fa-hotel"></i> Hotelku
                    </a>
                </div>
                <div class="col-6 text-end">
                    <a href="/home" class="text-white">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel Gambar -->
    <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php 
            $totalFoto = !empty($foto) ? count($foto) : 1;
            for ($i = 0; $i < $totalFoto; $i++): 
            ?>
                <button type="button"
                    data-bs-target="#photoCarousel"
                    data-bs-slide-to="<?= $i ?>"
                    <?= $i == 0 ? 'class="active"' : '' ?>>
                </button>
            <?php endfor; ?>
        </div>
        <div class="carousel-inner">
            <?php if (!empty($foto)): ?>
                <?php foreach ($foto as $index => $f): ?>
                    <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                        <img src="<?= base_url('uploads/akomodasi/' . $f['foto']) ?>"
                            class="d-block w-100 carousel-img"
                            alt="Foto <?= $index + 1 ?>">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item active">
                    <img src="<?= base_url('uploads/akomodasi/' . $akomodasi['foto_utama']) ?>"
                        class="d-block w-100 carousel-img"
                        alt="Foto utama">
                </div>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Detail Informasi -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Info Dasar -->
                <div class="fade-in">
                    <h1 class="mb-3"><?= esc($akomodasi['nama']) ?></h1>
                    <div class="mb-4">
                        <span class="badge bg-primary text-uppercase"><?= esc($akomodasi['tipe']) ?></span>
                        <span class="ms-3">
                            <i class="fas fa-star text-warning"></i> 
                            <strong><?= number_format($akomodasi['rating'], 1) ?></strong>
                        </span>
                        <span class="ms-3 text-muted">
                            <i class="fas fa-map-marker-alt"></i> <?= esc($akomodasi['alamat']) ?>
                        </span>
                    </div>
                    <p class="lead"><?= esc($akomodasi['deskripsi']) ?></p>
                </div>

                <!-- Highlights -->
                <?php if(!empty($highlights)): ?>
                    <h3 class="section-title">Highlight</h3>
                    <?php foreach($highlights as $h): ?>
                        <div class="highlight-item fade-in">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <?= esc($h['highlight']) ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Fasilitas -->
                <?php if(!empty($fasilitas)): ?>
                    <h3 class="section-title">Fasilitas</h3>
                    <div class="fade-in">
                        <?php foreach($fasilitas as $f): ?>
                            <div class="facility-item">
                                <i class="fas <?= esc($f['icon']) ?> me-2"></i>
                                <?= esc($f['nama_fasilitas']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Lokasi -->
                <h3 class="section-title">Lokasi</h3>
                <div class="mb-4 fade-in">
                    <p><i class="fas fa-map-marker-alt text-danger me-2"></i> 
                       <?= esc($akomodasi['alamat']) ?>, <?= esc($akomodasi['kota']) ?>
                    </p>
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.23698114427!2d106.68942945!3d-6.229386649999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sen!2sid!4v1234567890" 
                                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Kebijakan -->
                <?php if(!empty($kebijakan)): ?>
                    <h3 class="section-title">Kebijakan Akomodasi</h3>
                    <div class="policy-box fade-in">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong><i class="fas fa-sign-in-alt me-2"></i>Check-in:</strong>
                                <?= date('H:i', strtotime($kebijakan['check_in'])) ?>
                            </div>
                            <div class="col-md-6">
                                <strong><i class="fas fa-sign-out-alt me-2"></i>Check-out:</strong>
                                <?= date('H:i', strtotime($kebijakan['check_out'])) ?>
                            </div>
                        </div>
                        <?php if($kebijakan['kebijakan_pembatalan']): ?>
                            <p><strong>Kebijakan Pembatalan:</strong><br>
                               <?= esc($kebijakan['kebijakan_pembatalan']) ?>
                            </p>
                        <?php endif; ?>
                        <?php if($kebijakan['aturan_lainnya']): ?>
                            <p><strong>Aturan Lainnya:</strong><br>
                               <?= esc($kebijakan['aturan_lainnya']) ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar Booking -->
            <div class="col-lg-4">
                <div class="date-input-group">
                    <h5 class="mb-3">Pilih Tanggal Menginap</h5>
                    <form id="dateForm">
                        <div class="mb-3">
                            <label class="form-label">Check-in</label>
                            <input type="date" class="form-control" id="checkinDate" 
                                   value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Check-out</label>
                            <input type="date" class="form-control" id="checkoutDate" 
                                   value="<?= date('Y-m-d', strtotime('+1 day')) ?>" 
                                   min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                        </div>
                        <div class="alert alert-info">
                            <strong id="nightCount">1</strong> malam menginap
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tipe Kamar -->
        <h3 class="section-title mt-5">Tipe Kamar</h3>
        <div class="row">
            <?php if(!empty($tipe_kamar)): ?>
                <?php foreach($tipe_kamar as $tk): ?>
                    <div class="col-12">
                        <div class="room-card fade-in">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <img src="<?= base_url('uploads/akomodasi/' . $tk['foto']) ?>"
                                        class="img-fluid rounded"
                                        alt="<?= esc($tk['nama_tipe']) ?>">
                                </div>
                                <div class="col-md-6">
                                    <h4><?= esc($tk['nama_tipe']) ?></h4>
                                    <?php if ($tk['status'] === 'maintenance'): ?>
                                        <span class="badge badge-maintenance">Maintenance</span>
                                    <?php else: ?>
                                        <span class="badge badge-available">Available</span>
                                    <?php endif; ?>
                                    <p class="text-muted mb-2">
                                        <i class="fas fa-users me-2"></i><?= $tk['kapasitas'] ?> Tamu
                                        <span class="ms-3">
                                            <i class="fas fa-ruler-combined me-2"></i><?= esc($tk['ukuran_kamar']) ?>
                                        </span>
                                    </p>
                                    <p class="mb-2"><?= esc($tk['fasilitas_kamar']) ?></p>
                                    <small class="text-muted">Tersedia: <?= $tk['stok_kamar'] ?> kamar</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="room-price mb-3">
                                        Rp <?= number_format($tk['harga_per_malam'], 0, ',', '.') ?>
                                    </div>
                                    <small class="text-muted d-block mb-3">/ malam</small>
                                    <?php if ($tk['status'] === 'available'): ?>
                                        <a href="#" 
                                        class="btn btn-pesan w-100 btn-booking"
                                        data-kamar-id="<?= $tk['id'] ?>">
                                            Pesan Sekarang
                                        </a>
                                    <?php else: ?>
                                        <button class="btn btn-pesan w-100 btn-disabled" disabled>
                                            Sedang Maintenance
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning">
                        Belum ada tipe kamar tersedia untuk akomodasi ini.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Prevent carousel click propagation on back button
        const backLink = document.querySelector('.top-bar a[href="/home"]');
        if (backLink) {
            backLink.addEventListener('click', function(e) {
                e.stopPropagation();
                e.preventDefault();
                window.location.href = '/home';
            });
        }

        // Hitung jumlah malam
        const checkinInput = document.getElementById('checkinDate');
        const checkoutInput = document.getElementById('checkoutDate');
        const nightCount = document.getElementById('nightCount');

        function calculateNights() {
            const checkin = new Date(checkinInput.value);
            const checkout = new Date(checkoutInput.value);
            const diff = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));
            nightCount.textContent = diff > 0 ? diff : 1;
        }

        checkinInput.addEventListener('change', function() {
            const minCheckout = new Date(this.value);
            minCheckout.setDate(minCheckout.getDate() + 1);
            checkoutInput.min = minCheckout.toISOString().split('T')[0];
            if(new Date(checkoutInput.value) <= new Date(this.value)) {
                checkoutInput.value = minCheckout.toISOString().split('T')[0];
            }
            calculateNights();
        });

        checkoutInput.addEventListener('change', calculateNights);

        // Booking button
        document.querySelectorAll('.btn-booking').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const kamarId = this.dataset.kamarId;
                const checkin = checkinInput.value;
                const checkout = checkoutInput.value;
                window.location.href = `/pemesanan/${kamarId}?checkin=${checkin}&checkout=${checkout}`;
            });
        });

        // =============== ADDITIONAL JAVASCRIPT ENHANCEMENTS ===============

        const starRating = document.querySelector('.fa-star');
        if (starRating) {
            starRating.addEventListener('mouseenter', function() {
                this.style.transform = 'rotate(360deg) scale(1.3)';
                this.style.transition = 'all 0.5s ease';
            });
            starRating.addEventListener('mouseleave', function() {
                this.style.transform = 'rotate(0deg) scale(1)';
            });
        }

        const highlightItems = document.querySelectorAll('.highlight-item');
        highlightItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.1}s`;
        });

        const roomCards = document.querySelectorAll('.room-card');
        roomCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.15}s`;
        });

        document.querySelectorAll('.facility-item').forEach(item => {
            item.addEventListener('click', function() {
                this.style.animation = 'none';
                setTimeout(() => {
                    this.style.animation = 'fadeIn 0.3s ease-out';
                }, 10);
            });
        });

        const priceElements = document.querySelectorAll('.room-price');
        priceElements.forEach(priceEl => {
            const priceText = priceEl.textContent;
            const priceNumber = parseInt(priceText.replace(/\D/g, ''));
            
            if (!isNaN(priceNumber)) {
                let currentNumber = 0;
                const increment = priceNumber / 50;
                const duration = 1000;
                const stepTime = duration / 50;
                
                const counter = setInterval(() => {
                    currentNumber += increment;
                    if (currentNumber >= priceNumber) {
                        currentNumber = priceNumber;
                        clearInterval(counter);
                    }
                    priceEl.textContent = 'Rp ' + Math.floor(currentNumber).toLocaleString('id-ID');
                }, stepTime);
            }
        });

        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('scrollTo') === 'rooms') {
            setTimeout(() => {
                const roomSection = document.querySelector('.room-card');
                if (roomSection) {
                    roomSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }, 500);
        }

        document.querySelectorAll('.btn-pesan:not(.btn-disabled)').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple-effect');
                
                this.appendChild(ripple);
                
                setTimeout(() => ripple.remove(), 600);
            });
        });

        const dateInputs = document.querySelectorAll('.date-input-group input[type="date"]');
        dateInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        function animateNightCount() {
            nightCount.style.transform = 'scale(1.3)';
            nightCount.style.color = '#667eea';
            setTimeout(() => {
                nightCount.style.transform = 'scale(1)';
                nightCount.style.transition = 'all 0.3s ease';
            }, 300);
        }

        checkinInput.addEventListener('change', animateNightCount);
        checkoutInput.addEventListener('change', animateNightCount);

        const images = document.querySelectorAll('img');
        images.forEach(img => {
            img.style.opacity = '0';
            img.style.transition = 'opacity 0.5s ease';
            
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });
            
            // If already cached
            if (img.complete) {
                img.style.opacity = '1';
            }
        });

        const carousel = document.querySelector('#photoCarousel');
        if (carousel) {
            carousel.addEventListener('mouseenter', () => {
                const bsCarousel = bootstrap.Carousel.getInstance(carousel);
                if (bsCarousel) bsCarousel.pause();
            });
            carousel.addEventListener('mouseleave', () => {
                const bsCarousel = bootstrap.Carousel.getInstance(carousel);
                if (bsCarousel) bsCarousel.cycle();
            });
        }

        document.querySelectorAll('.btn-booking').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!this.classList.contains('loading')) {
                    this.classList.add('loading');
                    const originalText = this.textContent;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.classList.remove('loading');
                    }, 3000);
                }
            });
        });

        const mapContainer = document.querySelector('.ratio');
        if (mapContainer) {
            const mapOverlay = document.createElement('div');
            mapOverlay.style.cssText = `
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: transparent;
                cursor: pointer;
                z-index: 1;
            `;
            mapOverlay.addEventListener('click', function() {
                this.style.display = 'none';
                mapContainer.querySelector('iframe').style.pointerEvents = 'auto';
            });
            mapContainer.style.position = 'relative';
            mapContainer.appendChild(mapOverlay);
        }

        const backToTop = document.createElement('button');
        backToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
        backToTop.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        `;
        document.body.appendChild(backToTop);

        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'hidden';
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        backToTop.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) translateY(-5px)';
        });

        backToTop.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) translateY(0)';
        });

        console.log('%c🏨 Hotelku - Premium Booking Experience', 
            'color: #667eea; font-size: 20px; font-weight: bold;');
        console.log('%cBuild with ❤️ by Hotelku Team', 
            'color: #764ba2; font-size: 14px;');
    </script>
</body>
</html>