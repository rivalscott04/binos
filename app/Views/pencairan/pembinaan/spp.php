<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SPP</title>
    <link rel="stylesheet" href="<?= base_url('template/assets/css/paper.min.css') ?>">
    <style>
        @page {
            size: F4;
            /* Legal size */
            margin: 20mm;
            margin-bottom: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .sheet {
            width: 210mm;
            height: auto;
            /* Changed from fixed height to auto */
            margin: 0 auto;
            padding: 20mm;
            background: white;
            page-break-inside: avoid;
            /* Prevent content splitting */
            page-break-after: always;
            overflow: hidden;
        }

        /* Ensure the last sheet does not force a page break */
        .sheet:last-child {
            page-break-after: avoid;
        }


        hr {
            border: 1.5px solid #000;
            margin-top: 10px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
            font-family: "Times New Roman", Times, serif;
        }

        .signature {
            margin-top: 40px;
            text-align: center;
        }

        @media print {
            body {
                width: 210mm;
                margin: 0 auto;
            }

            .sheet {
                margin: 0;
                padding: 20mm;
                page-break-inside: avoid;
                page-break-after: always;
            }

            .sheet:last-child {
                page-break-after: avoid;
                /* Prevent extra blank page */
            }
        }

        /* Additional styles from the second document */
        ._center {
            text-align: center;
        }

        ._main {
            font-size: 14px;
            margin-top: 20px;
            font-family: "Times New Roman", Times, serif;
        }

        .signature {
            margin-top: 60px;
            margin-right: 30px;
            margin-left: 400px;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
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

<body>
    <?php
    function terbilang($angka)
    {
        // Fungsi terbilang tetap sama seperti sebelumnya
        if (!is_numeric($angka)) {
            return "Input bukan angka";
        }

        $angka = abs($angka);
        $terbilang = [
            "",
            "satu",
            "dua",
            "tiga",
            "empat",
            "lima",
            "enam",
            "tujuh",
            "delapan",
            "sembilan",
            "sepuluh",
            "sebelas"
        ];

        $hasil = "";
        if ($angka < 12) {
            $hasil = " " . $terbilang[$angka];
        } elseif ($angka < 20) {
            $hasil = terbilang($angka - 10) . " belas";
        } elseif ($angka < 100) {
            $hasil = terbilang(floor($angka / 10)) . " puluh " . terbilang($angka % 10);
        } elseif ($angka < 200) {
            $hasil = "seratus " . terbilang($angka - 100);
        } elseif ($angka < 1000) {
            $hasil = terbilang(floor($angka / 100)) . " ratus " . terbilang($angka % 100);
        } elseif ($angka < 2000) {
            $hasil = "seribu " . terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            $hasil = terbilang(floor($angka / 1000)) . " ribu " . terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            $hasil = terbilang(floor($angka / 1000000)) . " juta " . terbilang($angka % 1000000);
        } elseif ($angka < 1000000000000) {
            $hasil = terbilang(floor($angka / 1000000000)) . " miliar " . terbilang(fmod($angka, 1000000000));
        } else {
            $hasil = "Angka terlalu besar";
        }

        return trim($hasil);
    }
    ?>

    <div class="_main">
        <div class="sheet">
            <p class="_center" style="text-decoration: underline;">SURAT PERINTAH PEMBAYARAN (SPP)</p> <br>
            <table>
                <tr>
                    <td style="width: 150px">Nomor</td>
                    <td style="width: 5px">:</td>
                    <td>ND-<?= $data['nomor'] ?>/N.2.10.1/Cu.1/<?= $data['tanggal'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= isset($isi[0]->tanggal) ? strftime('%d %B %Y', strtotime($isi[0]->tanggal)) : 'kosong' ?></td>
                </tr>
                <tr>
                    <td>Jenis Pembayaran </td>
                    <td>:</td>
                    <td><?= $akun[0]->kode_akun . ' | ' . $akun[0]->nama_akun ?></td>
                </tr>
            </table>

            <p style="margin-top: 20px;">
                Kepada Yth,<br>
                Kuasa Pengguna Anggaran (KPA) <br>
                Kejaksaan Negeri Mataram <br>
                Di Mataram
            </p>

            <p style="margin-top: 20px;">Dalam rangka pemenuhan kebutuhan Program Dukungan Manajemen Sub Bagian
                Pembinaan pada Kejaksaan Negeri Mataram Tahun Anggaran <?= date('Y') ?> sebagai berikut:</p>

            <table>
                <tr>
                    <td style="width: 15px;">1.</td>
                    <td>Jumlah Pembayaran yang diterima</td>
                    <td>:</td>
                    <td>
                        Rp <?= number_format($akun[0]->total_jumlah, 0, ',', '.') ?>
                        (<?= terbilang($akun[0]->total_jumlah) ?> rupiah)
                    </td>
                </tr>
                <tr>
                    <td style="width: 15px;">2.</td>
                    <td>Untuk Keperluan</td>
                    <td>:</td>
                    <td>
                        <?php
                        $keperluanItems = array_column($isi, 'nama_item');
                        echo implode(', ', $keperluanItems);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 15px;">3.</td>
                    <td>Atas Nama</td>
                    <td>:</td>
                    <td><?= $notaDinas->nama_penerima ?? 'Tidak Diketahui' ?></td>
                </tr>
            </table>

            <?php
            $max_per_page = 3; // Maksimal data per halaman
            $total_data = count($dtrealisasi_anggaran); // Total data
            $total_pages = ceil($total_data / $max_per_page); // Hitung jumlah halaman
            ?>

            <?php for ($page = 0; $page < $total_pages; $page++): ?>
                <?php if ($page > 0): ?>
                    <div class="sheet"> <!-- Memulai halaman baru -->
                    <?php endif; ?>

                    <table class="table">
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
                            <?php
                            $start = $page * $max_per_page;
                            $end = min($start + $max_per_page, $total_data);
                            for ($i = $start; $i < $end; $i++):
                                $value = $dtrealisasi_anggaran[$i];
                            ?>
                                <tr>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: center;"><?= $i + 1 ?></td>
                                    <td style="border: 1px solid #ccc; padding: 8px;"><?= $value->kegiatan ?? 'Tidak Ada' ?></td>
                                    <td style="border: 1px solid #ccc; padding: 8px;"><?= $value->nama_item ?? 'Tidak Ada' ?></td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: center;"><?= number_format($value->pagu_dalam_dipa ?? 0, 0, ',', '.') ?></td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: center;"><?= number_format($value->jumlah_spp ?? 0, 0, ',', '.') ?></td>
                                    <td style="border: 1px solid #ccc; padding: 8px; text-align: center;"><?= number_format($value->sisa_pagu ?? 0, 0, ',', '.') ?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>

                    <?php if ($page == $total_pages - 1): ?>
                        <!-- Signature untuk halaman terakhir -->
                        <div class="signature">
                            <p>Mataram, <?= $sekarang ?></p>
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
                    <?php endif; ?>
                    </div>
                <?php endfor; ?>
        </div>
    </div>
</body>

</html>