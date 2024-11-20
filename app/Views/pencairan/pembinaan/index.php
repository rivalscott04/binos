<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>PENCARIAN PEMBINAAN</h1>
    </div>

    <div class="section-body">
        <!-- Session Flashdata -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">x</button>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h4 style="text-align: center;">PENCAIRAN ANGGARAN BIDANG PEMBINAAN</h4>
                <div class="text-left">
                    <nav class="d-inline-block">
                        <a href="<?= site_url('pencairan/pembinaan/new') ?>" class="btn btn-success">Add New</a>
                    </nav>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="myTable">
                        <thead>
                            <tr class="text text-center">
                                <th>NO</th>
                                <th>NO KWITANSI</th>
                                <th>TANGGAL</th>
                                <th>PERIHAL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtpencairan_pembinaan as $key => $value) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td class="text text-center"><?= $value->no_kwitansi ?></td>
                                    <td><?= $value->tanggal ?></td>
                                    <td><?= $value->perihal ?></td>
                                    <td class="text text-center">
                                        <!-- DETAIL -->
                                        <a href="<?= site_url('pencairan/pembinaan/detail/' . $value->id_pencairan_pembinaan) ?>" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                                        <!-- EDIT -->
                                        <button type="button" class="btn btn-warning edit-btn" data-id="<?= $value->id_pencairan_pembinaan ?>" data-no_kwitansi="<?= $value->no_kwitansi ?>" data-tanggal="<?= $value->tanggal ?>" data-akun="<?= $value->akun ?>" data-kode_item="<?= $value->kode_item ?>" data-perihal="<?= $value->perihal ?>" data-rincian="<?= $value->rincian ?>" data-volume="<?= $value->volume ?>" data-harga_satuan="<?= $value->harga_satuan ?>" data-toggle="modal" data-target="#editModal"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <!-- DELETE -->
                                        <form action="<?= site_url('pencairan/pembinaan/index/' . $value->id_pencairan_pembinaan) ?>" method="post" id="del-<?= $value->id_pencairan_pembinaan ?>" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger btn-small" data-confirm="Hapus Data ... ? | Apakah Anda Yakin ... ?" data-confirm-yes="hapus(<?= $value->id_pencairan_pembinaan ?>)"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= site_url('pencairan/pembinaan/update/') ?>" id="formEdit" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_pencairan_pembinaan" id="edit-id">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Pencairan Pembinaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-no_kwitansi">No Kwitansi</label>
                        <input type="text" class="form-control" name="no_kwitansi" id="edit-no_kwitansi" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="edit-tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-akun">Akun</label>
                        <input type="text" class="form-control" name="akun" id="edit-akun" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="edit-kode_item">Kode Item</label>
                        <input type="text" class="form-control" name="kode_item" id="edit-kode_item" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="edit-perihal">Perihal</label>
                        <input type="text" class="form-control" name="perihal" id="edit-perihal" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-rincian">Rincian</label>
                        <input type="text" class="form-control" name="rincian" id="edit-rincian" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-volume">Volume</label>
                        <input type="number" class="form-control" name="volume" id="edit-volume" required>
                    </div>
                    <div class="form-group">
                        <label for="edit-harga">Harga</label>
                        <input type="number" class="form-control" name="harga_satuan" id="edit-harga" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit">Simpan Perubahan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('formEdit').action =  "<?= site_url('pencairan/pembinaan/edit/') ?>" + this.dataset.id;
            document.getElementById('edit-id').value = this.dataset.id;
            document.getElementById('edit-akun').value = this.dataset.akun;
            document.getElementById('edit-kode_item').value = this.dataset.kode_item;
            document.getElementById('edit-no_kwitansi').value = this.dataset.no_kwitansi;
            document.getElementById('edit-tanggal').value = this.dataset.tanggal;
            document.getElementById('edit-perihal').value = this.dataset.perihal;
            document.getElementById('edit-rincian').value = this.dataset.rincian;
            document.getElementById('edit-volume').value = this.dataset.volume;
            document.getElementById('edit-harga').value = this.dataset.harga_satuan;
        });
    });
</script>

<?= $this->endSection() ?>;
