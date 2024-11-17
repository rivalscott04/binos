INI TEMPAT EDIT<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN PEMBINAAN</h1>
        <a href="<?= site_url('/akun/pembinaan/index') ?>" class="btn btn-primary ml-auto">Back</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Akun Pembinaan</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('akun/pembinaan/edit/' . $dtakun_pembinaan->id_akunpembinaan) ?>">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_methode" value="PUT">
                    <div class="form-group">
                        <label for="program">Pilih Program</label>
                        <select class="form-control" name="program" id="program" required>
                            <option>WA | Program Dukungan Manajemen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Kegiatan</label>
                        <select class="form-control" name="kegiatan" id="kegiatan" required>
                            <option>WA.1090 | Dukungan Manajemen Jaksa Agung Muda, Kejaksaan Tinggi, Kejaksaan Negeri, Cabang Kejaksaan Negeri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Output</label>
                        <select class="form-control" name="output" id="output" required>
                            <option>CCL | OM Sarana Bidang Teknologi Informasi dan Komunikasi</option>
                            <option>EBA | Layanan Dukungan Manajemen Internal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Sub Output</label>
                        <select class="form-control" name="suboutput" id="suboutput" required>
                            <option>CCL.051| Penambahan Layanan Internet, Instalasi, Jaringan dan Langganan Vsat</option>
                            <option>EBA.962| Layanan Umum</option>
                            <option>EBA.994| Layanan perkantoran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Komponen</label>
                        <select class="form-control" name="komponen" id="komponen" required>
                            <option>051 | Pelaksanaan</option>
                            <option>053 | Layanan Dukungan Manajemen Satker</option>
                            <option>001 | Gaji dan Tunjangan</option>
                            <option>002 | Operasional dan Pemeliharaan Kantor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Sub Komponen</label>
                        <select class="form-control" name="subkomponen" id="subkomponen" required>
                            <option>051.0A | Langganan Jaringan Internet</option>
                            <option>053.0A | Penggandaan, Cetak dan Jilid</option>
                            <option>053.0B | Pengembangan Sistem Informasi</option>
                            <option>053.0C | Pengelolaan e-Lakip, Penyusunan Renja dan Renstra</option>
                            <option>053.0D | Kegiatan Reformasi Birokrasi dan Pencanangan Zona Integritas</option>
                            <option>053.0E | Maturitas SPIP</option>
                            <option>001.0A | Pembayaran Gaji dan Tunjangant</option>
                            <option>002.0A | Kebutuhan Sehari-hari Perkantoran</option>
                            <option>002.0B | Langganan Daya dan Jasa</option>
                            <option>002.0C | Pemeliharaan Kantor</option>
                            <option>002.D | Pembayaran pelaksanaan operasional kantor</option>
                            <option>002.E | Kegiatan In House Training</option>
                            <option>002.F | Belanja Ekstrakomptabel</option>
                            <option>002.G | Biaya Konsumsi kegiatan Latsar CPNS Tahun 2024</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Akun</label>
                        <select class="form-control" name="akun" id="akun" required>
                            <option>522191 | Belanja Jasa Lainnya</option>
                            <option>521211 | Belanja Bahan</option>
                            <option>511119 | Belanja Pembulatan Gaji PNS</option>
                            <option>511121 | Belanja Tunj. Suami/Istri PNS</option>
                            <option>511122 | Belanja Tunj. Anak PNS</option>
                            <option>511123 | Belanja Tunj. Struktural PNS</option>
                            <option>511124 | Belanja Tunj. Fungsional PNS</option>
                            <option>511125 | Belanja Tunj. PPh PNS</option>
                            <option>511126 | Belanja Tunj. Beras PNS</option>
                            <option>511129 | Belanja Uang Makan PNS</option>
                            <option>511134 | Belanja Tunj. Kompensasi Kerja PNS</option>
                            <option>511147 | Belanja Tunj. Lain-lain termasuk uang duka PNS Dalam dan Luar Negeri</option>
                            <option>511211 | Belanja Uang Lembur</option>
                            <option>511411 | Belanja Pegawai (Tunjangan Khusus/Kegiatan/Kinerja)</option>
                    </div>
                    <div class="form-group">
                        <label>KODE ITEM</label>
                        <input type="text" class="form-control" name="kode_item" placeholder="Ubah Kode Item" required value="<?= $dtakun_pembinaan->kode_item ?>">
                    </div>
                    <div class="form-group">
                        <label>NAMA ITEM</label>
                        <input type="text" class="form-control" name="nama_item" placeholder="Nama Item" required value="<?= $dtakun_pembinaan->nama_item ?>">
                    </div>
                    <div class="form-group">
                        <label>SALDO</label>
                        <input type="text" class="form-control" name="saldo" placeholder="Saldo" required value="<?= number_format($dtakun_pembinaan->saldo, 0, ',', '.') ?>">
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