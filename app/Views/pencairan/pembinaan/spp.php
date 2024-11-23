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

<?php
function terbilang($angka)
{
    $angka = abs($angka);
    $terbilang = [
        "", "satu", "dua", "tiga", "empat", "lima",
        "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
    ];
    $hasil = "";
    if ($angka < 12) {
        $hasil = " " . $terbilang[$angka];
    } elseif ($angka < 20) {
        $hasil = terbilang($angka - 10) . " belas";
    } elseif ($angka < 100) {
        $hasil = terbilang(floor($angka / 10)) . " puluh" . terbilang($angka % 10);
    } elseif ($angka < 200) {
        $hasil = " seratus" . terbilang($angka - 100);
    } elseif ($angka < 1000) {
        $hasil = terbilang(floor($angka / 100)) . " ratus" . terbilang($angka % 100);
    } elseif ($angka < 2000) {
        $hasil = " seribu" . terbilang($angka - 1000);
    } elseif ($angka < 1000000) {
        $hasil = terbilang(floor($angka / 1000)) . " ribu" . terbilang($angka % 1000);
    } elseif ($angka < 1000000000) {
        $hasil = terbilang(floor($angka / 1000000)) . " juta" . terbilang($angka % 1000000);
    } elseif ($angka < 1000000000000) {
        $hasil = terbilang(floor($angka / 1000000000)) . " miliar" . terbilang(fmod($angka, 1000000000));
    } else {
        $hasil = "Angka terlalu besar";
    }
    return trim($hasil);
}
?>


    <div class="sheet padding-10mm">
        <div class="_main">
            <p class="_center" style="text-decoration: underline; ">SURAT PERINTAH PEMBAYARAN (SPP)</p> <br>
            <table>
                <tr>
                    <td style="width: 150px">Nomor</td>
                    <td style="width: 5px">:</td>
                    <td>ND-<?= $isi[0]->no_surat ?? 'kosong' ?>/N.2.10.1/Cu.1/<?= $isi[0]->tgl_surat ?? 'kosong' ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>
                    <?= isset($isi[0]->tanggal) ? strftime('%d %B %Y', strtotime($isi[0]->tanggal)) : 'kosong' ?>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Pembayaran </td>
                    <td>:</td>
                    <td><?= $akun[0]->kode_akun. " | ".$akun[0]->nama_akun ?></td>
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
                    </td>
                    <td>
                    <?= number_format($akun[0]->total_jumlah, 0, ',', '.') ?> (<?= terbilang($akun[0]->total_jumlah) ?> rupiah)
                    </td>
                </tr>
                <tr>
                    <td style="width: 15px;">2.</td>
                    <td>Untuk Keperluan</td>
                    <td>:</td>
                    <td>
                        masih misteri
                    </td>
                </tr>
                <tr>
                    <td style="width: 15px;">3.</td>
                    <td>Atas Nama</td>
                    <td>:</td>
                    <td>Junaedi, S.H., M.M.</td>
                </tr>
            </table>

            <table class="table table-striped table-md" id="myTable">
                    <thead>
                        <tr style="background-color: #f2f2f2;">
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">No</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">Nama Kegiatan</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">Uraian Kegiatan</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">PAGU DALAM DIPA</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">JUMLAH SPP S.D BULAN INI</th>
                            <th style="border: 1px solid #ccc; padding: 8px; text-align: center;">SISA PAGU</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($dtrealisasi_anggaran as $key => $value) : ?>
                            <tr>
                                <td style="border: 1px solid #ccc; padding: 8px; text-align: center;"><?= $no++ ?></td>
                                <!-- Nomor urut otomatis -->
                                <td style="border: 1px solid #ccc; padding: 8px;"><?= $value->nama_sub_output ?></td>
                                <!-- Nama Kegiatan -->
                                <td style="border: 1px solid #ccc; padding: 8px;"><?= $value->nama_item?></td>
                                <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                                    <?= number_format((float)$value->jumlah_pagu, 0, ',', '.') ?>
                                </td>
                                <!-- Format jumlah pagu -->
                                <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                                    <?= number_format((float)$value->jumlah_terpakai, 0, ',', '.') ?>
                                </td>
                                <!-- Format jumlah terpakai -->
                                <td style="border: 1px solid #ccc; padding: 8px; text-align: right;">
                                    <?= number_format((float)$value->jumlah_pagu - (float)$value->jumlah_terpakai, 0, ',', '.') ?>
                                </td>
                                <!-- Sisa pagu -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

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
