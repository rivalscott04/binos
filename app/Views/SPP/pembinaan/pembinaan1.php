<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>Pembinaan</h1>
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
                <h4 style="text-align: center;">PAGU ANGGARAN BIDANG PEMBINAAN</h4>

                <div class="text-left">
                    <nav class="d-inline-block ">
                        <a href="<?= site_url('SPP/pembinaan/new') ?>" class="btn btn-success">Add New</a>
                        <a href="" class="btn btn-primary">Print</a>
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
                            <tr>
                                <th>KODE</th>
                                <th>URAIAN KEGIATAN</th>
                                <th>PAGU DALAM DIPA</th>
                                <th>SPP S.D BULAN INI</th>
                                <th>SPP BULAN INI</th>
                                <th>JUMLAH SPP S.D BULAN INI</th>
                                <th>SISA PAGU</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtpembinaan1 as $key => $value) : ?>
                                <tr>
                                    <td><?= $value->kode ?> </td>
                                    <td><?= $value->uraian_kegiatan ?></td>
                                    <td><?= $value->pagu_dalam_dipa ?></td>
                                    <td><?= $value->spp_sd_bulan_lalu ?></td>
                                    <td><?= $value->spp_bulan_ini ?></td>
                                    <td><?= $value->jumlah_spp_sd_bulan_ini ?></td>
                                    <td><?= $value->sisa_pagu ?></td>
                                    <td>
                                        <!-- EDIT -->
                                        <a href="<?= site_url('SPP/pembinaan/edit/' . $value->id_pembinaan1) ?>" class="btn btn-warning"> <i class="fa-regular fa-pen-to-square"></i> </a>
                                        <!-- DELETE -->
                                        <form action="<?= site_url('SPP/pembinaan/pembinaan1/' . $value->id_pembinaan1) ?>" method="post" id="del-<?= $value->id_pembinaan1 ?>" class="d-inline">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <?= csrf_field(); ?>
                                            <button class="btn btn-danger btn-small" data-confrim="Hapus Data ... ? | Apakah Anda Yakin ... ?" data-confirm-yes="Hapus(<?= $value->id_pembinaan1 ?>)"><i class="fa-solid fa-trash"></i></button>
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