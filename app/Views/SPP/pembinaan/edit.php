<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>Pembinaan</h1>
        <a href="<?= site_url('/SPP/pembinaan/pembinaan1') ?>" class="btn btn-primary">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Pembinaan</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('SPP/pembinaan/edit/' . $dtpembinaan1->id_pembinaan1) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="kode" placeholder="Kode" required value="<?= $dtpembinaan1->kode ?>">
                    </div>
                    <div class="form-group">
                        <label>Uraian Kegiatan</label>
                        <input type="text" class="form-control" name="uraian_kegiatan" placeholder="Uraian Kegiatan" required value="<?= $dtpembinaan1->uraian_kegiatan ?>">
                    </div>
                    <div class="form-group">
                        <label>Pagu Dalam DIPA</label>
                        <input type="text" class="form-control" name="pagu_dalam_dipa" placeholder="Pagu Dalam DIPA" required value="<?= $dtpembinaan1->pagu_dalam_dipa ?>">
                    </div>
                    <div class="form-group">
                        <label>SPP s.d Bulan Lalu</label>
                        <input type="text" class="form-control" name="spp_sd_bulan_lalu" placeholder="SPP s.d Bulan Lalu" required value="<?= $dtpembinaan1->spp_sd_bulan_lalu ?>">
                    </div>
                    <div class="form-group">
                        <label>SPP Bulan Ini</label>
                        <input type="text" class="form-control" name="spp_bulan_ini" placeholder="SPP Bulan Ini" required value="<?= $dtpembinaan1->spp_bulan_ini ?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah SPP s.d Bulan Ini</label>
                        <input type="text" class="form-control" name="jumlah_spp_sd_bulan_ini" placeholder="Jumlah SPP s.d Bulan Ini" required value="<?= $dtpembinaan1->jumlah_spp_sd_bulan_ini ?>">
                    </div>
                    <div class="form-group">
                        <label>Sisa Pagu</label>
                        <input type="text" class="form-control" name="sisa_pagu" placeholder="Sisa Pagu" required value="<?= $dtpembinaan1->sisa_pagu ?>">
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