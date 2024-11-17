INI TEMPAT EDIT<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER KEGIATAN</h1>
        <a href="<?= site_url('/master/kegiatan/index') ?>" class="btn btn-primary ml-auto">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Akun Master Kegiatan</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/kegiatan/edit/' . $dtakun_kegiatan->id_kegiatan) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label>KODE PROGRAM</label>
                        <select class="form-control" name="no_program">
                            <?php foreach ($dtakun_program as $key => $value) : ?>
                                <option value="<?= $value->id_program ?>" <?= $dtakun_kegiatan->no_program == $value->nama_program ? 'selected' : null ?>>
                                    <?= $value->kode_program ?> - <?= $value->nama_program ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NO KEGIATAN</label>
                        <input type="text" class="form-control" name="no_kegiatan" placeholder="No Kegiatan" required value="<?= $dtakun_kegiatan->no_kegiatan ?>">
                    </div>
                    <div class="form-group">
                        <label>KODE KEGIATAN</label>
                        <input type="text" class="form-control" name="kode_kegiatan" placeholder="Kode Kegiatan" required value="<?= $dtakun_kegiatan->kode_kegiatan ?>">
                    </div>
                    <div class="form-group">
                        <label>NAMA KEGIATAN</label>
                        <input type="text" class="form-control" name="nama_kegiatan" placeholder="Nama Kegiatan" required value="<?= $dtakun_kegiatan->nama_kegiatan ?>">
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