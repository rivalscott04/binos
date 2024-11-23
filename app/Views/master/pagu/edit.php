INI TEMPAT EDIT<?= $this->extend('layout/backend') ?>

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER OUTPUT</h1>
        <a href="<?= site_url('/master/pagu/index') ?>" class="btn btn-primary ml-auto">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Akun Master Output</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/pagu/edit/' . $pagu[0]->id) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label>KODE KEGIATAN</label>
                        <select class="form-control" name="kode_sub_output" value="<?= $pagu[0]->kode_sub_output ?>">
                            <?php foreach ($dtakun_kegiatan as $key => $value) : ?>
                            <option value="<?= $value->kode_sub_output ?>">
                                <?= $value->kode_sub_output ?> - <?= $value->nama_sub_output ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE ITEM</label>
                        <select class="form-control" name="kode_item" value="<?= $pagu[0]->kode_item ?>">
                            <?php foreach ($dtakun_program as $key => $value) : ?>
                            <option value="<?= $value->kode_item ?>">
                                <?= $value->kode_item ?> - <?= $value->nama_item ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>JUMLAH PAGU</label>
                        <input type="number" class="form-control" name="jumlah_pagu" placeholder="0" value="<?= $pagu[0]->jumlah_pagu ?>" required>
                    </div>
                    <div class="form-group">
                        <label>REALISASI PAGU</label>
                        <input type="number" class="form-control" name="Jumlag Terpakai" placeholder="0" readonly value="<?= $pagu[0]->jumlah_terpakai ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Update
                        </button>
                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-trash-arrow-up"></i>
                            Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</section>

<?= $this->endSection() ?>;
