<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;
<style>
    form#prints {
        display: inline-block;
        margin: 0;
        padding: 0;
        vertical-align: middle;
    }

    form#prints input[type="text"] {
        display: inline-block;
        width: 100%;
        /* Ubah sesuai kebutuhan */
        margin: 0;
        padding: 5px;
        box-sizing: border-box;
        font-size: 14px;
        /* Sesuaikan dengan font elemen lainnya */
        vertical-align: middle;
    }

    form#prints input[type="hidden"] {
        display: none;
        /* Sembunyikan elemen hidden */
    }
</style>
<section class="section">
    <div class="section-header">
        <h1>DETAIL TRANSAKSI PEMBINAAN</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Detail Transaksi Pembinaan</h4>
                <a href="<?= site_url('pencairan/pembinaan/index') ?>" class="btn btn-primary ml-auto">Back</a>
            </div>
            <div class="card-body p-4">

                <?= csrf_field() ?>
                <div class="form-group">
                    <table class="table">
                        <tbody style="margin: 0px;">
                            <tr>
                                <th>Nomor Nota Dinas</th>
                                <td>
                                    <form action="<?= site_url('pencairan/pembinaan/prints') ?>" method="get"
                                        id="prints" style="display: inline-block;">
                                        <span>ND-</span>

                                        <input type="number" class="form-control" name="nomor" placeholder="isi angka" value="<?= $data[0]->no_surat?>"
                                            style="display: inline-block; width: 120px; vertical-align: middle; margin-right: 5px;"
                                            required>

                                        <span>/N.2.10.1/Cu.1/</span>

                                        <input type="text" class="form-control" name="tanggal" placeholder="contoh 10/2024" value="<?= $data[0]->tgl_surat?>"
                                            pattern="\d{2}/\d{4}" title="Format: MM/YYYY (contoh: 10/2024)"
                                            style="display: inline-block; width: 100px; vertical-align: middle; margin-left: 5px;"
                                            required>
                                        <input type="hidden" class="form-control" name="jenis" id="jenisnya">
                                        <input type="hidden" class="form-control" name="nota"
                                            value="<?= $data[0]->no_kwitansi ?>">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Yth</th>
                                <td>: Kepala Kejaksaan Negeri Mataram Selaku Kuasa Pengguna Anggaran (KPA)</td>
                            </tr>
                            <tr>
                                <th>Dari</th>
                                <td>: Kepala Sub Bagian Pembinaan</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>: <?= isset($data[0]->tanggal) ? strftime('%d %B %Y', strtotime($data[0]->tanggal)) : 'kosong' ?></td>
                            </tr>
                            <tr>
                                <th>Sifat</th>
                                <td>: Biasa</td>
                            </tr>
                            <tr>
                                <th>Lampiran</th>
                                <td>: 1 (satu) rangkap</td>
                            </tr>
                            <tr>
                                <th>Hal</th>
                                <td>: <?= $data[0]->perihal ?? 'kosong' ?></td>
                            </tr>

                        </tbody>
                    </table>
                    <p>Sehubungan dengan telah dilaksanakannya kegiatan Bidang Pembinaan bulan <?= isset($data[0]->tanggal) ? strftime('%B %Y', strtotime($data[0]->tanggal)) : 'kosong' ?> dengan ini kami mengajukan permohonan biaya pelaksanaannya sesuai dengan ketentuan
                        yang berlaku. Apabila bapak berkenan mohon untuk ditindaklanjuti:
                    </p>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Uraian Kegiatan</th>
                                <th>Rincian</th>
                                <th>Volume</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
            $no = 1; // Counter untuk nomor
            foreach ($data as $item): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item->akun ?></td>
                                <td><?= $item->nama_item ?></td>
                                <td><?= $item->rincian ?></td>
                                <td><?= $item->volume ?></td>
                                <td><?= number_format($item->harga_satuan, 0, ',', '.') ?></td>
                                <td><?= number_format($item->jumlah, 0, ',', '.') ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <p>Demikian untuk dimaklumi selanjutnya mohon petunjuk</p>

                <div class="form-group">
                    <button class="btn btn-primary ml-auto" onclick="prints('nodis')">Print NODIS</button>
                    <button class="btn btn-primary ml-auto" onclick="prints('spp')">Print SPP</button>
                    <button class="btn btn-primary ml-auto" onclick="prints('sptjm')">Print SPTJM</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>

    </div>
</section>

<?= $this->endSection() ?>;
