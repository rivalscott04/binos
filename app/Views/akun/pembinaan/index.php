<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN PEMBINAAN</h1>
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
                <h4 style="text-align: center;">MASTER AKUN PEMBINAAN</h4>

                <div class="text-left">
                    <nav class="d-inline-block ">
                        <a href="<?= site_url('akun/pembinaan/new') ?>" class="btn btn-success">Add New</a>
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
                                <th>PROGRAM</th>
                                <th>KEGIATAN</th>
                                <th>OUTPUT</th>
                                <th>SUB OUTPUT</th>
                                <th>KOMPONEN</th>
                                <th>SUB KOMPONEN</th>
                                <th>AKUN</th>
                                <th>KODE ITEM</th>
                                <th>NAMA ITEM</th>
                                <th>SALDO AWAL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtakun_pembinaan as $key => $value) : ?>
                                <tr>
                                    <td class="text text-center"><?= $key + 1 ?></td>
                                    <td class="text text-center"><?= $value->program ?> </td>
                                    <td class="text text-center"><?= $value->kegiatan ?> </td>
                                    <td class="text text-center"><?= $value->output ?> </td>
                                    <td class="text text-center"><?= $value->suboutput ?> </td>
                                    <td class="text text-center"><?= $value->komponen ?> </td>
                                    <td class="text text-center"><?= $value->subkomponen ?> </td>
                                    <td class="text text-center"><?= $value->akun ?> </td>
                                    <td class="text text-center"><?= $value->kode_item ?> </td>
                                    <td class="text text-center"><?= $value->nama_item ?></td>
                                    <td class="text text-center">Rp. <?= number_format($value->saldo, 0, ',', '.') ?> ,- </td>
                                    <td class="text text-center">
                                        <!-- EDIT -->
                                        <a href="<?= site_url('akun/pembinaan/edit/' . $value->id_akunpembinaan) ?>" class="btn btn-warning"> <i class="fa-regular fa-pen-to-square"></i> </a>
                                        <!-- DELETE -->
                                        <form action="<?= site_url('akun/pembinaan/index/' . $value->id_akunpembinaan) ?>" method="post" id="del-<?= $value->id_akunpembinaan ?>" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger btn-small" data-confrim="Hapus Data ... ? | Apakah Anda Yakin ... ?" data-confirm-yes="Hapus(<?= $value->id_akunpembinaan ?>)"><i class="fa-solid fa-trash"></i></button>
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