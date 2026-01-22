<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Sandi - HotelKu</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        /* Step Indicator */
        .step-indicator {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            position: relative;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: #e5e7eb;
            z-index: 0;
        }

        .step-item {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #999;
            font-size: 16px;
            position: relative;
            z-index: 1;
        }

        .step-item.active {
            background: #333;
            color: white;
        }

        .step-item.completed {
            background: #4caf50;
            color: white;
        }

        /* Steps */
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
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

        .helper-text {
            color: #999;
            font-size: 12px;
            margin-top: 5px;
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
            background: #333;
            color: white;
        }

        .btn-primary:hover:not(:disabled) {
            background: #555;
        }

        .btn-primary:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #333;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        .message.show {
            display: block;
        }

        .message.error {
            background: #fee2e2;
            color: #dc2626;
            border-left: 4px solid #dc2626;
        }

        .message.success {
            background: #dcfce7;
            color: #16a34a;
            border-left: 4px solid #16a34a;
        }

        .message.info {
            background: #dbeafe;
            color: #0284c7;
            border-left: 4px solid #0284c7;
        }

        .timer-box {
            background: #eff6ff;
            border: 2px solid #bfdbfe;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        .timer-box p {
            color: #1e40af;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .timer {
            font-size: 32px;
            font-weight: 700;
            color: #dc2626;
            font-family: 'Courier New', monospace;
        }

        .timer.warning {
            color: #ea580c;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a, .back-link button {
            color: #666;
            text-decoration: none;
            cursor: pointer;
            background: none;
            border: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .back-link a:hover, .back-link button:hover {
            color: #333;
        }

        .password-wrapper {
            position: relative;
        }

        .password-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 18px;
        }

        .password-wrapper input {
            padding-right: 40px;
        }

        .resend-section {
            text-align: center;
            margin-top: 20px;
        }

        .resend-section p {
            color: #666;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .resend-btn {
            color: #333;
            background: none;
            border: none;
            font-size: 13px;
            cursor: pointer;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .resend-btn:hover:not(:disabled) {
            color: #666;
        }

        .resend-btn:disabled {
            color: #ccc;
            cursor: not-allowed;
            text-decoration: none;
        }

        .success-screen {
            text-align: center;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #dcfce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
        }

        .success-screen h2 {
            color: #16a34a;
            margin-bottom: 10px;
        }

        .success-screen p {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .success-screen a {
            display: inline-block;
            background: #333;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .success-screen a:hover {
            background: #555;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .step-indicator {
                margin-bottom: 30px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔐 Lupa Sandi</h1>
            <p>HotelKu - Platform Pemesanan Hotel</p>
        </div>

        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="step-item active" id="stepDot1">1</div>
            <div class="step-item" id="stepDot2">2</div>
            <div class="step-item" id="stepDot3">3</div>
        </div>

        <!-- Step 1: Request OTP -->
        <div id="step1" class="step active">
            <form id="form-step1">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                    <div class="helper-text">Gunakan nama yang terdaftar di sistem</div>
                </div>

                <div class="form-group">
                    <label for="noHp">Nomor WhatsApp</label>
                    <input type="tel" id="noHp" name="noHp" placeholder="081234567890" required>
                    <div class="helper-text">Format: 08xxx atau 628xxx (tanpa +)</div>
                </div>

                <div id="error1" class="message error"></div>
                <div id="success1" class="message success"></div>

                <button type="submit" class="btn btn-primary" id="btnStep1">
                    Minta Kode OTP
                </button>

                <div class="back-link">
                    <a href="<?= base_url('auth/login') ?>">← Kembali ke Login</a>
                </div>
            </form>
        </div>

        <!-- Step 2: Verify OTP -->
        <div id="step2" class="step">
            <form id="form-step2">
                <div class="timer-box">
                    <p>Kode OTP telah dikirim ke WhatsApp Anda</p>
                    <p>Waktu berlaku:</p>
                    <div class="timer" id="timer">5:00</div>
                </div>

                <div class="form-group">
                    <label for="otp">Masukkan Kode OTP (6 digit)</label>
                    <input type="text" id="otp" name="otp" placeholder="000000" maxlength="6" inputmode="numeric" required>
                    <div class="helper-text">Cek pesan WhatsApp Anda untuk kode OTP</div>
                </div>

                <div id="error2" class="message error"></div>
                <div id="success2" class="message success"></div>

                <button type="submit" class="btn btn-primary" id="btnStep2">
                    Verifikasi OTP
                </button>

                <div class="resend-section">
                    <p>Tidak menerima kode?</p>
                    <button type="button" class="resend-btn" id="resendBtn" onclick="resendOTP()">
                        Kirim Ulang OTP
                    </button>
                </div>

                <div class="back-link">
                    <button type="button" onclick="goToStep(1)">← Kembali</button>
                </div>
            </form>
        </div>

        <!-- Step 3: Reset Password -->
        <div id="step3" class="step">
            <form id="form-step3">
                <div class="form-group">
                    <label for="newPassword">Sandi Baru</label>
                    <div class="password-wrapper">
                        <input type="password" id="newPassword" name="newPassword" placeholder="Minimal 6 karakter" required>
                        <span class="password-icon" onclick="togglePassword('newPassword')">👁️</span>
                    </div>
                    <div class="helper-text">Gunakan kombinasi huruf, angka, dan simbol untuk keamanan maksimal</div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Konfirmasi Sandi Baru</label>
                    <div class="password-wrapper">
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Masukkan ulang sandi baru" required>
                        <span class="password-icon" onclick="togglePassword('confirmPassword')">👁️</span>
                    </div>
                </div>

                <div id="error3" class="message error"></div>
                <div id="success3" class="message success"></div>

                <button type="submit" class="btn btn-primary" id="btnStep3">
                    Ubah Sandi
                </button>

                <div class="back-link">
                    <button type="button" onclick="goToStep(2)">← Kembali</button>
                </div>
            </form>
        </div>

        <!-- Success Screen -->
        <div id="stepSuccess" class="step">
            <div class="success-screen">
                <div class="success-icon">✓</div>
                <h2>Sandi Berhasil Diubah</h2>
                <p>Sandi Anda telah berhasil diperbarui. Silakan login dengan sandi baru Anda.</p>
                <a href="<?= base_url('auth/login') ?>">Login Sekarang</a>
            </div>
        </div>
    </div>

    <script>
        // Configuration
        const API_BASE_URL = 'http://localhost:5000/api/forgot-password';
        const OTP_EXPIRY_SECONDS = 5 * 60; // 5 minutes

        // State
        let currentStep = 1;
        let otpData = {
            nama: '',
            noHp: '',
            otp: ''
        };
        let timerInterval = null;
        let otpTimeLeft = OTP_EXPIRY_SECONDS;

        // ============================================
        // UTILITY FUNCTIONS
        // ============================================

        function showMessage(elementId, message, type = 'error') {
            const element = document.getElementById(elementId);
            element.textContent = message;
            element.classList.add('show');
            
            if (type === 'success') {
                element.classList.remove('error', 'info');
                element.classList.add('success');
                setTimeout(() => {
                    element.classList.remove('show');
                }, 3000);
            } else if (type === 'info') {
                element.classList.remove('error', 'success');
                element.classList.add('info');
            } else {
                element.classList.remove('success', 'info');
                element.classList.add('error');
            }
        }

        function hideAllMessages() {
            ['error1', 'success1', 'error2', 'success2', 'error3', 'success3'].forEach(id => {
                const el = document.getElementById(id);
                el.classList.remove('show');
            });
        }

        function goToStep(stepNumber) {
            // Hide all steps
            document.getElementById('step1').classList.remove('active');
            document.getElementById('step2').classList.remove('active');
            document.getElementById('step3').classList.remove('active');
            document.getElementById('stepSuccess').classList.remove('active');
            
            hideAllMessages();
            
            // Reset step dots
            document.getElementById('stepDot1').classList.remove('active', 'completed');
            document.getElementById('stepDot2').classList.remove('active', 'completed');
            document.getElementById('stepDot3').classList.remove('active', 'completed');
            
            // Show current step
            if (stepNumber === 1) {
                document.getElementById('step1').classList.add('active');
                document.getElementById('stepDot1').classList.add('active');
                stopTimer();
            } else if (stepNumber === 2) {
                document.getElementById('step2').classList.add('active');
                document.getElementById('stepDot1').classList.add('completed');
                document.getElementById('stepDot2').classList.add('active');
                startTimer();
            } else if (stepNumber === 3) {
                document.getElementById('step3').classList.add('active');
                document.getElementById('stepDot1').classList.add('completed');
                document.getElementById('stepDot2').classList.add('completed');
                document.getElementById('stepDot3').classList.add('active');
                stopTimer();
            } else if (stepNumber === 'success') {
                document.getElementById('stepSuccess').classList.add('active');
                document.getElementById('stepDot1').classList.add('completed');
                document.getElementById('stepDot2').classList.add('completed');
                document.getElementById('stepDot3').classList.add('completed');
                stopTimer();
            }
            
            currentStep = stepNumber;
            window.scrollTo(0, 0);
        }

        function formatTimer(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = seconds % 60;
            return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }

        function startTimer() {
            otpTimeLeft = OTP_EXPIRY_SECONDS;
            document.getElementById('timer').textContent = formatTimer(otpTimeLeft);
            
            timerInterval = setInterval(() => {
                otpTimeLeft--;
                document.getElementById('timer').textContent = formatTimer(otpTimeLeft);
                
                if (otpTimeLeft <= 0) {
                    stopTimer();
                    showMessage('error2', 'OTP sudah kadaluarsa. Silakan minta OTP baru.', 'error');
                    document.getElementById('otp').disabled = true;
                } else if (otpTimeLeft < 60) {
                    document.getElementById('timer').classList.add('warning');
                }
            }, 1000);
        }

        function stopTimer() {
            if (timerInterval) {
                clearInterval(timerInterval);
            }
            document.getElementById('timer').classList.remove('warning');
        }

        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            if (field.type === 'password') {
                field.type = 'text';
            } else {
                field.type = 'password';
            }
        }

        // ============================================
        // STEP 1: REQUEST OTP
        // ============================================

        document.getElementById('form-step1').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const nama = document.getElementById('nama').value.trim();
            const noHp = document.getElementById('noHp').value.trim();
            
            if (!nama || !noHp) {
                showMessage('error1', 'Nama dan nomor WhatsApp harus diisi', 'error');
                return;
            }
            
            const btnStep1 = document.getElementById('btnStep1');
            btnStep1.disabled = true;
            btnStep1.textContent = 'Mengirim...';
            
            try {
                const response = await fetch(`${API_BASE_URL}/request-otp`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ nama, noHp })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    otpData.nama = nama;
                    otpData.noHp = noHp;
                    showMessage('success1', data.message, 'success');
                    setTimeout(() => {
                        goToStep(2);
                    }, 1000);
                } else {
                    showMessage('error1', data.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('error1', 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            } finally {
                btnStep1.disabled = false;
                btnStep1.textContent = 'Minta Kode OTP';
            }
        });

        // ============================================
        // STEP 2: VERIFY OTP
        // ============================================

        document.getElementById('form-step2').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const otp = document.getElementById('otp').value.trim();
            
            if (!otp || otp.length !== 6) {
                showMessage('error2', 'OTP harus 6 digit', 'error');
                return;
            }
            
            const btnStep2 = document.getElementById('btnStep2');
            btnStep2.disabled = true;
            btnStep2.textContent = 'Memverifikasi...';
            
            try {
                const response = await fetch(`${API_BASE_URL}/verify-otp`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        noHp: otpData.noHp,
                        otp: otp
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    otpData.otp = otp;
                    showMessage('success2', data.message, 'success');
                    setTimeout(() => {
                        goToStep(3);
                    }, 1000);
                } else {
                    showMessage('error2', data.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('error2', 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            } finally {
                btnStep2.disabled = false;
                btnStep2.textContent = 'Verifikasi OTP';
            }
        });

        // ============================================
        // STEP 3: RESET PASSWORD
        // ============================================

        document.getElementById('form-step3').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (!newPassword || !confirmPassword) {
                showMessage('error3', 'Semua field harus diisi', 'error');
                return;
            }
            
            if (newPassword.length < 6) {
                showMessage('error3', 'Password minimal 6 karakter', 'error');
                return;
            }
            
            if (newPassword !== confirmPassword) {
                showMessage('error3', 'Password tidak cocok', 'error');
                return;
            }
            
            const btnStep3 = document.getElementById('btnStep3');
            btnStep3.disabled = true;
            btnStep3.textContent = 'Mengubah Password...';
            
            try {
                const response = await fetch(`${API_BASE_URL}/reset-password`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        noHp: otpData.noHp,
                        newPassword: newPassword,
                        confirmPassword: confirmPassword
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showMessage('success3', data.message, 'success');
                    setTimeout(() => {
                        goToStep('success');
                    }, 1500);
                } else {
                    showMessage('error3', data.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('error3', 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            } finally {
                btnStep3.disabled = false;
                btnStep3.textContent = 'Ubah Sandi';
            }
        });

        // ============================================
        // RESEND OTP
        // ============================================

        async function resendOTP() {
            const resendBtn = document.getElementById('resendBtn');
            resendBtn.disabled = true;
            resendBtn.textContent = 'Mengirim ulang...';
            
            try {
                const response = await fetch(`${API_BASE_URL}/request-otp`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nama: otpData.nama,
                        noHp: otpData.noHp
                    })
                });
                
                const data = await response.json();
                
                if (data.success) {
                    showMessage('success2', 'Kode OTP baru telah dikirim', 'success');
                    document.getElementById('otp').value = '';
                    document.getElementById('otp').disabled = false;
                    startTimer();
                } else {
                    showMessage('error2', data.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showMessage('error2', 'Terjadi kesalahan. Silakan coba lagi.', 'error');
            } finally {
                resendBtn.disabled = false;
                resendBtn.textContent = 'Kirim Ulang OTP';
            }
        }
    </script>
</body>
</html>