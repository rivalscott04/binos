<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NODIS</title>
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
            padding-left: 20px;
        }

        ._centere {
            text-align: center;
            padding-left: 190px;
        }

        ._right {
            text-align: right;
        }

        ._head {
            text-align: center;
        }

        ._head .title {
            font-size: 25px;
            font-weight: bold;
            margin: 0;
        }

        ._head .subtitle {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }

        ._head .address {
            font-size: 12px;
            margin-top: 4px;
        }

        ._head .url {
            font-size: 12px;
            margin-top: 2px;
            font-style: italic;
        }

        ._head .logo {
            padding: 0;
            text-align: center;
        }

        ._head .logo img {
            max-width: 80px;
        }

        ._main {
            font-size: 14px;
            margin-top: 20px;
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
        }

        .signature p {
            margin: 0;
        }

        .table {
            border-collapse: collapse;
            /* Menggabungkan border tabel */
            width: 100%;
            /* Lebar tabel 100% */
            margin-top: 10px;
            font-size: 12px;
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
    </style>
</head>

<body class="A4">

    <div class="sheet padding-10mm">

        <table class="_head">
            <tr>
                <td class="_centere">
                    <p class="subtitle">KEJAKSAAN NEGERI MATARAM</p>
                    <p class="title">SEKSI TINDAK PIDANA UMUM</p>
                </td>
            </tr>
        </table>

        <hr />

        <div class="_main">
            <p class="_center" style="margin-bottom: 0px;">NOTA DINAS</p>
            <p class="_center" style="margin-top: 0px;">NOMOR : <?= $isi[0]->no_surat ?? 'kosong' ?></p>
            <table>
                <tr>
                    <td style="width: 100px">Yth</td>
                    <td style="width: 5px">:</td>
                    <td>Kepala Kejaksaan Negeri Mataram Selaku Kuasa Pengguna Anggaran (KPA)</td>
                </tr>
                <tr>
                    <td>Dari</td>
                    <td>:</td>
                    <td>Kepala Sub Bagian Pembinaan</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>BERDASARKAN TANGGAL</td>
                </tr>
                <tr>
                    <td>Sifat</td>
                    <td>:</td>
                    <td>Biasa</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>1 (satu) Berkas</td>
                </tr>
                <tr>
                    <td>Hal</td>
                    <td>:</td>
                    <td>Permohonan Biaya Operasional Bidang Pembinaan</td>
                </tr>
            </table>

            <p style="margin-top: 20px;">Sehubungan dengan telah dilaksanakan kegiatan Pembinaan bulan (SEPTEMBER 2024)
                dengan ini kami mengajukan permohonan biaya pelaksanaannya sesuai dengan ketentuan yang berlaku. Apabila
                Bapak Berkenan mohon untuk ditindaklanjuti :</p>
            <table class="table">
                <tr class="tr">
                    <th class="th">No</th>
                    <th class="th">Kode Kegiatan</th>
                    <th class="th">Uraian Kegiatan</th>
                    <th class="th">Rincian</th>
                    <th class="th">Volume</th>
                    <th class="th">Harga Satuan</th>
                    <th class="th">Jumlah</th>
                </tr>
                <?php 
            $no = 1; // Counter untuk nomor
            foreach ($isi as $item): ?>
                <tr>
                    <td class="td"><?= $no++ ?></td>
                    <td class="td"><?= $item->akun ?></td>
                    <td class="td"><?= $item->nama_item ?></td>
                    <td class="td"><?= $item->rincian ?></td>
                    <td class="td"><?= $item->volume ?></td>
                    <td class="td"><?= number_format($item->harga_satuan, 0, ',', '.') ?></td>
                    <td class="td"><?= number_format($item->jumlah, 0, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </table>

        <p class="_justify" style="margin-top: 20px;">
            Demikian untuk dimaklumi selanjutnya mohon petunjuk.
        </p>


        <div class="signature">
            <p>Kepala Sub Bagian Pembinaan</p>
            <br><br><br>
            <p style="text-decoration: underline;"><strong>Junaedi, S.H., M.H.</strong></p>
            <p>Adi Wira NIP.196812311989031011</p>
        </div>

        <table>
            <p>Tembusan :</p>
            <tr>
                <td style="width: 10px">1.</td>
                <td>Yth. Kepala Kejaksaan Negeri Mataram (Sebagai Laporan)</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Yth. Kepala Sub Bagian Pembinaan</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Arsip</td>
            </tr>
        </table>
    </div>




</body>

</html>
