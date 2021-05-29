    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if ($this->session->flashdata('message')) {
                        echo $this->session->flashdata('message');
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>DATA BARANG</b></h4>
                        <!-- Full width modal -->
                        <div style="text-align: right; margin-bottom: 10px;">
                            <a href="<?= base_url(); ?>Barang/add" class="on-default edit-row btn btn-success" class="col-sm-6 col-md-4 col-lg-3">
                                <i class="ti-plus"></i>
                            </a>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Satuan</th>
                                    <th>Qty</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($data as $val) :  ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $val['nama_produk']; ?></td>
                                        <td><?= $val['satuan']; ?></td>
                                        <td><?= $val['quantity']; ?></td>
                                        <td>

                                            <a href='<?= base_url('Barang/update/' . $val["id_produk"]); ?>' class='on-default edit-row btn btn-primary' id='btn-updateProduk' data-id="<?= $val['id_produk']; ?>" class='col-sm-6 col-md-4 col-lg-3'>
                                                <i class='ti-pencil'></i></a>

                                            <a data-href="<?= base_url('Barang/delete/' . $val['id_produk']) ?>" class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal'>
                                                <i class='ti-trash'></i></a>

                                            <button data-id="<?= $val['id_produk']; ?>" class='on-default default-row btn btn-info btnBarangMasuk'>
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
                        <h4 class="m-t-0 header-title"><b>DATA BARANG MASUK</b></h4>
                        <div style="text-align: right; margin-bottom: 10px;">
                            <button class="on-default edit-row btn btn-success" id="btnAddBarangMasuk" class="col-sm-6 col-md-4 col-lg-3" data-toggle='modal' data-target='#modal-formBarangMasuk'>
                                <i class="ti-plus"></i>
                            </button>
                        </div>
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Masuk</th>
                                    <th>harga (Rp. )</th>
                                    <th>Jumlah</th>
                                    <th>Total (Rp. )</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="data-barangMasuk">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data ini ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-success waves-effect waves-light btn-ok">Ya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-formBarangMasuk">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- header-->
                <div class="modal-header">
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">DATA BARANG MASUK</h4>
                </div>
                <!--body-->
                <div class="modal-body">
                    <form action="<?= base_url(); ?>Barang_masuk/add" method="POST" id="formBarangMasuk">
                        <div class="form-group">
                            <label for="id_produk">Id Barang</label>
                            <input type="text" class="form-control" id="id_produk" name="id_produk" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_masuk">Jumlah</label>
                            <input type="text" class="vertical-spin from-control" id="jumlah-masuk" name="jumlah_masuk" required>

                        </div>
                        <div class="form-group">
                            <label for="harga-masuk">Harga (Rp.)</label>
                            <input type="text" class="form-control harga-masuk" id="harga-masuk" name="harga_masuk" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" required>

                        </div>
                        <div class="form-group">
                            <label for="total">total</label>
                            <input type="text" class="form-control total" id="total-masuk" name="total_harga" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" value="" readonly>
                        </div>

                </div>
                <!--footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

    </script>