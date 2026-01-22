🔧 TROUBLESHOOTING - REQUEST OTP GAGAL

═══════════════════════════════════════════════════════════════════════════════

⚠️ MASALAH: "Terjadi kesalahan. Silakan coba lagi."
────────────────────────────────────────────────────────────────────────────────

Penyebab yang sudah diatasi:
  ✅ CORS Headers - Fixed dengan CORS() config di app.py
  ✅ Database column names - Fixed (telepon → no_telp)
  ✅ Detailed logging - Added untuk debug

═══════════════════════════════════════════════════════════════════════════════

🚀 LANGKAH PERBAIKAN TERBARU
────────────────────────────────────────────────────────────────────────────────

1. CORS Support Ditambahkan
   File: app.py (top section)
   - Import: from flask_cors import CORS
   - Config: CORS(app, resources={...})
   - Package: flask-cors 6.0.2 (sudah diinstall)

2. Detailed Logging Ditambahkan
   - Request method
   - Request headers
   - Raw data received
   - Parsed values
   - Validation results
   - Database lookup details

3. OPTIONS Handler Ditambahkan
   - Preflight request handling
   - Support untuk browser CORS

═══════════════════════════════════════════════════════════════════════════════

📋 CARA TEST DENGAN DETAIL
────────────────────────────────────────────────────────────────────────────────

STEP 1: Cek user di database
```bash
cd d:\laragon\www\hotelku\home-ki-whatsappBlast
python debug_db.py
```

Catat output:
  - Nama user (persis seperti di database)
  - No telp user (format 62xxxxxxx)
  Contoh output:
  ```
  ID: 1, Nama: John Doe, Email: john@example.com, No Telp: 628123456789
  ```

STEP 2: Stop server lama
  Ctrl+C di terminal yang menjalankan Flask

STEP 3: Start server baru dengan perbaikan
```bash
cd d:\laragon\www\hotelku\home-ki-whatsappBlast
python app.py
```

Output yang benar:
```
╔═══════════════════════════════════════════════════════════╗
║   🏨 HOTELKU PYTHON BACKEND - FORGOT PASSWORD SERVICE     ║
╚═══════════════════════════════════════════════════════════╝
✅ Database connected: hotelku
📍 Server starting at: http://localhost:5000
📱 WhatsApp: Connected
🔐 OTP Service: Active (5 minute expiry)
 * Running on http://127.0.0.1:5000
```

STEP 4: Test dengan Python test script
```bash
# Di terminal lain (buka new terminal)
cd d:\laragon\www\hotelku\home-ki-whatsappBlast
python test_api.py
```

Edit test_api.py dulu, baris 8-10:
```python
test_data = {
    "nama": "John Doe",        # ← Ganti dengan nama dari debug_db.py
    "noHp": "628123456789"     # ← Ganti dengan no telp dari debug_db.py
}
```

Expected output jika sukses:
```
✅ Status: 200
📄 Response Body:
{
  "success": true,
  "message": "Kode OTP telah dikirim ke WhatsApp Anda",
  "data": {
    "phone": "628123456789"
  },
  "timestamp": "2026-01-21T14:51:39.123456"
}
```

STEP 5: Test lewat browser
  http://localhost:8000/forgot-password
  Input:
    - Nama: [dari debug_db.py]
    - No WhatsApp: [dari debug_db.py]
  Klik "Minta Kode OTP"

STEP 6: Monitor Flask console
  Lihat output di Flask console untuk debugging:
  ```
  📥 Request OTP received
  📋 Request method: POST
  📝 Parsed - Nama: "John Doe" | No HP: "628123456789"
  🔍 Looking for user: nama=John Doe, phone=628123456789
  ✅ User found: john@example.com
  🔐 OTP Generated: 735772
  💬 Sending WA message...
  ✅ OTP sent to 628123456789
  ```

═══════════════════════════════════════════════════════════════════════════════

🔍 DEBUGGING STEPS JIKA MASIH ERROR
────────────────────────────────────────────────────────────────────────────────

ERROR 1: "Data tidak ditemukan"
  Penyebab: Nama/nomor telp tidak sesuai database
  Solusi:
    1. Jalankan: python debug_db.py
    2. Catat PERSIS nama dan nomor dari output
    3. Input PERSIS sama (case-sensitive)

ERROR 2: "Gagal mengirim OTP"
  Penyebab: WhatsApp bot error
  Solusi:
    1. Cek apakah WhatsApp sudah login
    2. Monitor Firefox window (WhatsApp Web)
    3. Cek Firefox background process

ERROR 3: "Terjadi kesalahan. Silakan coba lagi."
  Penyebab: Banyak kemungkinan
  Solusi:
    1. Buka browser DevTools (F12)
    2. Lihat Network tab → POST request
    3. Cek response status dan body
    4. Lihat Flask console untuk error details
    5. Run: python test_api.py untuk direct API test

ERROR 4: "Unable to connect to localhost:5000"
  Penyebab: Flask server tidak running
  Solusi:
    1. Cek di terminal: apakah ada output dari Flask?
    2. Jalankan lagi: python app.py
    3. Tunggu sampai "Running on http://127.0.0.1:5000"

═══════════════════════════════════════════════════════════════════════════════

📊 CHECKLIST SEBELUM TEST
────────────────────────────────────────────────────────────────────────────────

✓ MySQL running (hotelku database)
✓ Users ada di tabel users (check dengan debug_db.py)
✓ Flask installed: python -m pip list | findstr flask
✓ Flask-CORS installed: python -m pip list | findstr flask-cors
✓ .env file ada dan config benar
✓ CodeIgniter running di port 8000
✓ Flask running di port 5000
✓ Firewall/antivirus tidak block port 5000
✓ Data user sesuai (nama & no_telp dari database)

═══════════════════════════════════════════════════════════════════════════════

🎯 FILES YANG DIUPDATE
────────────────────────────────────────────────────────────────────────────────

app.py:
  - Added: from flask_cors import CORS
  - Added: CORS(app, ...) configuration
  - Added: OPTIONS handler di request_otp()
  - Added: Detailed logging di request_otp()

debug_db.py:
  - Fixed: Column name dari telepon → no_telp

test_api.py (NEW):
  - Test endpoint dengan requests library
  - Check CORS headers
  - Check response body

restart_server.bat (NEW):
  - Helper untuk kill & restart Flask server

═══════════════════════════════════════════════════════════════════════════════

💡 TIPS
────────────────────────────────────────────────────────────────────────────────

1. Monitor Flask console sambil test:
   - Lihat semua log yang muncul
   - Catat error messages
   - Share output untuk debugging

2. Gunakan test_api.py untuk isolate problem:
   - Tidak perlu buka browser
   - Direct test ke API
   - Lebih mudah debug

3. Firefox DevTools Network tab:
   - F12 → Network tab
   - Lakukan request di browser
   - Lihat request/response details
   - Cek status code dan headers

4. Bila masih stuck:
   - Jalankan: python test_api.py
   - Share output kesini
   - Kami bisa lihat error yang sebenarnya

═══════════════════════════════════════════════════════════════════════════════
