<?= $this->extend('layout/backend') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>TRANSAKSI PEMBINAAN</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Transaksi Pembinaan</h4>
                <a href="<?= site_url('pencairan/pembinaan/index') ?>" class="btn btn-primary ml-auto">Back</a>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('pencairan/pembinaan/index') ?>">
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
                                    <th style="width: 5%">No</th>
                                    <th style="width: 20%">Kegiatan</th>
                                    <th style="width: 15%">Akun</th>
                                    <th style="width: 10%">Kode Item</th>
                                    <th style="width: 20%">Rincian</th>
                                    <th style="width: 10%">Volume</th>
                                    <th style="width: 10%">Harga Satuan</th>
                                    <th style="width: 10%">Jumlah</th>
                                    <th>
                                        <button type="button" class="btn btn-primary btn-sm btn-block" id="addRowButton">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            </thead>
                            <tbody id="tableBody">
                                <!-- Baris pertama akan ditambahkan oleh JavaScript -->
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

<script type="application/json" id="kegiatan-data">
    <?= json_encode($kegiatan) ?>
</script>
<script type="application/json" id="akun-data">
    <?= json_encode($akun) ?>
</script>
<script type="application/json" id="kode-item-data">
    <?= json_encode($kode_item) ?>
</script>

<?= $this->endSection() ?>