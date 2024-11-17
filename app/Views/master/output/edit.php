INI TEMPAT EDIT<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER OUTPUT</h1>
        <a href="<?= site_url('/master/output/index') ?>" class="btn btn-primary ml-auto">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Akun Master Output</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/output/edit/' . $dtakun_output->id_output) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label>KODE PROGRAM</label>
                        <select class="form-control" name="no_program">
                            <?php foreach ($dtakun_program as $key => $value) : ?>
                                <option value="<?= $value->id_program ?>" <?= $dtakun_output->no_program == $value->nama_program ? 'selected' : null ?>>
                                    <?= $value->kode_program ?> - <?= $value->nama_program ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE KEGIATAN</label>
                        <select class="form-control" name="no_kegiatan">
                            <?php foreach ($dtakun_kegiatan as $key => $value) : ?>
                                <option value="<?= $value->id_kegiatan ?>" <?= $dtakun_output->no_kegiatan == $value->nama_kegiatan ? 'selected' : null ?>>
                                    <?= $value->kode_kegiatan ?> - <?= $value->nama_kegiatan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NO OUTPUT</label>
                        <input type="text" class="form-control" name="no_output" placeholder="No Output" required value="<?= $dtakun_output->no_output ?>">
                    </div>
                    <div class="form-group">
                        <label>KODE OUTPUT</label>
                        <input type="text" class="form-control" name="kode_output" placeholder="Kode Output" required value="<?= $dtakun_output->kode_output ?>">
                    </div>
                    <div class="form-group">
                        <label>NAMA OUTPUT</label>
                        <input type="text" class="form-control" name="nama_output" placeholder="Nama Output" required value="<?= $dtakun_output->nama_output ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Update </button>
                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-trash-arrow-up"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</section>

<?= $this->endSection() ?>;