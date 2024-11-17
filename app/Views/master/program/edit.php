<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER PROGRAM</h1>
        <a href="<?= site_url('/master/program/index') ?>" class="btn btn-primary ml-auto">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Akun Master Program</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/program/edit/' . $dtakun_program->id_program) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label>NO PROGRAM</label>
                        <input type="text" class="form-control" name="no_program" placeholder="No Program" required value="<?= $dtakun_program->no_program ?>">
                    </div>
                    <div class="form-group">
                        <label>KODE PROGRAM</label>
                        <input type="text" class="form-control" name="kode_program" placeholder="Kode Program" required value="<?= $dtakun_program->kode_program ?>">
                    </div>
                    <div class="form-group">
                        <label>NAMA PROGRAM</label>
                        <input type="text" class="form-control" name="nama_program" placeholder="Nama Program" required value="<?= $dtakun_program->nama_program ?>">
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