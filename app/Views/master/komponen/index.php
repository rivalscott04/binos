<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN MASTER KOMPONEN</h1>
    </div>

    <div class="section-body">
        <!-- INI UNTUK MENANGKAP SESSION SUCCESS DENGAN BAWAAN WITH DI  -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismis="">x</button>
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- INI UNTUK MENANGKAP SESSION ERROR DENGAN BAWAAN WITH DI  -->
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
                <h4 style="text-align: center;">AKUN MASTER KOMPONEN</h4>

                <div class="text-left">
                    <nav class="d-inline-block ">
                        <a href="<?= site_url('master/komponen/new') ?>" class="btn btn-success">Add New</a>
                    </nav>
                </div>
                <!-- INI UNTUK MENANGKAP SESSION SUCCESS DENGAN BAWAAN WITH DI 
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismis="">close</button>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                <?php endif; ?> -->
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-striped table-md" id="myTable">
                        <thead>
                            <tr class="text text-center">
                                <th>NO</th>
                                <th>KODE KOMPONEN</th>
                                <th>NAMA KOMPONEN</th>
                                <th>NAMA SUB OUTPUT</th>
                                <th>NAMA OUTPUT</th>
                                <th>NAMA KEGIATAN</th>
                                <th>NAMA PROGRAM</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtakun_komponen as $key => $value) : ?>
                                <tr>
                                    <td><?= $value->no_komponen ?></td>
                                    <td class="text text-center"><?= $value->kode_komponen ?> </td>
                                    <td><?= $value->nama_komponen ?> </td>
                                    <td><?= $value->nama_suboutput ?> </td>
                                    <td><?= $value->nama_output ?> </td>
                                    <td><?= $value->nama_kegiatan ?> </td>
                                    <td><?= $value->nama_program ?> </td>
                                    <td class="text text-center">
                                        <!-- EDIT -->
                                        <a href="<?= site_url('master/komponen/' . $value->id_komponen . '/edit') ?>" class="btn btn-warning"> <i class="fa-regular fa-pen-to-square"></i> </a>
                                        <!-- DELETE -->
                                        <form action="<?= site_url('master/komponen/index/' . $value->id_komponen) ?>" method="post" id="del-<?= $value->id_komponen ?>" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger btn-small" data-confrim="Hapus Data ... ? | Apakah Anda Yakin ... ?" data-confirm-yes="Hapus(<?= $value->id_komponen ?>)"><i class="fa-solid fa-trash"></i></button>
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

<?= $this->endSection() ?>;