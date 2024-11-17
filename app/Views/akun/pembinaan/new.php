<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>AKUN PEMBINAAN</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Master Akun Pembinaan</h4>
                <a href="<?= site_url('akun/pembinaan/index') ?>" class="btn btn-primary ml-auto">Back</a>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('akun/pembinaan/index') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="program">Pilih Program</label>
                        <select class="form-control" name="program" id="program">
                            <option>Pilih Program</option>
                            <option>WA | Program Dukungan Manajemen</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Kegiatan</label>
                        <select class="form-control" name="kegiatan" id="kegiatan">
                            <option>Pilih Kegiatan</option>
                            <option>WA.1090 | Dukungan Manajemen Jaksa Agung Muda, Kejaksaan Tinggi, Kejaksaan Negeri, Cabang Kejaksaan Negeri</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Output</label>
                        <select class="form-control" name="output" id="output">
                            <option>Pilih Output</option>
                            <option>CCL | OM Sarana Bidang Teknologi Informasi dan Komunikasi</option>
                            <option>EBA | Layanan Dukungan Manajemen Internal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Sub Output</label>
                        <select class="form-control" name="suboutput" id="suboutput">
                            <option>Pilih Sub Output</option>
                            <option>CCL.051| Penambahan Layanan Internet, Instalasi, Jaringan dan Langganan Vsat</option>
                            <option>EBA.962| Layanan Umum</option>
                            <option>EBA.994| Layanan perkantoran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Komponen</label>
                        <select class="form-control" name="komponen" id="komponen">
                            <option>Pilih Komponen</option>
                            <option>051 | Pelaksanaan</option>
                            <option>053 | Layanan Dukungan Manajemen Satker</option>
                            <option>001 | Gaji dan Tunjangan</option>
                            <option>002 | Operasional dan Pemeliharaan Kantor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="program">Pilih Sub Komponen</label>
                        <select class="form-control" name="subkomponen" id="subkomponen">
                            <option>Pilih Sub Komponen</option>
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
                        <select class="form-control" name="akun" id="akun">
                            <option>Pilih Akun</option>
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
                        <input type="text" class="form-control" name="kode_item" placeholder="Masukan Kode Item" required>
                    </div>
                    <div class="form-group">
                        <label>NAMA ITEM</label>
                        <input type="text" class="form-control" name="nama_item" placeholder="Masukan Nama Item" required>
                    </div>
                    <div class="form-group">
                        <label>SALDO AWAL</label>
                        <input type="text" class="form-control" name="saldo" placeholder="Masukan Saldo Awal" required>
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