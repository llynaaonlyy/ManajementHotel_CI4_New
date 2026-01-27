<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - HotelKu</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
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

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            pointer-events: none;
            z-index: 0;
        }

        /* Top Bar */
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


        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .logo:hover {
            color: white;
            transform: scale(1.05);
        }

        .back-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-link:hover {
            color: white;
            transform: translateX(-5px);
        }

        /* Container */
        .container {
            max-width: 650px;
            margin: 30px auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        /* Card Styles */
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.4s ease;
            animation: fadeInUp 0.6s ease-out backwards;
        }

        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }

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

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.2);
        }

        /* Header Card */
        .header-card {
            display: flex;
            align-items: center;
            gap: 25px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }

        .user-icon {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.3);
            animation: pulse 2s ease-in-out infinite;
            position: relative;
        }

        .user-icon::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0.5;
            animation: ripple 2s ease-out infinite;
        }

        @keyframes ripple {
            0% {
                transform: scale(1);
                opacity: 0.5;
            }
            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }

        .user-icon svg {
            width: 45px;
            height: 45px;
            fill: white;
            position: relative;
            z-index: 1;
        }

        .user-info {
            flex: 1;
        }

        .greeting {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
        }

        .edit-link {
            color: #667eea;
            text-decoration: none;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s;
            font-weight: 600;
            position: relative;
        }

        .edit-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s;
        }

        .edit-link:hover::after {
            width: 100%;
        }

        .edit-link:hover {
            color: #764ba2;
            transform: translateX(3px);
        }

        /* Card Title */
        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 3px solid transparent;
            border-image: linear-gradient(90deg, #667eea, #764ba2) 1;
            position: relative;
        }

        .card-title::before {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Menu Items */
        .menu-item {
            padding: 18px 20px;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .menu-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.1), transparent);
            transition: left 0.5s;
        }

        .menu-item:hover::before {
            left: 100%;
        }

        .menu-item:hover {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            transform: translateX(8px);
            border-color: rgba(102, 126, 234, 0.3);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.15);
        }

        .menu-item span {
            color: #374151;
            font-weight: 600;
            font-size: 15px;
            position: relative;
            z-index: 1;
        }

        .menu-item .arrow {
            color: #667eea;
            font-size: 20px;
            transition: transform 0.3s;
        }

        .menu-item:hover .arrow {
            transform: translateX(5px);
        }

        .danger-item {
            background: linear-gradient(135deg, #fee2e2 0%, #fef2f2 100%);
        }

        .danger-item span {
            color: #dc2626 !important;
        }

        .danger-item .arrow {
            color: #dc2626 !important;
        }

        .danger-item:hover {
            background: linear-gradient(135deg, #fecaca 0%, #fee2e2 100%);
            border-color: rgba(220, 38, 38, 0.3);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.15);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 35px;
            border-radius: 25px;
            max-width: 550px;
            width: 90%;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlide 0.4s ease-out;
            position: relative;
        }

        @keyframes modalSlide {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .modal-body {
            margin-bottom: 25px;
            color: #4b5563;
            line-height: 1.8;
            font-size: 15px;
        }

        .modal-buttons {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        /* Buttons */
        .btn {
            padding: 12px 28px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.5s, height 0.5s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        /* Info Box in Modal */
        .info-box {
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
            padding: 18px;
            border-radius: 12px;
            margin-bottom: 12px;
            border-left: 4px solid #667eea;
            transition: all 0.3s;
        }

        .info-box:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
        }

        .info-box strong {
            color: #1f2937;
            display: block;
            margin-bottom: 5px;
        }

        .info-box span {
            color: #667eea;
            font-weight: 600;
        }

        /* Scrollbar Styling */
        .modal-content::-webkit-scrollbar {
            width: 8px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .card {
                padding: 25px 20px;
                margin-bottom: 20px;
            }

            .greeting {
                font-size: 20px;
            }

            .user-icon {
                width: 75px;
                height: 75px;
            }

            .user-icon svg {
                width: 38px;
                height: 38px;
            }

            .modal-content {
                padding: 25px 20px;
                width: 95%;
            }

            .modal-header {
                font-size: 20px;
            }

            .logo {
                font-size: 24px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .header-card {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .modal-buttons {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="/ana/ManajementHotel_CI4_New/public/home" class="logo">
                        <i class="fas fa-hotel"></i> Hotelku
                    </a>
                </div>
                <div class="col-6 text-end">
                    <a href="/ana/ManajementHotel_CI4_New/public/home" class="text-white">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card header-card">
            <div class="user-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
            <div class="user-info">
                <div class="greeting">Halo, Pengguna</div>
                <a href="/ana/ManajementHotel_CI4_New/public/profile/edit_detail_akun" class="edit-link">
                    <i class="fas fa-edit"></i> Edit Detail Akun
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <i class="fas fa-info-circle me-2"></i>Bantuan dan Informasi
            </div>
            <div class="menu-item" onclick="showTentangKami()">
                <span><i class="fas fa-building me-2"></i>Tentang Kami</span>
                <span class="arrow">›</span>
            </div>
            <div class="menu-item" onclick="showBantuan()">
                <span><i class="fas fa-question-circle me-2"></i>Bantuan</span>
                <span class="arrow">›</span>
            </div>
            <div class="menu-item" onclick="window.location.href='/ana/ManajementHotel_CI4_New/public/histori'">
                <span><i class="fas fa-history me-2"></i>Lihat Histori</span>
                <span class="arrow">›</span>
            </div>
        </div>

        <div class="card">
            <div class="card-title">
                <i class="fas fa-user-cog me-2"></i>Kelola Akun Anda
            </div>
            <div class="menu-item danger-item" onclick="confirmDeleteAccount()">
                <span><i class="fas fa-trash-alt me-2"></i>Hapus Akun Saya</span>
                <span class="arrow">›</span>
            </div>
            <div class="menu-item" onclick="confirmLogout()">
                <span><i class="fas fa-sign-out-alt me-2"></i>Keluar</span>
                <span class="arrow">›</span>
            </div>
        </div>
    </div>

    <!-- Modal Tentang Kami -->
    <div id="modalTentangKami" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-info-circle me-2"></i>Tentang Kami
            </div>
            <div class="modal-body">
                <h3 style="margin-bottom: 15px; color: #1f2937;">Sistem Pemesanan Hotel</h3>
                <p style="margin-bottom: 20px;">Proyek ini merupakan proyek Praktek Kerja Lapangan (PKL) yang bertujuan untuk memudahkan proses pemesanan kamar hotel secara online.</p>
                
                <h4 style="margin-top: 20px; margin-bottom: 15px; color: #374151;">
                    <i class="fas fa-code me-2" style="color: #667eea;"></i>Teknologi yang Digunakan:
                </h4>
                <ul style="margin-left: 20px; line-height: 2;">
                    <li><strong>PHP</strong> - Backend programming</li>
                    <li><strong>MySQL</strong> - Database management</li>
                    <li><strong>HTML/CSS</strong> - Frontend design</li>
                    <li><strong>JavaScript</strong> - Interactive features</li>
                </ul>

                <p style="margin-top: 20px; padding: 15px; background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%); border-radius: 10px; color: #667eea; font-style: italic;">
                    <i class="fas fa-lightbulb me-2"></i>Dikembangkan sebagai bagian dari program PKL untuk meningkatkan kemampuan dalam pengembangan aplikasi web.
                </p>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-primary" onclick="closeModal('modalTentangKami')">
                    <i class="fas fa-check me-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Bantuan -->
    <div id="modalBantuan" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-headset me-2"></i>Bantuan
            </div>
            <div class="modal-body">
                <p style="margin-bottom: 20px;">Butuh bantuan? Silakan hubungi admin kami melalui:</p>
                
                <div class="info-box">
                    <strong><i class="fas fa-phone me-2"></i>Telepon:</strong>
                    <span>+62 812-3456-7890</span>
                </div>

                <div class="info-box" style="border-left-color: #764ba2;">
                    <strong><i class="fas fa-envelope me-2"></i>Email:</strong>
                    <span>admin@hotelpemesanan.com</span>
                </div>

                <div class="info-box" style="border-left-color: #f093fb;">
                    <strong><i class="fas fa-map-marker-alt me-2"></i>Alamat Kantor:</strong>
                    <span style="color: #4b5563;">
                        Jl. Merdeka Raya No. 123<br>
                        Gedung Bisnis Center Lt. 5<br>
                        Jakarta Pusat, 10110
                    </span>
                </div>

                <div style="margin-top: 20px; padding: 15px; background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); border-radius: 10px; border-left: 4px solid #f59e0b;">
                    <strong style="color: #92400e; display: block; margin-bottom: 8px;">
                        <i class="fas fa-clock me-2"></i>Jam Operasional:
                    </strong>
                    <span style="color: #78350f;">
                        Senin - Jumat: 08:00 - 17:00 WIB<br>
                        Sabtu: 08:00 - 12:00 WIB
                    </span>
                </div>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-primary" onclick="closeModal('modalBantuan')">
                    <i class="fas fa-check me-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Logout -->
    <div id="modalLogout" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-sign-out-alt me-2"></i>Konfirmasi Keluar
            </div>
            <div class="modal-body">
                <p style="font-size: 16px;">Apakah Anda yakin ingin keluar dari akun Anda?</p>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-secondary" onclick="closeModal('modalLogout')">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button class="btn btn-primary" onclick="logout()">
                    <i class="fas fa-check me-2"></i>Ya, Keluar
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Akun -->
    <div id="modalDeleteAccount" class="modal">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                <i class="fas fa-exclamation-triangle me-2"></i>Peringatan! Hapus Akun
            </div>
            <div class="modal-body">
                <div style="background: linear-gradient(135deg, #fee2e2 0%, #fef2f2 100%); padding: 15px; border-radius: 10px; border-left: 4px solid #dc2626; margin-bottom: 20px;">
                    <p style="margin: 0; color: #dc2626; font-weight: 700;">
                        <i class="fas fa-exclamation-circle me-2"></i>Tindakan ini tidak dapat dibatalkan!
                    </p>
                </div>
                
                <p style="margin-bottom: 15px;">Dengan menghapus akun Anda, semua data berikut akan dihapus secara permanen:</p>
                <ul style="margin-left: 20px; margin-bottom: 20px; line-height: 1.8;">
                    <li>Informasi profil Anda</li>
                    <li>Riwayat pemesanan</li>
                    <li>Data lainnya yang terkait dengan akun</li>
                </ul>
                <p style="color: #dc2626; font-weight: 700; font-size: 16px;">
                    <i class="fas fa-question-circle me-2"></i>Apakah Anda yakin ingin menghapus akun Anda?
                </p>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-secondary" onclick="closeModal('modalDeleteAccount')">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button class="btn btn-danger" onclick="deleteAccount()">
                    <i class="fas fa-trash me-2"></i>Ya, Hapus Akun
                </button>
            </div>
        </div>
    </div>

    <script>
        function showTentangKami() {
            document.getElementById('modalTentangKami').classList.add('active');
        }

        function showBantuan() {
            document.getElementById('modalBantuan').classList.add('active');
        }

        function confirmLogout() {
            document.getElementById('modalLogout').classList.add('active');
        }

        function confirmDeleteAccount() {
            document.getElementById('modalDeleteAccount').classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function logout() {
            window.location.href = '/ana/ManajementHotel_CI4_New/public/logout';
        }

        function deleteAccount() {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/ana/ManajementHotel_CI4_New/public/profil/delete';
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '<?= csrf_token() ?>';
            csrfToken.value = '<?= csrf_hash() ?>';
            form.appendChild(csrfToken);
            
            document.body.appendChild(form);
            form.submit();
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>