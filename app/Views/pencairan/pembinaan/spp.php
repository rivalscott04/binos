<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SPP</title>
    <link rel="stylesheet" href="<?= base_url('template/assets/css/paper.min.css') ?>">
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        hr {
            border: 1.5px solid #000;
            margin-top: 10px;
        }

        ._center {
            text-align: center;
        }

        ._right {
            text-align: right;
        }

        ._head {
            padding-top: 10px;
        }

        ._main {
            font-size: 14px;
            margin-top: 20px;
            font-family: "Times New Roman", Times, serif;

        }

        ._no {
            letter-spacing: 1px;
        }

        ._note {
            font-size: 12px;
            margin-top: 30px;
        }

        .signature {
            margin-top: 60px;
            margin-right: 30px;
            margin-left: 400px;
            text-align: center;
            font-family: "Times New Roman", Times, serif;

        }

        .signature .p {
            margin: 0;
        }

        .table {
            border-collapse: collapse;
            /* Menggabungkan border tabel */
            width: 100%;
            /* Lebar tabel 100% */
            margin-top: 10px;
            font-family: "Times New Roman", Times, serif;

        }

        .td {
            border: 1px solid black;
            /* Menambahkan border pada cell */
            padding: 8px;
            /* Memberikan jarak di dalam cell */
            text-align: center;
            /* Menyelaraskan teks ke kiri */
        }

        .th {
            border: 1px solid black;
            /* Menambahkan border pada cell */
            background-color: #f2f2f2;
            /* Warna latar belakang untuk header */
        }

        .kolom {
            text-align: center;
            width: 30%;
            padding-left: 10px;
            padding-right: 10px;
            margin-top: 0px;
            font-size: 14px;
            font-family: "Times New Roman", Times, serif;

        }
    </style>
</head>

