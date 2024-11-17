<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1> PENCARIAN PEMBINAAN</h1>
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
                <h4 style="text-align: center;">PENCAIRAN ANGGARAN BIDANG PEMBINAAN</h4>

                <div class="text-left">
                    <nav class="d-inline-block ">
                        <a href="<?= site_url('pencairan/pembinaan/new') ?>" class="btn btn-success">Add New</a>
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
                                    <td class="text text-center"><?= $value->no_kwitansi ?> </td>
                                    <td><?= $value->tanggal ?> </td>
                                    <td><?= $value->perihal ?> </td>
                                    <td class="text text-center">
                                        <!-- DETAIL -->
                                        <a href="<?= site_url('pencairan/pembinaan/detail' . $value->id_pencairan_pembinaan . '/edit') ?>" class="btn btn-warning"><i class="fa-solid fa-eye"></i> </a>
                                        <!-- EDIT -->
                                        <a href="<?= site_url('pencairan/pembinaan/edit' . $value->id_pencairan_pembinaan . '/edit') ?>" class="btn btn-warning"> <i class="fa-regular fa-pen-to-square"></i> </a>
                                        <!-- DELETE -->
                                        <form action="<?= site_url('pencairan/pembinaan/index/' . $value->id_pencairan_pembinaan) ?>" method="post" id="del-<?= $value->id_pencairan_pembinaan ?>" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger btn-small" data-confrim="Hapus Data ... ? | Apakah Anda Yakin ... ?" data-confirm-yes="Hapus(<?= $value->id_pencairan_pembinaan ?>)"><i class="fa-solid fa-trash"></i></button>
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