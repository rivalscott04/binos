<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER PROGRAM</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Akun Master Program</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/program/index') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>NO PROGRAM</label>
                        <input type="text" class="form-control" name="no_program" placeholder="No Program" required>
                    </div>
                    <div class="form-group">
                        <label>KODE PROGRAM</label>
                        <input type="text" class="form-control" name="kode_program" placeholder="Kode Program" required>
                    </div>
                    <div class="form-group">
                        <label>NAMA PROGRAM</label>
                        <input type="text" class="form-control" name="nama_program" placeholder="Nama Program" required>
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