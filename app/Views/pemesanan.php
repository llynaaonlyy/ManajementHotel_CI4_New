<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan - Hotelku</title>
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
            padding-bottom: 50px;
        }
        
        .top-bar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            animation: slideDown 0.5s ease-out;
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
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }
        
        .logo:hover {
            color: white;
            transform: scale(1.05);
            text-shadow: 0 0 20px rgba(255,255,255,0.5);
        }
        
        .logo i {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        .back-link {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 25px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
        }
        
        .back-link:hover {
            color: white;
            background: rgba(255,255,255,0.2);
            transform: translateX(-5px);
        }
        
        .booking-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
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
        
        .page-title {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
            font-weight: 700;
            font-size: 32px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .info-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .info-card:hover {
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.2);
            border-color: rgba(102, 126, 234, 0.1);
            transform: translateY(-3px);
        }
        
        .section-title {
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid #667eea;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title::before {
            content: '';
            width: 6px;
            height: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 3px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
            transition: all 0.3s ease;
            align-items: center;
        }
        
        .detail-row:hover {
            background: #f8f9ff;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 8px;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            color: #666;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-label i {
            color: #667eea;
            width: 20px;
            text-align: center;
        }
        
        .detail-value {
            color: #333;
            font-weight: 600;
            text-align: right;
        }
        
        .payment-option {
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
            position: relative;
            overflow: hidden;
        }
        
        .payment-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .payment-option:hover::before {
            left: 100%;
        }
        
        .payment-option:hover {
            border-color: #667eea;
            background: #f8f9ff;
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
        }
        
        .payment-option input[type="radio"] {
            margin-right: 15px;
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #667eea;
        }
        
        .payment-option.selected {
            border-color: #667eea;
            background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.25);
            transform: scale(1.02);
        }
        
        .payment-option.selected::after {
            content: '✓';
            position: absolute;
            top: 15px;
            right: 20px;
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            animation: checkMark 0.3s ease;
        }
        
        @keyframes checkMark {
            0% {
                transform: scale(0) rotate(-180deg);
            }
            100% {
                transform: scale(1) rotate(0);
            }
        }
        
        .qris-card {
            max-width: 400px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 20px;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            text-align: center;
            animation: scaleIn 0.4s ease;
            border: 3px solid #667eea;
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .qris-header h5 {
            margin: 15px 0 5px;
            font-weight: 700;
            color: #333;
            font-size: 24px;
        }
        
        .qris-header small {
            color: #777;
            font-size: 14px;
        }
        
        .qris-logo {
            width: 100px;
            animation: rotate 3s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .qris-amount {
            font-size: 28px;
            font-weight: bold;
            margin: 20px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .qris-qr {
            padding: 20px;
            border: 3px dashed #667eea;
            border-radius: 15px;
            display: inline-block;
            background: white;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.4);
            }
            50% {
                box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
            }
        }
        
        .qris-footer {
            margin-top: 20px;
            color: #666;
            font-size: 13px;
        }
        
        .total-price h3,
        .detail-row.fw-bold .detail-value {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 24px;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 18px;
            border: none;
            border-radius: 15px;
            width: 100%;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .btn-submit::before {
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
        
        .btn-submit:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.5);
        }
        
        .btn-submit:active {
            transform: translateY(-1px);
        }
        
        .btn-submit:disabled {
            background: #ccc;
            cursor: not-allowed;
            box-shadow: none;
        }
        
        .btn-submit:disabled:hover {
            transform: none;
        }
        
        .btn-submit span {
            position: relative;
            z-index: 1;
        }
        
        .form-control, textarea.form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 18px;
            transition: all 0.3s ease;
            font-size: 15px;
        }
        
        .form-control:focus, textarea.form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }
        
        #previewContainer {
            margin-top: 20px;
            padding: 20px;
            background: #f8f9ff;
            border-radius: 12px;
            animation: slideDown 0.3s ease;
        }
        
        #previewImage {
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            max-height: 350px;
            width: auto;
            margin: 0 auto;
            display: block;
        }
        
        .alert-info {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border: none;
            border-left: 4px solid #2196F3;
            border-radius: 12px;
            padding: 15px 20px;
            color: #1565C0;
        }
        
        hr {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            margin: 20px 0;
        }
        
        /* Payment Info Styles */
        #info-bank ul, #info-ewallet ul {
            list-style: none;
            padding: 0;
        }
        
        #info-bank li, #info-ewallet li {
            padding: 12px 20px;
            margin-bottom: 10px;
            background: #f8f9ff;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
        }
        
        #info-bank li:hover, #info-ewallet li:hover {
            transform: translateX(10px);
            background: #e3f2fd;
        }
        
        #info-cash {
            padding: 20px;
            background: linear-gradient(135deg, #fff3cd 0%, #ffe69c 100%);
            border-radius: 12px;
            border-left: 4px solid #ffc107;
            color: #856404;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .booking-container {
                margin: 20px auto;
                padding: 0 15px;
            }
            
            .page-title {
                font-size: 26px;
                margin-bottom: 30px;
            }
            
            .info-card {
                padding: 25px 20px;
            }
            
            .section-title {
                font-size: 18px;
            }
            
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
                padding: 12px 0;
            }
            
            .detail-value {
                text-align: left;
                font-size: 15px;
            }
            
            .payment-option {
                padding: 15px;
            }
            
            .payment-option.selected::after {
                top: 10px;
                right: 15px;
                width: 25px;
                height: 25px;
                font-size: 14px;
            }
            
            .qris-card {
                padding: 20px;
            }
            
            .qris-amount {
                font-size: 24px;
            }
            
            .btn-submit {
                font-size: 18px;
                padding: 15px;
            }
            
            .top-bar {
                padding: 15px 0;
            }
            
            .back-link {
                font-size: 14px;
                padding: 6px 12px;
            }
        }
        
        @media (max-width: 576px) {
            .page-title {
                font-size: 22px;
            }
            
            .info-card {
                padding: 20px 15px;
            }
            
            .section-title {
                font-size: 16px;
            }
            
            .qris-qr {
                padding: 15px;
            }
            
            #qrcode canvas {
                width: 180px !important;
                height: 180px !important;
            }
        }
        
        /* Smooth transitions for all elements */
        * {
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        
        /* Loading animation for submit button */
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .btn-submit.loading::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border: 3px solid white;
            border-top-color: transparent;
            border-radius: 50%;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            animation: spin 0.8s linear infinite;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="/ana/ManajementHotel_CI4_New/public/home" class="logo">
                        <i class="fas fa-hotel"></i> Hotelku
                    </a>
                </div>
                <div class="col-6 text-end">
                    <a href="/ana/ManajementHotel_CI4_New/public/detail/<?= $akomodasi['id'] ?>" class="back-link">
                        <i class="fas fa-arrow-left"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="booking-container">
        <h2 class="page-title">
            <i class="fas fa-clipboard-check"></i> Detail Pemesanan
        </h2>

        <form action="/ana/ManajementHotel_CI4_New/public/pemesanan/proses" method="post" enctype="multipart/form-data" id="bookingForm">
            <input type="hidden" name="tipe_kamar_id" value="<?= $tipe_kamar['id'] ?>">
            <input type="hidden" name="tanggal_checkin" value="<?= $checkin ?>">
            <input type="hidden" name="tanggal_checkout" value="<?= $checkout ?>">

            <!-- Info Akomodasi -->
            <div class="info-card">
                <div class="section-title">
                    <i class="fas fa-info-circle"></i> Informasi Menginap
                </div>
                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-hotel"></i> Nama Akomodasi
                    </span>
                    <span class="detail-value"><?= esc($akomodasi['nama']) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-map-marker-alt"></i> Lokasi
                    </span>
                    <span class="detail-value"><?= esc($akomodasi['kota']) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-bed"></i> Tipe Kamar
                    </span>
                    <span class="detail-value"><?= esc($tipe_kamar['nama_tipe']) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-calendar-check"></i> Check-in
                    </span>
                    <span class="detail-value">
                        <?= date('d F Y', strtotime($checkin)) ?>
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-calendar-times"></i> Check-out
                    </span>
                    <span class="detail-value">
                        <?= date('d F Y', strtotime($checkout)) ?>
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-moon"></i> Jumlah Malam
                    </span>
                    <span class="detail-value">
                        <?php 
                        $date1 = new DateTime($checkin);
                        $date2 = new DateTime($checkout);
                        $malam = $date2->diff($date1)->days;
                        echo $malam . ' malam';
                        ?>
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-tag"></i> Harga per Malam
                    </span>
                    <span class="detail-value">
                        Rp <?= number_format($tipe_kamar['harga_per_malam'], 0, ',', '.') ?>
                    </span>
                </div>
            </div>

            <!-- Total -->
            <div class="info-card">
                <div class="section-title">
                    <i class="fas fa-calculator"></i> Rincian Pembayaran
                </div>

                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-money-bill"></i> Harga Dasar
                    </span>
                    <span class="detail-value">
                        Rp <?= number_format($harga_dasar, 0, ',', '.') ?>
                    </span>
                </div>

                <div class="detail-row">
                    <span class="detail-label">
                        <i class="fas fa-percent"></i> Biaya Admin + PPN (22%)
                    </span>
                    <span class="detail-value text-danger">
                        Rp <?= number_format($biaya_admin_ppn, 0, ',', '.') ?>
                    </span>
                </div>

                <hr>

                <div class="detail-row fw-bold">
                    <span class="detail-label">
                        <i class="fas fa-receipt"></i> Total Pembayaran
                    </span>
                    <span class="detail-value">
                        Rp <?= number_format($total_akhir, 0, ',', '.') ?>
                    </span>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="info-card">
                <div class="section-title">
                    <i class="fas fa-credit-card"></i> Metode Pembayaran
                </div>
                
                <label class="payment-option">
                    <input type="radio" name="metode_pembayaran" value="tf_bank" required>
                    <i class="fas fa-university fa-lg text-primary"></i>
                    <strong class="ms-2">Transfer Bank</strong>
                    <p class="ms-4 mb-0 small text-muted">BCA, Mandiri, BNI, BRI</p>
                </label>

                <label class="payment-option">
                    <input type="radio" name="metode_pembayaran" value="e_wallet">
                    <i class="fas fa-wallet fa-lg text-success"></i>
                    <strong class="ms-2">E-Wallet</strong>
                    <p class="ms-4 mb-0 small text-muted">GoPay, OVO, DANA, ShopeePay</p>
                </label>

                <label class="payment-option">
                    <input type="radio" name="metode_pembayaran" id="metode-qris" value="qris">
                    <i class="fas fa-qrcode fa-lg text-info"></i>
                    <strong class="ms-2">QRIS</strong>
                    <p class="ms-4 mb-0 small text-muted">Scan QR untuk pembayaran</p>
                </label>

                <label class="payment-option">
                    <input type="radio" name="metode_pembayaran" value="cash">
                    <i class="fas fa-money-bill-wave fa-lg text-warning"></i>
                    <strong class="ms-2">Cash</strong>
                    <p class="ms-4 mb-0 small text-muted">Bayar di tempat</p>
                </label>
            </div>

            <!-- Info Pembayaran Dinamis -->
            <div class="info-card d-none" id="paymentInfoCard">
                <div class="section-title">
                    <i class="fas fa-info-circle"></i> Informasi Pembayaran
                </div>

                <!-- Transfer Bank -->
                <div id="info-bank" class="d-none">
                    <p><strong><i class="fas fa-university me-2"></i>Silakan transfer ke rekening berikut:</strong></p>
                    <ul class="mb-0">
                        <li><i class="fas fa-building me-2"></i>BCA: 1234567890 a.n Hotelku</li>
                        <li><i class="fas fa-building me-2"></i>Mandiri: 9876543210 a.n Hotelku</li>
                    </ul>
                </div>

                <!-- E-Wallet -->
                <div id="info-ewallet" class="d-none">
                    <p><strong><i class="fas fa-wallet me-2"></i>Nomor E-Wallet:</strong></p>
                    <ul class="mb-0">
                        <li><i class="fas fa-mobile-alt me-2"></i>GoPay / OVO / DANA: <strong>0812-3456-7890</strong></li>
                    </ul>
                </div>

                <!-- QRIS CARD -->
                <div id="qris-wrapper" class="qris-card d-none">
                    <div class="qris-header">
                        <i class="fas fa-qrcode fa-3x text-primary mb-3"></i>
                        <h5>Hotelku</h5>
                        <small>Pembayaran via QRIS</small>
                    </div>

                    <div class="qris-amount">
                        <i class="fas fa-coins me-2"></i>
                        Rp <?= number_format($total_akhir, 0, ',', '.') ?>
                    </div>

                    <div class="qris-qr">
                        <div id="qrcode"></div>
                    </div>
                    
                    <div class="qris-footer">
                        <small><i class="fas fa-shield-alt me-1"></i>Scan QR dengan aplikasi pembayaran Anda</small>
                    </div>
                </div>

                <!-- Cash -->
                <div id="info-cash" class="d-none">
                    <i class="fas fa-hand-holding-usd fa-2x mb-3"></i>
                    <p class="mb-0">
                        <strong>Pembayaran dilakukan langsung di lokasi saat check-in.</strong>
                        Silakan tunjukkan bukti pemesanan kepada petugas.
                    </p>
                </div>
            </div>

            <!-- Bukti Pembayaran -->
            <div class="info-card d-none" id="buktiPembayaranCard">
                <div class="section-title">
                    <i class="fas fa-file-upload"></i> Bukti Pembayaran
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="fas fa-image me-2"></i>Upload bukti transfer/pembayaran</label>
                    <input type="file"
                        name="bukti_pembayaran"
                        class="form-control"
                        accept="image/*"
                        onchange="previewBukti(event)">
                    <small class="text-muted"><i class="fas fa-info-circle me-1"></i>Format: JPG, PNG, maksimal 5MB</small>
                </div>

                <div class="mt-3 d-none" id="previewContainer">
                    <p class="mb-2"><strong><i class="fas fa-eye me-2"></i>Preview:</strong></p>
                    <img id="previewImage" class="img-fluid rounded">
                </div>
            </div>

             <!-- Catatan -->
            <div class="info-card">
                <div class="section-title">Catatan (Opsional)</div>
                <textarea class="form-control" name="catatan" rows="3" 
                          placeholder="Tambahkan catatan khusus untuk pemesanan Anda..."></textarea>
            </div>

            <button type="submit" class="btn btn-submit" id="btnSubmit" disabled>
                <i class="fas fa-check-circle me-2"></i>Konfirmasi Pemesanan
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        const paymentInfoCard = document.getElementById('paymentInfoCard');
        const buktiCard = document.getElementById('buktiPembayaranCard');

        const infoBank = document.getElementById('info-bank');
        const infoEwallet = document.getElementById('info-ewallet');
        const infoCash = document.getElementById('info-cash');

        function hideAllInfo() {
            infoBank.classList.add('d-none');
            infoEwallet.classList.add('d-none');
            infoCash.classList.add('d-none');
        }

        document.querySelectorAll('input[name="metode_pembayaran"]').forEach(radio => {
            radio.addEventListener('change', function () {
                paymentInfoCard.classList.remove('d-none');
                hideAllInfo();

                if (this.value === 'tf_bank') infoBank.classList.remove('d-none');
                if (this.value === 'e_wallet') infoEwallet.classList.remove('d-none');
                if (this.value === 'cash') infoCash.classList.remove('d-none');

                // Bukti pembayaran hanya muncul kalau bukan cash
                if (this.value === 'cash') {
                    buktiCard.classList.add('d-none');
                } else {
                    buktiCard.classList.remove('d-none');
                }
            });
        });

        function previewBukti(event) {
            const img = document.getElementById('previewImage');
            const container = document.getElementById('previewContainer');

            img.src = URL.createObjectURL(event.target.files[0]);
            container.classList.remove('d-none');
        }

        const btnSubmit = document.getElementById('btnSubmit');
        const buktiInput = document.querySelector('input[name="bukti_pembayaran"]');

        function checkSubmitAvailability(metode) {
            if (metode === 'cash') {
                btnSubmit.disabled = false;
            } else {
                btnSubmit.disabled = !buktiInput.files.length;
            }
        }

        // saat metode pembayaran dipilih
        document.querySelectorAll('input[name="metode_pembayaran"]').forEach(radio => {
            radio.addEventListener('change', function () {
                checkSubmitAvailability(this.value);
            });
        });

        // saat upload bukti
        if (buktiInput) {
            buktiInput.addEventListener('change', function () {
                const metode = document.querySelector('input[name="metode_pembayaran"]:checked')?.value;
                if (metode) checkSubmitAvailability(metode);
            });
        }

        // Highlight payment option when selected
        document.querySelectorAll('.payment-option input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.payment-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                this.closest('.payment-option').classList.add('selected');
            });
        });
    </script>
    <script>
        const qrisWrapper = document.getElementById('qris-wrapper');
        const metodeRadios = document.querySelectorAll('input[name="metode_pembayaran"]');

        const totalHarga = <?= $total_akhir ?>;

        function generateQRIS() {
            document.getElementById("qrcode").innerHTML = "";

            const payload = `
        QRIS
        Hotelku
        TOTAL:${totalHarga}
        REF:${Date.now()}
            `.trim();

            new QRCode(document.getElementById("qrcode"), {
                text: payload,
                width: 200,
                height: 200
            });
        }

        metodeRadios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'qris') {
                    qrisWrapper.classList.remove('d-none');
                    generateQRIS();
                } else {
                    qrisWrapper.classList.add('d-none');
                }
            });
        });
        </script>

</body>
</html>