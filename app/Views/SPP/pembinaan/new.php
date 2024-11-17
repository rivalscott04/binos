<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>Pembinaan</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Pembinaan</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('SPP/pembinaan1') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="kode" placeholder="Kode" required>
                    </div>
                    <div class="form-group">
                        <label>Uraian Kegiatan</label>
                        <input type="text" class="form-control" name="uraian_kegiatan" placeholder="Uraian Kegiatan" required>
                    </div>
                    <div class="form-group">
                        <label>Pagu Dalam DIPA</label>
                        <input type="text" class="form-control" name="pagu_dalam_dipa" placeholder="Pagu Dalam DIPA" required>
                    </div>
                    <div class="form-group">
                        <label>SPP s.d Bulan Lalu</label>
                        <input type="text" class="form-control" name="spp_sd_bulan_lalu" placeholder="SPP s.d Bulan Lalu" required>
                    </div>
                    <div class="form-group">
                        <label>SPP Bulan Ini</label>
                        <input type="text" class="form-control" name="spp_bulan_ini" placeholder="SPP Bulan Ini" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah SPP s.d Bulan Ini</label>
                        <input type="text" class="form-control" name="jumlah_spp_sd_bulan_ini" placeholder="Jumlah SPP s.d Bulan Ini" required>
                    </div>
                    <div class="form-group">
                        <label>Sisa Pagu</label>
                        <input type="text" class="form-control" name="sisa_pagu" placeholder="Sisa Pagu" required>
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