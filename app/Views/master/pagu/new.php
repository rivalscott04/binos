<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER OUTPUT</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Akun Master Output</h4>
                <a href="<?= site_url('master/pagu/index') ?>" class="btn btn-primary ml-auto">Back</a>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/pagu/index') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>KODE KEGIATAN</label>
                        <select class="form-control" name="kode_sub_output">
                            <?php foreach ($dtakun_kegiatan as $key => $value) : ?>
                                <option value="<?= $value->kode_sub_output ?>">
                                    <?= $value->kode_sub_output ?> - <?= $value->nama_sub_output ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE ITEM</label>
                        <select class="form-control" name="kode_item">
                            <?php foreach ($dtakun_program as $key => $value) : ?>
                                <option value="<?= $value->kode_item ?>">
                                    <?= $value->kode_item ?> - <?= $value->nama_item ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>JUMLAH PAGU</label>
                        <input type="number" class="form-control" name="jumlah_pagu" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label>JUMLAH Terpakai</label>
                        <input type="number" class="form-control" name="jumlah_terpakai" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-trash-arrow-up"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</section>

<?= $this->endSection() ?>;