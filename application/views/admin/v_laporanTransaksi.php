    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA TRANSAKSI</b></h4>
                        <form id="form-dateRange" class="form-horizontal" method="POST">
                            <div class="form-group">
                                <label class="control-label col-sm-6">Date Range</label>
                                <div class="col-sm-4">
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" data-date-format='yy-mm-dd' id="start" class="form-control" name="start" />
                                        <span class="input-group-addon bg-custom b-0 text-white">to</span>
                                        <input type="text" data-date-format='yy-mm-dd' id="end" class="form-control" name="end" />
                                    </div>
                                </div>
                                <button type="button" id="btnSubmitDateRange" class="btn btn-default col-sm-2">Submit</button>
                            </div>

                        </form>
                        <!-- Full width modal -->
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>User Kasir</th>
                                    <th>Jumlah Barang</th>
                                    <th>Bayar</th>
                                    <th>Total Bayar</th>
                                    <th>Kembalian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-view">
                                <?php $i = 1; ?>
                                <?php foreach ($data as $val) :  ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $val['id_transaksi']; ?></td>
                                        <td><?= $val['tanggal']; ?></td>
                                        <td><?= $val['username']; ?></td>
                                        <td><?= $val['jumlah_item']; ?></td>
                                        <td>Rp. <?= number_format($val['bayar'], 0, '', '.'); ?></td>
                                        <td>Rp. <?= number_format($val['total'], 0, '', '.'); ?></td>
                                        <td>Rp. <?= number_format($val['kembali'], 0, '', '.'); ?></td>
                                        <td>

                                            <button data-id="<?= $val['id_transaksi']; ?>" class='on-default default-row btn btn-info btnViewBarangKeluar'>
                                                <i class='ti-eye'></i></button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA LIST BARANG TRANSAKSI</b></h4>

                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang Keluar</th>
                                    <th>Harga Barang Keluar</th>
                                    <th>Total Harga Keluar</th>
                                </tr>
                            </thead>
                            <tbody class="data-viewBarangKeluar">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>