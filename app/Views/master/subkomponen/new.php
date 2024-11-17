<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER SUB KOMPONEN</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Akun Master Sub Komponen</h4>
                <a href="<?= site_url('master/subkomponen/index') ?>" class="btn btn-primary ml-auto">Back</a>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('master/subkomponen/index') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>KODE PROGRAM</label>
                        <select class="form-control" name="no_program">
                            <?php foreach ($dtakun_program as $key => $value) : ?>
                                <option value="<?= $value->id_program ?>">
                                    <?= $value->kode_program ?> - <?= $value->nama_program ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>KODE KEGIATAN</label>
                        <select class="form-control" name="no_kegiatan">
                            <?php foreach ($dtakun_kegiatan as $key => $value) : ?>
                                <option value="<?= $value->id_kegiatan ?>">
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
                        <label>KODE SUB OUTPUT</label>
                        <select class="form-control" name="no_suboutput">
                            <?php foreach ($dtakun_suboutput as $key => $value) : ?>
                                <option value="<?= $value->id_suboutput ?>">
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
                        <label>NO SUB KOMPONEN</label>
                        <input type="text" class="form-control" name="no_subkomponen" placeholder="No Sub Komponen" required>
                    </div>
                    <div class="form-group">
                        <label>KODE SUB KOMPONEN</label>
                        <input type="text" class="form-control" name="kode_subkomponen" placeholder="Kode Sub Komponen" required>
                    </div>
                    <div class="form-group">
                        <label>NAMA SUB KOMPONEN</label>
                        <input type="text" class="form-control" name="nama_subkomponen" placeholder="Nama Sub Komponen" required>
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