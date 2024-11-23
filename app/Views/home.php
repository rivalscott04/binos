<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>Beranda</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h5>Selamat Datang di "Sistem Informasi Penyerapan Anggaran Kejaksaan Negeri Mataram"</h5>
            </div>
            <div class="container">
        <div class="card">
            <!-- Ganti "path-to-image.jpg" dengan URL atau path ke gambar Anda -->
            <img src="<?= base_url('img/dashboard.png') ?>" alt="Sistem Informasi Penyerapan Anggaran">
        </div>
    </div>
        </div>

    </div>

</section>

<?= $this->endSection() ?>;