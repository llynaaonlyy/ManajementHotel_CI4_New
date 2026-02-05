<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Akun - HotelKu</title>
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
            padding: 0;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: env(safe-area-inset-top);
            background: #ffffff;
            z-index: 999;
        }

        .top-bar {
            background: #ffffff;
            padding: 1px 0;
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.08);
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            backdrop-filter: blur(10px);
            animation: slideDown 0.5s ease-out;
            border-bottom: 1px solid #e5e7eb;
            padding-top: env(safe-area-inset-top);
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

        :root {
            --topbar-height: 90px; 
        }

        .text-white{
            background: #3bb1e7 !important;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 20px;
        }

        .text-white:hover {
            background: #256ac5 !important;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(37,99,235,0.3);
            transform: translateY(-2px);
        }

        .top-bar .container {
            max-width: 100%;
            padding: 0 20px;
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
        }

        .card-title {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e5e7eb;
        }

        .info-alert {
            background: #eff6ff;
            border-left: 4px solid #3b92f6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #1e40af;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #374551;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #333;
            box-shadow: 0 0 0 3px rgba(51, 51, 51, 0.1);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2563eb 100%, #3b82f6 0%);
        }

        .btn-secondary {
            background: #6b7280b0;
            color: #ffffff;
        }

        .btn-secondary:hover {
            background: #6b7280;
        }

        .password-section {
            background: #f9fafb;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
        }

        .password-note {
            color: #6b7280;
            font-size: 13px;
            margin-top: 10px;
            line-height: 1.6;
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
        }

        .modal-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .modal-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .modal-btn-primary {
            background: #333;
            color: white;
        }

        .modal-btn-primary:hover {
            background: #555;
        }

        .modal-btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .modal-btn-secondary:hover {
            background: #d1d5db;
        }

        @media (max-width: 768px) {
            body {
                padding: 0;
            }

            .top-bar {
                padding: 6px 0;
            }

            .top-bar .container {
                padding: 0 28px;
            }

            .top-bar .logo {
                margin-left: 6px;
            }

            .top-bar a.text-white {
                margin-right: 6px;
            }

            .card {
                padding: 20px;
            }

            .header {
                padding: 12px 15px;
            }

            .header-left {
                font-size: 20px;
            }

            .button-group {
                flex-direction: column;
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
                        <a href="<?= base_url('home') ?>" class="logo">
                            <i class="fas fa-hotel"></i> Hotelku
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <a href="<?= base_url('profil') ?>" class="text-white">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
    </div>
    <div class="container">
        <!-- Profil Card -->
        <div class="card">
            <div class="card-title">Profil</div>
            
            <div class="info-alert">
                <strong>Informasi Penting:</strong> Semua perubahan data profil Anda akan disimpan ke basis data kami. Pastikan informasi yang Anda masukkan benar dan akurat. Untuk mengubah password, Anda harus memverifikasi password lama Anda terlebih dahulu.
            </div>

            <form id="profileForm" method="POST" action="<?php echo base_url('profile/update'); ?>">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" value="<?php echo old('nama', $user['nama']); ?>" required>
                    <span class="error-message"><?php echo session()->getFlashdata('errors')['nama'] ?? ''; ?></span>
                    <span class="error-message" id="namaError"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
                    <span class="error-message" id="emailError"></span>
                </div>

                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="tel" id="no_telp" name="no_telp"
                        value="<?= old('no_telp', $user['no_telp']); ?>">
                    <span class="error-message" id="teleponError"></span>
                </div>

                <div class="button-group">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>

        <!-- Info Pemilik Akun Card -->
        <div class="card">
            <div class="card-title">Info Pemilik Akun</div>

            <div class="form-group" style="margin-top: 20px;">
                <label>Tanggal Pembuatan Akun</label>
                <div style="padding: 12px; background: #f9fafb; border-radius: 8px; color: #6b7280;">
                    <?php echo date('d F Y', strtotime($user['created_at'] ?? date('Y-m-d'))); ?>
                </div>
            </div>
        </div>
    </div>


    <script>

        document.getElementById('profileForm')?.addEventListener('submit', function(e) {
            let isValid = true;
            
            const nama = document.getElementById('nama').value.trim();
            const email = document.getElementById('email').value.trim();
            const no_telp = document.getElementById('no_telp').value.trim();

            if (nama.length < 3) {
                document.getElementById('namaError').textContent = 'Nama harus minimal 3 karakter';
                isValid = false;
            }

            if (!email.includes('@')) {
                document.getElementById('emailError').textContent = 'Email tidak valid';
                isValid = false;
            }

            if (no_telp && !/^[0-9]{10,15}$/.test(no_telp)) {
                document.getElementById('teleponError').textContent = 'Nomor telepon harus 10-15 digit';
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
            }
        });

        document.getElementById('passwordForm')?.addEventListener('submit', function(e) {
            let isValid = true;
            clearPasswordErrors();
        });

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('modalPassword');
            if (event.target === modal) {
                closePasswordModal();
            }
        }
    </script>
</body>
</html>