<body class="A4">

    <div class="sheet padding-10mm">
        <div class="_main">
            <p class="_center" style="text-decoration: underline; ">SURAT PERINTAH PEMBAYARAN (SPP)</p> <br>
            <table>
                <tr>
                    <td style="width: 150px">Nomor</td>
                    <td style="width: 5px">:</td>
                    <td>BERDASARKAN NOTA DINAS</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>BERDASARKAN TANGGAL</td>
                </tr>
                <tr>
                    <td>Jenis Pembayaran</td>
                    <td>:</td>
                    <td>TAMPILKAN KODE AKUN BERDASARKAN NODIS </td>
                </tr>
            </table>
            <p style="margin-top: 20px;">
                Kepada Yth,<br>
                Kuasa Pengguna Anggaran (KPA) <br>
                Kejaksaan Negeri Mataram <br>
                Di Mataram
            </p>

            <p style="margin-top: 20px;">Dalam rangka pemenuhan kebutuhan Program Dukungan Manajemen Sub Bagian
                Pembinaan pada Kejaksaan Negeri Mataram Tahun Anggaran 2024 sebagai berikut:</p>

            <table>
                <tr>
                    <td style="width: 15px;">1.</td>
                    <td>Jumlah Pembayaran yang diterima</td>
                    <td>:</td>
                    <td>RP. SESUAI JUMLAH NODIS (RUPIAH)</td>
                </tr>
                <tr>
                    <td style="width: 15px;">2.</td>
                    <td>Untuk Keperluan</td>
                    <td>:</td>
                    <td>BERDASARKAN RINCIAN YANG DIMASUKAN </td>
                </tr>
                <tr>
                    <td style="width: 15px;">3.</td>
                    <td>Atas Nama</td>
                    <td>:</td>
                    <td>Junaedi, S.H., M.M.</td>
                </tr>
            </table>

            <table border="1" style="border-collapse: collapse; width: 100%; text-align: left;">
    <thead>
        <tr>
            <th rowspan="2">KEGIATAN</th>
            <th rowspan="2">PAGU DALAM DIPA</th>
            <th rowspan="2">SPP S.D BULAN LALU</th>
            <th rowspan="2">SPP BULAN INI</th>
            <th rowspan="2">JUMLAH SPP S.D BULAN INI</th>
            <th rowspan="2">SISA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="6"><strong>CCL.051 - Penambahan Layanan Internet, Instalasi, Jaringan dan Langganan Vsat</strong></td>
        </tr>
        <tr>
            <td style="padding-left: 20px;">051 - Pelaksanaan</td>
            <td>47,000,000</td>
            <td>38,035,280</td>
            <td>4,027,080</td>
            <td>42,062,360</td>
            <td>4,937,640</td>
        </tr>
        <tr>
            <td style="padding-left: 40px;">051.0A - Langganan Jaringan Internet</td>
            <td>47,000,000</td>
            <td>38,035,280</td>
            <td>4,027,080</td>
            <td>42,062,360</td>
            <td>4,937,640</td>
        </tr>
        <tr>
            <td style="padding-left: 60px;">522191 - Belanja Jasa Lainnya</td>
            <td>47,000,000</td>
            <td>38,035,280</td>
            <td>4,027,080</td>
            <td>42,062,360</td>
            <td>4,937,640</td>
        </tr>
        <tr>
            <td style="padding-left: 80px;">000116 - Layanan Internet Kantor</td>
            <td>47,000,000</td>
            <td>38,035,280</td>
            <td>4,027,080</td>
            <td>42,062,360</td>
            <td>4,937,640</td>
        </tr>
        <tr>
            <td colspan="6"><strong>EBA.962 - Layanan Umum</strong></td>
        </tr>
        <tr>
            <td style="padding-left: 20px;">053 - Layanan Dukungan Manajemen Satker</td>
            <td>88,400,000</td>
            <td>39,135,760</td>
            <td>9,975,000</td>
            <td>49,110,760</td>
            <td>39,289,240</td>
        </tr>
        <tr>
            <td style="padding-left: 40px;">053.0A - Pengadaan, Cetak dan Jilid</td>
            <td>88,400,000</td>
            <td>39,135,760</td>
            <td>9,975,000</td>
            <td>49,110,760</td>
            <td>39,289,240</td>
        </tr>
        <tr>
            <td style="padding-left: 60px;">521211 - Belanja Bahan</td>
            <td>88,400,000</td>
            <td>39,135,760</td>
            <td>9,975,000</td>
            <td>49,110,760</td>
            <td>39,289,240</td>
        </tr>
        <tr>
            <td style="padding-left: 80px;">000197 - Cetak Spanduk / Jilid / Copy</td>
            <td>88,400,000</td>
            <td>39,135,760</td>
            <td>9,975,000</td>
            <td>49,110,760</td>
            <td>39,289,240</td>
        </tr>
    </tbody>
</table>

        </div>

        <div class="signature">
            <p>Mataram, <?php
            setlocale(LC_TIME, 'id_ID.UTF-8');
            echo strftime('%d %B %Y');
            ?> </p>
            <p>Kepala Sub Bagian Pembinaan</p>
            <br><br>
            <p style="text-decoration: underline;"><strong>Junaedi, S.H., M.H.</strong></p>
            <p>Adi Wira NIP.196812311989031011</p>
        </div>
        <table>
            <tr>
                <td class="kolom">Telah di Verifikasi Kelengkapan Data Dukung dan dinyatakan Lengkap oleh Kaur
                    Kepegawaian, Keuangan dan PNBP</td>
                <td class="kolom">Telah di Teliti Kelengkapan Data Dukung dan dinyatakan Lengkap oleh Pejabat Pembuat
                    Komitmen </td>
                <td class="kolom">Telah di Bayarkan oleh Bendahara Pengeluaran Tanggal ...............</td>
            </tr>
            <tr class="kolom">
                <td><br><br><br><br>BAIQ NURUL HIKMAH, A.Md. <br>
                    Muda Wira NIP.198407312009122005
                </td>
                <td><br><br><br><br>I.DEWA ANANTHANIDA, A.Md., S.H. <br>
                    Muda Wira NIP.198906132009121001
                </td>
                <td><br><br><br><br>NI KADEK WIWIN ANGGRAENI, A.Md. <br>
                    Muda Wira NIP.198803312009122001
                </td>
            </tr>
        </table>

    </div>

</body>

</html>
