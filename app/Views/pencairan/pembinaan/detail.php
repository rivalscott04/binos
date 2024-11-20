<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

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
                <!-- <form method="post" action="#"> -->
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <table class="table">
                            <tbody style="margin: 0px;">
                                <h4 class="text text-center ">NOTA DINAS</h4>
                                <p class="text text-center">NOMOR:
                                <form action="<?= site_url('pencairan/pembinaan/prints') ?>" method="get" id="prints">
                                    <input type="text" class="form-control" name="no" value="<?= $data[0]->no_surat  ?>"
                                        style="display: inline-block; width: auto; vertical-align: middle; margin-left: 5px;">
                                    <input type="hidden" class="form-control" name="jenis" id="jenisnya"
                                        style="display: inline-block; width: auto; vertical-align: middle; margin-left: 5px;">
                                        <input type="hidden" class="form-control" name="nota" value="<?= $data[0]->no_kwitansi ?>"
                                        style="display: inline-block; width: auto; vertical-align: middle; margin-left: 5px;">
                                </form>
                                </p>

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
                                    <td>: <?= $data[0]->tanggal ?? 'kosong' ?></td>
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
                        <p>Sehubungan dengan telah dilaksanakannya kegiatan Bidang Pembiaan bulan (AMBILKAN BULAN +
                            TAHUN) dengan ini kami mengajukan permohonan biaya pelaksanaannya sesuai dengan ketentuan
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
