<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nota Dinas</title>
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
            text-align: center;
        }

        ._head .title {
            font-size: 20px;
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
            text-align: right;
        }

        .signature p {
            margin: 0;
        }
    </style>
</head>
<body class="A4">

<div class="sheet padding-10mm">

    <table style="width: 100%; text-align: center; border-collapse: collapse;">
        <tr style="display: flex; justify-content: center; align-items: center;">
            <td class="logo" style="padding-right: 20px;">
                <img src="https://blog.logomyway.com/wp-content/uploads/2021/09/hogwarts-logo-main.jpg" alt="Logo" style="width: 100px; height: auto;">
            </td>
            <td class="_center" style="flex: 1; text-align: center;">
                <p class="title" style="font-weight: bold; font-size: 18px; margin: 5px 0;">KEMENTERIAN AGAMA REPUBLIK INDONESIA</p>
                <p class="subtitle" style="font-size: 16px; margin: 5px 0;">KANTOR WILAYAH KEMENTERIAN AGAMA<br>PROVINSI NUSA TENGGARA BARAT</p>
                <p class="address" style="font-size: 14px; margin: 5px 0;">Jalan Udayana No. 4, Mataram 83122 Telp (0370) 633400, Fax (0370) 632227</p>
                <p class="url" style="font-size: 14px; margin: 5px 0;">Website: www.kemenag.go.id</p>
            </td>
        </tr>
    </table>
    

    <hr/>

    <div class="_main">
        <table>
            <tr>
                <td style="width: 80px">Nomor</td>
                <td style="width: 5px">:</td>
                <td class="_no">8710/Kw.18.1/2/KP.08/11/2024</td>
            </tr>
            <tr>
                <td>Yth.</td>
                <td>:</td>
                <td>Kabag TU, Kabid, Pejabat, dan Ketua Tim Kerja pada Kantor Wilayah Kementerian Agama Provinsi NTB</td>
            </tr>
            <tr>
                <td>Dari</td>
                <td>:</td>
                <td>Kepala Kantor Wilayah Kementerian Agama Provinsi NTB</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>Undangan Kick Off Meeting (Rakernas) Kementerian Agama</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>11 November 2024</td>
            </tr>
        </table>

        <p style="margin-top: 20px;">Dengan hormat,</p>

        <p class="_justify">
            Sehubungan dengan pelaksanaan kegiatan <strong>Kick Off Meeting</strong> (Rakernas) Kementerian Agama, di lingkungan Kantor Wilayah Kementerian Agama Provinsi Nusa Tenggara Barat, dengan ini mengharap kehadiran Saudara dalam kegiatan dimaksud yang dilaksanakan pada:
        </p>

        <table style="margin-top: 20px;">
            <tr>
                <td style="width: 100px;">Hari/Tanggal</td>
                <td style="width: 5px;">:</td>
                <td>Selasa, 12 November 2024</td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>08.30 WITA s.d. selesai</td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td>:</td>
                <td>Ruang Rapat Utama Kanwil Kementerian Agama Provinsi Nusa Tenggara Barat</td>
            </tr>
        </table>

        <p class="_justify" style="margin-top: 20px;">
            Demikian untuk dipatuhi tepat waktu. Atas perhatiannya disampaikan terima kasih.
        </p>
    </div>

    <div class="signature">
        <p>Hormat kami,</p>
        <p>Kepala Kantor Wilayah</p>
        <br><br><br><br>
        <p><strong>H. Zamroni Aziz</strong></p>
    </div>

</div>

</body>
</html>
