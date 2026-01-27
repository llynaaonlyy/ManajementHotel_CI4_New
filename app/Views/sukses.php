<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Berhasil - Hotelku</title>
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
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        .success-container {
            max-width: 650px;
            width: 100%;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.8s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .success-card {
            background: white;
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            position: relative;
            overflow: hidden;
        }
        
        .success-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #667eea);
            background-size: 200% 100%;
            animation: gradient 3s ease infinite;
        }
        
        @keyframes gradient {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }
        
        .success-icon {
            font-size: 120px;
            color: #4CAF50;
            animation: scaleIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            position: relative;
            display: inline-block;
        }
        
        @keyframes scaleIn {
            0% {
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }
            50% {
                transform: scale(1.2) rotate(0deg);
            }
            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }
        
        .success-icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 140px;
            height: 140px;
            background: rgba(76, 175, 80, 0.1);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.5;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.3);
                opacity: 0;
            }
        }
        
        .success-title {
            margin-top: 30px;
            margin-bottom: 15px;
            font-size: 32px;
            font-weight: 700;
            color: #333;
            animation: fadeIn 0.8s ease 0.3s both;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .success-subtitle {
            color: #666;
            font-size: 16px;
            animation: fadeIn 0.8s ease 0.4s both;
        }
        
        .booking-code {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 20px;
            margin: 35px 0;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            animation: fadeIn 0.8s ease 0.5s both;
            position: relative;
            overflow: hidden;
        }
        
        .booking-code::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            animation: rotate 10s linear infinite;
        }
        
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        
        .booking-code small {
            display: block;
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }
        
        .booking-code h3 {
            font-size: 36px;
            font-weight: 800;
            margin: 0;
            letter-spacing: 3px;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        .booking-code-icon {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 60px;
            opacity: 0.15;
            z-index: 0;
        }
        
        .status-badge {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #FFC107 0%, #FFD54F 100%);
            color: #333;
            border-radius: 30px;
            font-weight: 700;
            margin: 25px 0;
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.4);
            animation: fadeIn 0.8s ease 0.6s both, wiggle 1s ease 1s;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
        }
        
        @keyframes wiggle {
            0%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(-3deg);
            }
            75% {
                transform: rotate(3deg);
            }
        }
        
        .detail-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 30px;
            border-radius: 20px;
            text-align: left;
            margin: 30px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            animation: fadeIn 0.8s ease 0.7s both;
            border: 2px solid rgba(102, 126, 234, 0.1);
        }
        
        .detail-box h5 {
            margin-bottom: 25px;
            font-weight: 700;
            color: #333;
            font-size: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #667eea;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .detail-box h5::before {
            content: '';
            width: 5px;
            height: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 3px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            transition: all 0.3s ease;
            border-radius: 8px;
        }
        
        .detail-row:hover {
            background: rgba(102, 126, 234, 0.05);
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .detail-row .label {
            color: #666;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .detail-row .label i {
            color: #667eea;
            width: 20px;
            text-align: center;
        }
        
        .detail-row .value {
            font-weight: 600;
            color: #333;
            text-align: right;
        }
        
        .detail-box hr {
            border: none;
            height: 2px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            margin: 20px 0;
        }
        
        .total-row {
            padding: 15px 0;
            font-size: 18px;
        }
        
        .total-row .value {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 24px;
            font-weight: 800;
        }
        
        .alert {
            border-radius: 15px;
            border: none;
            padding: 20px 25px;
            animation: fadeIn 0.8s ease 0.8s both;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-left: 5px solid #2196F3;
            color: #1565C0;
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.2);
        }
        
        .alert i {
            font-size: 18px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
            animation: fadeIn 0.8s ease 0.9s both;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary::before {
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
        
        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.6);
        }
        
        .btn-primary:active {
            transform: translateY(-1px);
        }
        
        .btn-primary span {
            position: relative;
            z-index: 1;
        }
        
        /* Confetti animation */
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #667eea;
            position: absolute;
            animation: confetti-fall 3s ease-out forwards;
            z-index: 9999;
        }
        
        @keyframes confetti-fall {
            to {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .success-container {
                padding: 0 10px;
            }
            
            .success-card {
                padding: 40px 25px;
                border-radius: 25px;
            }
            
            .success-icon {
                font-size: 90px;
            }
            
            .success-icon::before {
                width: 110px;
                height: 110px;
            }
            
            .success-title {
                font-size: 26px;
                margin-top: 25px;
            }
            
            .success-subtitle {
                font-size: 14px;
            }
            
            .booking-code {
                padding: 25px 20px;
            }
            
            .booking-code h3 {
                font-size: 28px;
                letter-spacing: 2px;
            }
            
            .booking-code-icon {
                font-size: 40px;
                right: 15px;
            }
            
            .status-badge {
                padding: 10px 25px;
                font-size: 12px;
            }
            
            .detail-box {
                padding: 25px 20px;
            }
            
            .detail-box h5 {
                font-size: 18px;
            }
            
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
                padding: 10px 0;
            }
            
            .detail-row .value {
                text-align: left;
                font-size: 14px;
            }
            
            .total-row .value {
                font-size: 20px;
            }
            
            .alert {
                padding: 15px 20px;
                font-size: 14px;
            }
            
            .btn-primary {
                padding: 12px 30px;
                font-size: 15px;
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            body {
                padding: 10px;
            }
            
            .success-card {
                padding: 30px 20px;
            }
            
            .success-icon {
                font-size: 70px;
            }
            
            .success-title {
                font-size: 22px;
            }
            
            .booking-code h3 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            
            <h2 class="success-title">Pemesanan Berhasil!</h2>
            <p class="success-subtitle">Terima kasih telah memesan di Hotelku</p>

            <div class="booking-code">
                <i class="fas fa-ticket-alt booking-code-icon"></i>
                <small>Kode Booking</small>
                <h3>HK<?= str_pad($pemesanan['id'], 6, '0', STR_PAD_LEFT) ?></h3>
            </div>

            <div class="status-badge">
                <i class="fas fa-clock me-2"></i>Status: <?= strtoupper($pemesanan['status']) ?>
            </div>

            <div class="detail-box">
                <h5><i class="fas fa-clipboard-list"></i> Detail Pemesanan</h5>
                
                <div class="detail-row">
                    <div class="label">
                        <i class="fas fa-hotel"></i>
                        <span>Akomodasi:</span>
                    </div>
                    <div class="value"><?= esc($pemesanan['nama_akomodasi']) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="label">
                        <i class="fas fa-bed"></i>
                        <span>Tipe Kamar:</span>
                    </div>
                    <div class="value"><?= esc($pemesanan['nama_tipe']) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="label">
                        <i class="fas fa-calendar-check"></i>
                        <span>Check-in:</span>
                    </div>
                    <div class="value"><?= date('d M Y', strtotime($pemesanan['tanggal_checkin'])) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="label">
                        <i class="fas fa-calendar-times"></i>
                        <span>Check-out:</span>
                    </div>
                    <div class="value"><?= date('d M Y', strtotime($pemesanan['tanggal_checkout'])) ?></div>
                </div>
                
                <div class="detail-row">
                    <div class="label">
                        <i class="fas fa-moon"></i>
                        <span>Jumlah Malam:</span>
                    </div>
                    <div class="value"><?= $pemesanan['jumlah_malam'] ?> malam</div>
                </div>
                
                <div class="detail-row">
                    <div class="label">
                        <i class="fas fa-credit-card"></i>
                        <span>Metode Pembayaran:</span>
                    </div>
                    <div class="value" style="text-transform: uppercase;">
                        <?= str_replace('_', ' ', $pemesanan['metode_pembayaran']) ?>
                    </div>
                </div>
                
                <hr>
                
                <div class="detail-row total-row">
                    <div class="label">
                        <i class="fas fa-receipt"></i>
                        <strong>Total:</strong>
                    </div>
                    <div class="value">
                        Rp <?= number_format($pemesanan['total_harga'], 0, ',', '.') ?>
                    </div>
                </div>
            </div>

            <div class="alert">
                <i class="fas fa-info-circle me-2"></i>
                Detail pemesanan akan segera dikirim ke email Anda. Mohon bersabar dan jika sudah dikirim silakan cek untuk informasi lebih lanjut.
            </div>

            <a href="/ana/ManajementHotel_CI4_New/public/home" class="btn btn-primary btn-lg mt-3">
                <span>
                    <i class="fas fa-home me-2"></i>Kembali ke Beranda
                </span>
            </a>
        </div>
    </div>

    <script>
        // Add hover effect to detail rows
        document.querySelectorAll('.detail-row').forEach((row, index) => {
            row.style.animationDelay = `${0.1 + index * 0.05}s`;
        });
    </script>
</body>
</html>