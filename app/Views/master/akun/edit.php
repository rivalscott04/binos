INI TEMPAT EDIT<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER AKUN</h1>
        <a href="<?= site_url('/master/akun/index') ?>" class="btn btn-primary ml-auto">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Akun Master Akun</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/akun/edit/' . $dtakun_akun->id_akun) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label>KODE PROGRAM</label>
                        <select class="form-control" name="no_program">
                            <?php foreach ($dtakun_program as $key => $value) : ?>
                                <option value="<?= $value->id_program ?>" <?= $dtakun_akun->no_program == $value->nama_program ? 'selected' : null ?>>
                                    <?= $value->kode_program ?> - <?= $value->nama_program ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE KEGIATAN</label>
                        <select class="form-control" name="no_kegiatan">
                            <?php foreach ($dtakun_kegiatan as $key => $value) : ?>
                                <option value="<?= $value->id_kegiatan ?>" <?= $dtakun_akun->no_kegiatan == $value->nama_kegiatan ? 'selected' : null ?>>
                                    <?= $value->kode_kegiatan ?> - <?= $value->nama_kegiatan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE OUTPUT</label>
                        <select class="form-control" name="no_output">
                            <?php foreach ($dtakun_output as $key => $value) : ?>
                                <option value="<?= $value->id_output ?>" <?= $dtakun_akun->no_output == $value->nama_output ? 'selected' : null ?>>
                                    <?= $value->kode_output ?> - <?= $value->nama_output ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE SUB OUTPUT</label>
                        <select class="form-control" name="no_suboutput">
                            <?php foreach ($dtakun_suboutput as $key => $value) : ?>
                                <option value="<?= $value->id_suboutput ?>" <?= $dtakun_akun->no_suboutput == $value->nama_suboutput ? 'selected' : null ?>>
                                    <?= $value->kode_suboutput ?> - <?= $value->nama_suboutput ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE KOMPONEN</label>
                        <select class="form-control" name="no_komponen">
                            <?php foreach ($dtakun_komponen as $key => $value) : ?>
                                <option value="<?= $value->id_komponen ?>">
                                    <?= $value->kode_komponen ?> - <?= $value->nama_komponen ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE SUB KOMPONEN</label>
                        <select class="form-control" name="no_subkomponen">
                            <?php foreach ($dtakun_subkomponen as $key => $value) : ?>
                                <option value="<?= $value->id_subkomponen ?>">
                                    <?= $value->kode_subkomponen ?> - <?= $value->nama_subkomponen ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>NO AKUN</label>
                        <input type="text" class="form-control" name="no_akun" placeholder="No Akun" required value="<?= $dtakun_akun->no_akun ?>">
                    </div>
                    <div class="form-group">
                        <label>KODE Akun</label>
                        <input type="text" class="form-control" name="kode_akun" placeholder="Kode Akun" required value="<?= $dtakun_akun->kode_akun ?>">
                    </div>
                    <div class="form-group">
                        <label>NAMA AKUN</label>
                        <input type="text" class="form-control" name="nama_akun" placeholder="Nama aKUN" required value="<?= $dtakun_akun->nama_akun ?>">
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