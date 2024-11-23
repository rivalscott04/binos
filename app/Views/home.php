<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="hero-banner">
        <img src="<?= base_url('template/assets/img/home.png') ?>" alt="Selamat Datang di Sistem Informasi Penyerapan Anggaran">
        <!-- <div class="hero-text">
            <p>Sistem Informasi Penyerapan Anggaran Kejaksaan Negeri Mataram</p>
        </div> -->
    </div>
</section>

<style>
.hero-banner {
    position: relative;
    width: 100%;
    height: 100vh; /* Tinggi banner, sesuaikan kebutuhan */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.hero-banner img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Gambar penuh tanpa distorsi */
}

.hero-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    padding: 20px;
    border-radius: 8px;

    /* Tambahkan variabel opacity */
    --hero-text-bg-opacity: 0.8; /* Nilai default opacity */
    background-color: rgba(0, 0, 0, var(--hero-text-bg-opacity)); /* Background transparan */
}

.hero-text h1 {
    font-size: 2.5rem;
    margin: 0;
}

.hero-text p {
    font-size: 1.2rem;
    margin-top: 10px;
}

@media (max-width: 768px) {
    .hero-text h1 {
        font-size: 2rem;
    }

    .hero-text p {
        font-size: 1rem;
    }
}

</style>

<?= $this->endSection() ?>;
