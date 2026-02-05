<?php
if (!function_exists('formatBookingCode')) {
    function formatBookingCode(array $row): string
    {
        $bookingId = $row['id'] ?? $row['pemesanan_id'] ?? $row['id_pemesanan'] ?? null;
        if (empty($bookingId)) {
            return 'HK00000';
        }
        return 'HK' . str_pad((string) $bookingId, 5, '0', STR_PAD_LEFT);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }
        .kop-surat {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat h1 {
            margin: 0;
            font-size: 24px;
            color: #000000;
        }
        .kop-surat p {
            margin: 5px 0;
            font-size: 11px;
        }
        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin: 20px 0;
            text-transform: uppercase;
        }
        .info-laporan {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th {
            background-color: #667eea;
            color: white;
            padding: 8px;
            font-size: 11px;
            text-align: left;
        }
        td {
            padding: 6px;
            font-size: 10px;
        }
        .total-row {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
        }
        .signature {
            float: right;
            text-align: right;
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <h1>HOTELKU</h1>
        <p>Platform Pemesanan Hotel, Villa & Apartemen Terpercaya</p>
        <p>Jl. Sudirman No. 123, Jakarta Pusat 10220 | Telp: (021) 1234-5678 | Email: info@hotelku.com</p>
    </div>

    <!-- Judul Laporan -->
    <div class="title">
        LAPORAN PEMESANAN<br>
        Periode: <?= date('d F Y', strtotime($tanggal_mulai)) ?> s/d <?= date('d F Y', strtotime($tanggal_selesai)) ?>
    </div>

    <!-- Info Laporan -->
    <div class="info-laporan">
        <table style="border: none; margin: 0;">
            <tr style="border: none;">
                <td style="border: none; width: 20%;">Tanggal Cetak</td>
                <td style="border: none; width: 2%;">:</td>
                <td style="border: none;"><?= $tanggal_cetak ?></td>
            </tr>
            <tr style="border: none;">
                <td style="border: none;">Dibuat Oleh</td>
                <td style="border: none;">:</td>
                <td style="border: none;"><?= esc($pembuat_laporan) ?></td>
            </tr>
        </table>
    </div>

    <!-- Tabel Data Pemesanan -->
    <?php if(empty($pemesanan)): ?>
        <div style="text-align: center; padding: 40px; border: 2px dashed #ccc; margin: 20px 0;">
            <p style="font-size: 14px; color: #666;">
                <strong>Tidak ada pemesanan pada rentang tanggal tersebut</strong>
            </p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Booking</th>
                    <th>Nama Tamu</th>
                    <th>Akomodasi</th>
                    <th>Check-in</th>
                    <th>Malam</th>
                    <th>Total (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($pemesanan as $p): 
                ?>
                    <tr>
                        <td style="text-align: center;"><?= $no++ ?></td>
                        <td><?= formatBookingCode($p) ?></td>
                        <td><?= esc($p['nama_tamu']) ?></td>
                        <td>
                            <?= esc($p['nama_akomodasi']) ?><br>
                            <small><?= esc($p['nama_tipe']) ?></small>
                        </td>
                        <td><?= date('d M Y', strtotime($p['tanggal_checkin'])) ?></td>
                        <td style="text-align: center;"><?= $p['jumlah_malam'] ?></td>
                        <td style="text-align: right;"><?= number_format($p['total_harga'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
                
                <!-- Total Row -->
                <tr class="total-row">
                    <td colspan="6" style="text-align: right; padding-right: 10px;">
                        <strong>TOTAL TRANSAKSI:</strong>
                    </td>
                    <td style="text-align: right;">
                        <strong>Rp <?= number_format($total_transaksi, 0, ',', '.') ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Ringkasan -->
        <div style="margin-top: 50px; padding: 15px; background-color: #f8f9fa; border-radius: 5px;">
            <strong>RINGKASAN:</strong><br>
            Total Pemesanan: <strong><?= count($pemesanan) ?></strong> transaksi<br>
            Total Pendapatan: <strong>Rp <?= number_format($total_transaksi, 0, ',', '.') ?></strong>
        </div>
    <?php endif; ?>

    <!-- Footer & Tanda Tangan -->
    <div class="footer">
        <div style="float: left; width: 50%;">
            <p><em>Dokumen ini dibuat secara otomatis oleh sistem Hotelku</em></p>
        </div>
        <div class="signature">
            <p>Yogyakarta, <?= $tanggal_cetak ?></p>
            <p><strong>Hormat Kami,</strong></p>
            <p><strong><?= esc($pembuat_laporan) ?></strong></p>
        </div>
    </div>
</body>
</html>
