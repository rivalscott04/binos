<?= $this->extend('layout/backend') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER KEGIATAN</h1>
    </div>

    <div class="section-body">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismis="">x</button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismis="">x</button>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h4 style="text-align: center;">AKUN MASTER KEGIATAN</h4>
                <div class="text-left">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addDataModal">Add Multiple Rows</button>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="myTable">
                        <thead>
                            <tr class="text text-center">
                                <th>NO</th>
                                <th>KODE KEGIATAN</th>
                                <th>NAMA KEGIATAN</th>
                                <th>NAMA PROGRAM</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtakun_kegiatan as $key => $value) : ?>
                                <tr>
                                    <td><?= $value->no_kegiatan ?></td>
                                    <td class="text text-center"><?= $value->kode_kegiatan ?></td>
                                    <td><?= $value->nama_kegiatan ?></td>
                                    <td><?= $value->nama_program ?></td>
                                    <td class="text text-center">
                                        <a href="<?= site_url('master/kegiatan/' . $value->id_kegiatan . '/edit') ?>" class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <form action="<?= site_url('master/kegiatan/index/' . $value->id_kegiatan) ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger btn-small"><i class="fa-solid fa-trash"></i></button>
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

<!-- Modal for Adding Multiple Rows -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?= site_url('/master/kegiatan/create') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Add Multiple Rows</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="rows-container">
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <input type="text" name="rows[0][no_kegiatan]" class="form-control" placeholder="No Kegiatan" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="rows[0][kode_kegiatan]" class="form-control" placeholder="Kode Kegiatan" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="rows[0][nama_kegiatan]" class="form-control" placeholder="Nama Kegiatan" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="rows[0][no_program]" class="form-control" placeholder="No Program" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="addRow()">Add More Rows</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function addRow() {
    const container = document.getElementById('rows-container');
    const rowCount = container.children.length;
    const newRow = `
        <div class="row mb-2">
            <div class="col-md-3">
                <input type="text" name="rows[${rowCount}][no_kegiatan]" class="form-control" placeholder="No Kegiatan" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="rows[${rowCount}][kode_kegiatan]" class="form-control" placeholder="Kode Kegiatan" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="rows[${rowCount}][nama_kegiatan]" class="form-control" placeholder="Nama Kegiatan" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="rows[${rowCount}][no_program]" class="form-control" placeholder="No Program" required>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newRow);
}
</script>

<?= $this->endSection() ?>
