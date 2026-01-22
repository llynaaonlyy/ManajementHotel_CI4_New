# ⚡ QUICK START - FORGOT PASSWORD SERVICE

## 🔥 5 Langkah Cepat untuk Menjalankan

### Langkah 1: Install Dependencies (1 menit)

**Buka PowerShell/Terminal** dan jalankan:

```powershell
cd "D:\laragon\www\hotelku\home-ki-whatsappBlast"
pip install flask mysql-connector-python python-dotenv bcrypt
```

### Langkah 2: Verifikasi .env File (30 detik)

File `.env` di folder `home-ki-whatsappBlast/` harus ada dengan:

```env
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=hotelku
DB_PORT=3306
```

> Tidak perlu DB_PASS jika MySQL tidak ada password

### Langkah 3: Start Python Service (2 menit)

**Di PowerShell, jalankan:**

```powershell
python app.py
```

**Tunggu sampai muncul:**
```
✅ Database connected: hotelku
📍 Server starting at: http://localhost:5000
📱 WhatsApp: Connected
🔐 OTP Service: Active (5 minute expiry)
```

### Langkah 4: Test di Browser

Buka browser dan akses:

```
http://localhost:8000/forgot-password
```

### Langkah 5: Test Flow

1. **Buka halaman forgot password**
2. **Input nama & nomor WhatsApp** (yang sudah terdaftar di database)
3. **Cek WhatsApp untuk OTP** (akan menerima pesan dengan kode 6 digit)
4. **Masukkan OTP** di website
5. **Input password baru**
6. **Success!** ✅

---

## 📊 Struktur Project

```
home-ki-whatsappBlast/
├── app.py                    (MAIN - Flask app dengan forgot password)
├── otp_service.py           (Generate & verify OTP)
├── db_service.py            (Database connection)
├── utils.py                 (Helper functions)
├── whatsapp_bot.py          (WhatsApp integration - existing)
├── .env                     (Konfigurasi - PENTING!)
├── SETUP_GUIDE.md           (Panduan lengkap)
└── README_FORGOT_PASSWORD.md (Info singkat)
```

---

## ✅ Checklist Sebelum Run

- [ ] Python 3.7+ sudah terinstall (`python --version`)
- [ ] Dependencies sudah terinstall (`pip list` - lihat flask, mysql-connector, bcrypt)
- [ ] `.env` file sudah ada dan dikonfigurasi
- [ ] Database `hotelku` ada dan tabel `users` ada
- [ ] User test sudah ada di database dengan nama & nomor telepon
- [ ] WhatsApp bot sudah terkoneksi

---

## 🆘 Jika Ada Error

### Error 1: "ModuleNotFoundError"
```bash
pip install flask mysql-connector-python python-dotenv bcrypt
```

### Error 2: "Database connection failed"
- Check konfigurasi `.env`
- Pastikan MySQL server running
- Test: `mysql -u root -p hotelku`

### Error 3: "WhatsApp not connected"
- Pastikan WhatsApp bot sudah scan QR code terlebih dahulu
- Lihat status di console

### Error 4: "OTP tidak terkirim"
- Pastikan nomor user di database sudah benar (format: `628xxx` atau `08xxx`)
- Test manual kirim WhatsApp message

---

## 🎯 API Endpoints (Optional - untuk developer)

| Endpoint | Method | Deskripsi |
|----------|--------|-----------|
| `/api/forgot-password/request-otp` | POST | Minta OTP |
| `/api/forgot-password/verify-otp` | POST | Verifikasi OTP |
| `/api/forgot-password/reset-password` | POST | Reset password |
| `/health` | GET | Check service status |

---

## 🚀 Production Tips

1. **Jangan** set `debug=True`
2. **Gunakan** HTTPS di production
3. **Limit** API calls (rate limiting)
4. **Monitor** service status reguler
5. **Backup** database sebelum production

---

## 📱 Test Data

Untuk testing, pastikan ada user di database:

```sql
INSERT INTO users (nama, email, telepon, password, created_at) VALUES 
('Budi Santoso', 'budi@example.com', '628123456789', '$2y$12$...', NOW());
```

Gunakan:
- Nama: `Budi Santoso`
- WhatsApp: `08123456789` atau `628123456789`

---

## 📞 Support

- Lihat `SETUP_GUIDE.md` untuk panduan lengkap
- Check console output untuk error messages
- Database connection test: `python -c "from db_service import get_db; get_db()"`

---

**STATUS**: ✅ SIAP DIGUNAKAN

**Created**: 2024-01-21  
**Version**: 1.0 (Python Backend)  
**Last Updated**: 2024-01-21
