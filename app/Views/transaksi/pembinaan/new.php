<?= $this->extend('layout/backend') ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>TRANSAKSI</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Transaksi</h4>
                <a href="<?= site_url('transaksi/pembinaan/index') ?>" class="btn btn-primary ml-auto">Back</a>
            </div>
            <div class="card-body p-4">
                <form method="post" action="<?= site_url('transaksi/pembinaan/create') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label>PERIHAL</label>
                        <input type="text" class="form-control" name="perihal" placeholder="Permohonan Biaya Operasional Bidang Pembinaan Bulan .... Tahun ...." required>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" id="tableLoop">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Uraian Kegiatan</th>
                                    <th>Rincian</th>
                                    <th>Volume</th>
                                    <th>Harga Satuan</th>
                                    <th>Jumlah</th>
                                    <th>
                                        <button class="btn btn-primary btn-sm btn-block" id="Barisbaru"><i class="fa fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Baris dinamis akan diisi oleh jQuery -->
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-trash-arrow-up"></i> Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let no = 1;

        // Tambahkan baris baru
        $('#Barisbaru').click(function (e) {
            e.preventDefault();
            let newRow = `
            <tr>
                <td>${no++}</td>
                <td><input type="text" class="form-control" name="data[kegiatan][]" required></td>
                <td><input type="text" class="form-control" name="data[uraian_kegiatan][]" required></td>
                <td><input type="text" class="form-control" name="data[rincian][]" required></td>
                <td><input type="number" class="form-control" name="data[volume][]" min="0" required></td>
                <td><input type="number" class="form-control" name="data[harga_satuan][]" min="0" required></td>
                <td><input type="number" class="form-control" name="data[jumlah][]" readonly></td>
                <td><button class="btn btn-danger btn-sm btn-block remove"><i class="fa fa-trash"></i></button></td>
            </tr>`;
            $('#tableLoop tbody').append(newRow);
        });

        // Hapus baris
        $('#tableLoop').on('click', '.remove', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            // Reset nomor pada kolom pertama
            resetRowNumbers();
        });

        // Hitung jumlah otomatis
        $('#tableLoop').on('input', '[name="data[volume][]"], [name="data[harga_satuan][]"]', function () {
            let row = $(this).closest('tr');
            let volume = parseFloat(row.find('[name="data[volume][]"]').val()) || 0;
            let hargaSatuan = parseFloat(row.find('[name="data[harga_satuan][]"]').val()) || 0;
            row.find('[name="data[jumlah][]"]').val(volume * hargaSatuan);
        });

        // Reset nomor urut tabel
        function resetRowNumbers() {
            let rows = $('#tableLoop tbody tr');
            no = 1;
            rows.each(function () {
                $(this).find('td:first').text(no++);
            });
        }
    });
</script>

<?= $this->endSection() ?>
