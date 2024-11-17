<?= $this->extend('layout/backend') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>TRANSAKSI</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Transaksi</h4>
                <a href="<?= site_url('transaksi/pembinaan/index') ?>" class="btn btn-primary ml-auto">Back</a>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('transaksi/pembinaan/create') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>PERIHAL</label>
                        <input type="text" class="form-control" name="perihal" placeholder="Permohonan Biaya Operasional Bidang Pembinaan Bulan .... Tahun ...." required>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" id="tableLoop">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Uraian Kegiatan</th>
                                    <th>Rincian</th>
                                    <th>Volume</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>
                                        <button class="btn btn-primary btn-sm btn-block" id="Barisbaru"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- diisi oleh form dinamis dengan jQuery -->
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-trash-arrow-up"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
