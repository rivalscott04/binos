<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SPTJM</title>
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
            font-size: 18px;
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
    </style>
</head>

<?php
function terbilang($angka)
{
    // Pastikan input adalah angka
    if (!is_numeric($angka)) {
        return "Input bukan angka";
    }

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
<body class="A4">

    <div class="sheet padding-10mm">

        <table class="_head">
            <tr>
                <td class="logo">
                    <img src="<?= base_url('template/assets/img/logo.png') ?>" alt="Logo"
                        style="width: 100px; height: auto;">
                </td>
                <td class="_center">
                    <p class="subtitle">KEJAKSAAN REPUBLIK INDONESIA</p>
                    <p class="subtitle">KEJAKSAAN TINGGI NUSA TENGGARA BARAT</p>
                    <p class="title">KEJAKSAAN NEGERI MATARAM </p>
                    <p class="address">Jl. Dr. Sudjono Lingkar Selatan, Kel Jempong Baru Kec. Sekarbela, Kota Mataram
                        Kode Pos : 83121</p>
                </td>
            </tr>
        </table>

        <hr />

        <div class="_main">
            <p class="_center">SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</p> <br>
            <p>Yang bertanda tangan dibawah ini:</p>
            <table>
                <tr>
                    <td style="width: 100px">Nama</td>
                    <td style="width: 5px">:</td>
                    <td>Junaedi, S.H., M.M.</td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>196812311989031011</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>Kepala Sub Bagian Pembinaan</td>
                </tr>
                <tr>
                    <td>Satuan Kerja</td>
                    <td>:</td>
                    <td>Kejaksaan Negeri Mataram</td>
                </tr>
                <?php
                $date = '2024-11-22'; 
                setlocale(LC_TIME, 'id_ID.UTF-8'); // Pastikan locale 'id_ID.UTF-8' tersedia di server Anda
                
                $dateObj = new \DateTime($date);
                $tanggal  = strftime("%d %B %Y", $dateObj->getTimestamp());
                ?>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= $tanggal ?? '' ?></td>
                </tr>
            </table>

            <p style="margin-top: 20px;">Menyatakan dengan sesungguhnya bahwa:</p>
            <table>
                <tr>
                    <td style="width: 15px; text-align: left; vertical-align: top;">1</td>
                    <td style="text-align: justify;">Perhitungan Anggaran Kegiatan Sebesar <strong>Rp.
                    <?= number_format($akun[0]->total_jumlah, 0, ',', '.') ?> </strong>(<?= terbilang($akun[0]->total_jumlah) ?> rupiah) telah dihitung dengan benar.</td>
                </tr>
                <tr>
                    <td style="width: 15px; text-align: left; vertical-align: top;">2</td>
                    <td style="text-align: justify;">Apabila dikemudian hari terdapat kesalahan dan/atau kelebihan atas
                        pembayaran Anggaran Kegiatan tersebut, sebagian atau seluruhnya, kami bertanggung jawab
                        sepenuhnya dan bersedia menyetorkan atas kesalahan dan/atau kelebihan pembayaran tersebut ke Kas
                        Negara.</td>
                </tr>
            </table>

            <p class="_justify" style="margin-top: 20px;">
                Demikian pernyataan ini kami buat dengan sebernar-benarnya.
            </p>
        </div>

        <div class="signature">
            <p>Mataram, <?php
            setlocale(LC_TIME, 'id_ID.UTF-8');
            echo strftime('%d %B %Y');
            ?> </p>
            <p>Kepala Sub Bagian Pembinaan</p>
            <br><br><br><br>
            <p style="text-decoration: underline;"><strong>Junaedi, S.H., M.H.</strong></p>
            <p>Adi Wira NIP.196812311989031011</p>
        </div>

    </div>

</body>

</html>
