<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - HotelKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            padding: -10px;
        }

        .top-bar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 23px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .logo {
            margin: 104px;
            font-size: 28px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .text-white{
            margin: 104px;
        }

        .container {
            max-width: 600px;
            margin: 25px auto;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .header-card {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-icon {
            width: 70px;
            height: 70px;
            background: #9ca3af;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .user-icon svg {
            width: 40px;
            height: 40px;
            fill: white;
        }

        .user-info {
            flex: 1;
        }

        .greeting {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .edit-link {
            color: #0d72d1;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s;
        }

        .edit-link:hover {
            color: #333;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 15px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e5e7eb;
        }

        .menu-item {
            padding: 15px;
            margin-bottom: 10px;
            background: #f9fafb;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-item:hover {
            background: #f3f4f6;
            transform: translateX(5px);
        }

        .menu-item span {
            color: #374151;
            font-weight: 500;
        }

        .menu-item .arrow {
            color: #9ca3af;
        }

        .danger-item span {
            color: #dc2626 !important;
        }

        .danger-item:hover {
            background: #fee2e2;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 15px;
            max-width: 500px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #1f2937;
        }

        .modal-body {
            margin-bottom: 20px;
            color: #4b5563;
            line-height: 1.6;
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #333;
            color: white;
        }

        .btn-primary:hover {
            background: #555;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .card {
                padding: 20px;
            }

            .greeting {
                font-size: 18px;
            }

            .user-icon {
                width: 60px;
                height: 60px;
            }

            .modal-content {
                padding: 20px;
            }

            .header {
                padding: 12px 15px;
            }

            .header-left {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="top-bar">
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

    <div class="container">
        <div class="card header-card">
            <div class="user-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            </div>
            <div class="user-info">
                <div class="greeting">Halo, <?php echo htmlspecialchars($user['nama'] ?? 'Pengguna'); ?></div>
                <a href="<?php echo base_url('profile/edit'); ?>" class="edit-link">Edit Detail Akun ›</a>
            </div>
        </div>

        <!-- Bantuan dan Informasi Card -->
        <div class="card">
            <div class="card-title">Bantuan dan Informasi</div>
            <div class="menu-item" onclick="showTentangKami()">
                <span>Tentang Kami</span>
                <span class="arrow">›</span>
            </div>
            <div class="menu-item" onclick="showBantuan()">
                <span>Bantuan</span>
                <span class="arrow">›</span>
            </div>
            <div class="menu-item" onclick="window.location.href='/histori'">
                <span>Lihat Histori</span>
                <span class="arrow">›</span>

            </div>
        </div>

        <!-- Kelola Akun Card -->
        <div class="card">
            <div class="card-title">Kelola Akun Anda</div>
            <div class="menu-item danger-item" onclick="confirmDeleteAccount()">
                <span>Hapus Akun Saya</span>
                <span class="arrow">›</span>
            </div>
            <div class="menu-item" onclick="confirmLogout()">
                <span>Keluar</span>
                <span class="arrow">›</span>
            </div>
        </div>
    </div>

    <!-- Modal Tentang Kami -->
    <div id="modalTentangKami" class="modal">
        <div class="modal-content">
            <div class="modal-header">Tentang Kami</div>
            <div class="modal-body">
                <h3 style="margin-bottom: 10px;">Sistem Pemesanan Hotel</h3>
                <p style="margin-bottom: 15px;">Proyek ini merupakan proyek Praktek Kerja Lapangan (PKL) yang bertujuan untuk memudahkan proses pemesanan kamar hotel secara online.</p>
                
                <h4 style="margin-top: 15px; margin-bottom: 10px;">Teknologi yang Digunakan:</h4>
                <ul style="margin-left: 20px; line-height: 1.8;">
                    <li><strong>PHP</strong> - Backend programming</li>
                    <li><strong>MySQL</strong> - Database management</li>
                    <li><strong>HTML/CSS</strong> - Frontend design</li>
                    <li><strong>JavaScript</strong> - Interactive features</li>
                </ul>

                <p style="margin-top: 15px; color: #6b7280; font-style: italic;">Dikembangkan sebagai bagian dari program PKL untuk meningkatkan kemampuan dalam pengembangan aplikasi web.</p>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-primary" onclick="closeModal('modalTentangKami')">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Bantuan -->
    <div id="modalBantuan" class="modal">
        <div class="modal-content">
            <div class="modal-header">Bantuan</div>
            <div class="modal-body">
                <p style="margin-bottom: 15px;">Butuh bantuan? Silakan hubungi admin kami melalui:</p>
                
                <div style="background: #f9fafb; padding: 15px; border-radius: 8px; margin-bottom: 10px;">
                    <strong>📞 Telepon:</strong><br>
                    <span style="color: #667eea;">+62 812-3456-7890</span>
                </div>

                <div style="background: #f9fafb; padding: 15px; border-radius: 8px; margin-bottom: 10px;">
                    <strong>✉️ Email:</strong><br>
                    <span style="color: #667eea;">admin@hotelpemesanan.com</span>
                </div>

                <div style="background: #f9fafb; padding: 15px; border-radius: 8px;">
                    <strong>📍 Alamat Kantor:</strong><br>
                    Jl. Merdeka Raya No. 123<br>
                    Gedung Bisnis Center Lt. 5<br>
                    Jakarta Pusat, 10110
                </div>

                <p style="margin-top: 15px; color: #6b7280; font-size: 14px;">
                    <strong>Jam Operasional:</strong><br>
                    Senin - Jumat: 08:00 - 17:00 WIB<br>
                    Sabtu: 08:00 - 12:00 WIB
                </p>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-primary" onclick="closeModal('modalBantuan')">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Logout -->
    <div id="modalLogout" class="modal">
        <div class="modal-content">
            <div class="modal-header">Konfirmasi Keluar</div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin keluar dari akun Anda?</p>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-secondary" onclick="closeModal('modalLogout')">Batal</button>
                <button class="btn btn-primary" onclick="logout()">Ya, Keluar</button>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Akun -->
    <div id="modalDeleteAccount" class="modal">
        <div class="modal-content">
            <div class="modal-header" style="color: #dc2626;">Peringatan! Hapus Akun</div>
            <div class="modal-body">
                <p style="margin-bottom: 15px;"><strong>Tindakan ini tidak dapat dibatalkan!</strong></p>
                <p style="margin-bottom: 15px;">Dengan menghapus akun Anda, semua data berikut akan dihapus secara permanen:</p>
                <ul style="margin-left: 20px; margin-bottom: 15px;">
                    <li>Informasi profil Anda</li>
                    <li>Riwayat pemesanan</li>
                    <li>Data lainnya yang terkait dengan akun</li>
                </ul>
                <p style="color: #dc2626; font-weight: 600;">Apakah Anda yakin ingin menghapus akun Anda?</p>
            </div>
            <div class="modal-buttons">
                <button class="btn btn-secondary" onclick="closeModal('modalDeleteAccount')">Batal</button>
                <button class="btn btn-danger" onclick="deleteAccount()">Ya, Hapus Akun</button>
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
            window.location.href = 'logout.php';
        }

        function deleteAccount() {
            window.location.href = 'hapus_akun.php';
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