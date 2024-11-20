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

        ._head  {
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
            border-collapse: collapse; /* Menggabungkan border tabel */
            width: 100%; /* Lebar tabel 100% */
            margin-top: 10px;
            font-family: "Times New Roman", Times, serif;

        }
        .td {
            border: 1px solid black; /* Menambahkan border pada cell */
            padding: 8px; /* Memberikan jarak di dalam cell */
            text-align: center; /* Menyelaraskan teks ke kiri */
        }
        .th {
            border: 1px solid black; /* Menambahkan border pada cell */
            background-color: #f2f2f2; /* Warna latar belakang untuk header */
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

        <p style="margin-top: 20px;">Dalam rangka pemenuhan kebutuhan Program Dukungan Manajemen Sub Bagian Pembinaan pada Kejaksaan Negeri Mataram Tahun Anggaran 2024 sebagai berikut:</p>

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
        
        <table class="table">
            <tr class="tr">
                <th class="th">KODE</th>
                <th class="th">URAIAN KEGIATAN</th>
                <th class="th">PAGU DALAM DIPA</th>
                <th class="th">SPP S.D BULAN LALU</th>
                <th class="th">SPP BULAN INI</th>
                <th class="th">SPP S.D BULAN INI</th>
                <th class="th">JUMLAH SPP S.D BULAN INI</th>
                <th class="th">SISA PAGU</th>
            </tr>
            <tr>
                <td class="td">ISI</td>
                <td class="td">ISI</td>
                <td class="td">ISI</td>
                <td class="td">ISI</td>
                <td class="td">ISI</td>
                <td class="td">ISI</td>
                <td class="td">ISI</td>
                <td class="td">ISI</td>
            </tr>
        </table>
    </div>

    <div class="signature">
        <p>Mataram, <?php
                            setlocale(LC_TIME, 'id_ID.UTF-8');
                            echo strftime('%d %B %Y'); 
                        ?>     </p>
        <p>Kepala Sub Bagian Pembinaan</p>
        <br><br><br><br>
        <p style="text-decoration: underline;"><strong>Junaedi, S.H., M.H.</strong></p>
        <p>Adi Wira NIP.196812311989031011</p>
    </div>
    <table>
        <tr>
            <td class="kolom">Telah di Verifikasi Kelengkapan Data Dukung dan dinyatakan Lengkap oleh Kaur Kepegawaian, Keuangan dan PNBP</td>
            <td class="kolom">Telah di Teliti Kelengkapan Data Dukung dan dinyatakan Lengkap oleh Pejabat Pembuat Komitmen </td>
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
