<?= $this->extend('layout/backend') ?>;

<?= $this->section('content') ?>;

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <h4 class="text text-center mt-3 mb-5">-- Penyerapan Anggaran Kejaksaan Negeri Mataram --</h4>
            <div class="container">
                <!-- PEMBINAAN -->
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bidang Pembinaan</h4>
                            <a href="<?= site_url('SPP/pembinaan/pembinaan1') ?>" class="btn btn-success">Detail</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">PAGU DALAM DIPA</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 54.000.000</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP S.D BULAN LALU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 34.323.845</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 5.516.700</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="10%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">JUMLAH SPP S.D BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 39.840.545</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SISA PAGU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 14.159.455</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- INTELIJEN -->
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bidang Intelijen</h4>
                            <a href="#" class="btn btn-success">Detail</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">PAGU DALAM DIPA</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 54.000.000</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP S.D BULAN LALU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 34.323.845</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 5.516.700</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="10%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">JUMLAH SPP S.D BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 39.840.545</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SISA PAGU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 14.159.455</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- PIDANA UMUM -->
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bidang Pidana Umum</h4>
                            <a href="#" class="btn btn-success">Detail</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">PAGU DALAM DIPA</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 54.000.000</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP S.D BULAN LALU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 34.323.845</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 5.516.700</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="10%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">JUMLAH SPP S.D BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 39.840.545</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SISA PAGU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 14.159.455</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- PIDANA KHUSUS -->
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bidang Pidana Khusus</h4>
                            <a href="#" class="btn btn-success">Detail</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">PAGU DALAM DIPA</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 54.000.000</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP S.D BULAN LALU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 34.323.845</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 5.516.700</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="10%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">JUMLAH SPP S.D BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 39.840.545</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SISA PAGU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 14.159.455</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- DATUN -->
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bidang Perdata dan Tata Usaha Negara</h4>
                            <a href="#" class="btn btn-success">Detail</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">PAGU DALAM DIPA</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 54.000.000</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP S.D BULAN LALU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 34.323.845</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 5.516.700</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="10%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">JUMLAH SPP S.D BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 39.840.545</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SISA PAGU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 14.159.455</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- PAPBB -->
                <div class="column">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bidang PAPBB</h4>
                            <a href="#" class="btn btn-success">Detail</a>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">PAGU DALAM DIPA</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 54.000.000</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP S.D BULAN LALU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 34.323.845</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="60%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SPP BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 5.516.700</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="10%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">JUMLAH SPP S.D BULAN INI</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 39.840.545</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="70%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="font-weight-bold mb-1">SISA PAGU</div>
                                <div class="text-small float-right font-weight-bold text-muted">Rp. 14.159.455</div><br>
                                <div class="progress" data-height="5" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" data-width="30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<?= $this->endSection() ?>;