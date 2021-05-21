    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Form Transaksi</b></h4>
                        <form action="" method="POST">
                            <table class="table">
                                <thead>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th>
                                </thead>
                                <tbody class="list-card">

                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="total">Total Bayar (Rp.)</label>
                                <input type="text" class="form-control" id="total" name="total" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bayar">Bayar (Rp.)</label>
                                <input type="text" class="form-control" id="bayar" name="bayar" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" required>
                            </div>
                            <div class="form-group">
                                <label for="kembalian">Kembalian (Rp.)</label>
                                <input type="text" class="form-control" id="kembalian" name="kembalian" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" disabled>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>List Barang</b></h4>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="barangSearch" placeholder="Email">
                            </div>
                        </form>

                        <div class="row">
                            <?php foreach ($data as $val) : ?>
                                <div class="col-sm-4">
                                    <div class="panel panel-info text-center">
                                        <!-- <div class="panel-heading">Panel Heading</div> -->
                                        <div class="panel-body">
                                            <?= $val['nama_produk']; ?> <span class="badge"><?= $val['quantity']; ?></span>
                                            <p><b>Rp. <?= number_format($val['harga'], 2, ',', '.'); ?></b></p>
                                        </div>
                                        <div class="panel-footer"><a href="<?= base_url(); ?>Transaski/<?= $val['id_produk']; ?>" class="btn btn-primary btnAddCard" data-id='<?= $val['id_produk']; ?>' <?php if ($val['quantity'] == 0) : echo 'disabled';
                                                                                                                                                                                                            endif; ?>>Tambah</a></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?= $this->pagination->create_links(); ?>




                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>


    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">Data Transaksi</h4>
                </div>

                <form action="<?php echo base_url('admin/TransaksiController/add'); ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="id_transaksi" name="id_transaksi">
                            <label class="col-md-3 control-label">Nama Pelanggan</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="pelanggan" name="pelanggan" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Tanggal </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="mm/dd/yy" id="tanggal" name="tanggal" required>
                                <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="hidden">
                        <div class="form-group">
                            <label class="col-md-3 control-label">User</label>
                            <div class="col-md-9">
                                <select type="text" class="form-control" id="id_user" name="id_user" data-style="btn-white">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
                </div>
                <form action="<?php echo base_url() . 'admin/TransaksiController/delete'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="id_transaksi1" name="id_transaksi1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
                    </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




    <script type="text/javascript">
        function SetInput(id_transaksi, pelanggan, tanggal) {
            document.getElementById('id_transaksi').value = id_transaksi;
            document.getElementById('pelanggan').value = pelanggan;
            document.getElementById('tanggal').value = tanggal;

        }

        function SetInput1(id_transaksi) {
            document.getElementById('id_transaksi1').value = id_transaksi;
        }

        function ResetInput(id_transaksi, pelanggan, tanggal) {
            document.getElementById('id_transaksi').value = "";
            document.getElementById('pelanggan').value = "";
            document.getElementById('tanggal').value = "";

        }
    </script>