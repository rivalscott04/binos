<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1> PEMBINAAN</h1>
    </div>

    <div class="section-body">
        <!-- INI UNTUK MENANGKAP SESSION SUCCESS DENGAN BAWAAN WITH DI  -->
        <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="">x</button>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
        <?php endif; ?>
        <!-- INI UNTUK MENANGKAP SESSION ERROR DENGAN BAWAAN WITH DI  -->
        <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismis="">x</button>
                <?= session()->getFlashdata('error') ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <h4 style="text-align: center;">REALISASI ANGGARAN</h4>

                <!-- <div class="text-left">
                    <nav class="d-inline-block ">
                        <a href="<?= site_url('transaksi/pembinaan/new') ?>" class="btn btn-success">Add New</a>
                    </nav>
                </div> -->
                <!-- INI UNTUK MENANGKAP SESSION SUCCESS DENGAN BAWAAN WITH DI
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismis="">close</button>
                            <?= session()->getFlashdata('success') ?>
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
                                <th>Kegiatan</th>
                                <th>Pagu</th>
                                <th>Realisasi</th>
                                <th>Sisa Pagu</th>
                                <th>Persentase (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dtrealisasi_anggaran as $key => $value) : ?>
                            <tr>
                                <td><?= '-' ?></td>
                                <td class="text text-center"><?= $value->nama_sub_output ?> </td>
                                <td><?= $value->jumlah_pagu ?></td>
                                <td><?= $value->jumlah_terpakai ?> </td>
                                <td><?= $value->jumlah_pagu - $value->jumlah_terpakai ?></td>
                                <td>
                                    <?php
                                    $persentase = 0;
                                    if ($value->jumlah_pagu > 0) {
                                        $persentase = ($value->jumlah_terpakai / $value->jumlah_pagu) * 100;
                                    }
                                    echo number_format($persentase, 2, ',', '.') . '%'; 
                                    ?>
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
