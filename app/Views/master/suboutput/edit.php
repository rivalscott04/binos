INI TEMPAT EDIT<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER SUB OUTPUT</h1>
        <a href="<?= site_url('/master/suboutput/index') ?>" class="btn btn-primary ml-auto">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Akun Master Sub Output</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/suboutput/edit/' . $dtakun_suboutput->id_suboutput) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label>KODE PROGRAM</label>
                        <select class="form-control" name="no_program">
                            <?php foreach ($dtakun_program as $key => $value) : ?>
                                <option value="<?= $value->id_program ?>" <?= $dtakun_suboutput->no_program == $value->nama_program ? 'selected' : null ?>>
                                    <?= $value->kode_program ?> - <?= $value->nama_program ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE KEGIATAN</label>
                        <select class="form-control" name="no_kegiatan">
                            <?php foreach ($dtakun_kegiatan as $key => $value) : ?>
                                <option value="<?= $value->id_kegiatan ?>" <?= $dtakun_suboutput->no_kegiatan == $value->nama_kegiatan ? 'selected' : null ?>>
                                    <?= $value->kode_kegiatan ?> - <?= $value->nama_kegiatan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE OUTPUT</label>
                        <select class="form-control" name="no_output">
                            <?php foreach ($dtakun_output as $key => $value) : ?>
                                <option value="<?= $value->id_output ?>">
                                    <?= $value->kode_output ?> - <?= $value->nama_output ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NO SUB OUTPUT</label>
                        <input type="text" class="form-control" name="no_suboutput" placeholder="No Sub Output" required value="<?= $dtakun_suboutput->no_suboutput ?>">
                    </div>
                    <div class="form-group">
                        <label>KODE SUB OUTPUT</label>
                        <input type="text" class="form-control" name="kode_suboutput" placeholder="Kode Sub Output" required value="<?= $dtakun_suboutput->kode_suboutput ?>">
                    </div>
                    <div class="form-group">
                        <label>NAMA SUB OUTPUT</label>
                        <input type="text" class="form-control" name="nama_suboutput" placeholder="Nama Sub Output" required value="<?= $dtakun_suboutput->nama_suboutput ?>">
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