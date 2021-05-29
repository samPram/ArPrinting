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
              <h4 class="m-t-0 header-title"><b>DATA TRANSAKSI</b></h4>
              <!-- Full width modal -->
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Tanggal</th>
                    <th>User Kasir</th>
                    <th>Jumlah Barang</th>
                    <th>Bayar (Rp. )</th>
                    <th>Total Bayar (Rp. )</th>
                    <th>Kembalian (Rp. )</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="data-transaksi">
                  <?php $i = 1; ?>
                  <?php foreach ($data as $val) :  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $val['id_transaksi']; ?></td>
                      <td><?= $val['tanggal']; ?></td>
                      <td><?= $val['username']; ?></td>
                      <td><?= $val['jumlah_item']; ?></td>
                      <td><?= number_format($val['bayar'], 0, '', '.');
                          ?></td>
                      <td><?= number_format($val['total'], 0, '', '.');
                          ?></td>
                      <td><?= number_format($val['kembali'], 0, '', '.');
                          ?></td>
                      <td>

                        <button data-id="<?= $val['id_transaksi']; ?>" class='on-default default-row btn btn-info btnDetailTransaksiReturn'>
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
                    <th>Harga Barang Keluar (Rp. )</th>
                    <th>Total Harga Keluar (Rp. )</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="data-viewDetailTransaksi">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-return-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- header-->
          <div class="modal-header">
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">DATA RETURN</h4>
          </div>
          <!--body-->
          <div class="modal-body">
            <form action="<?= base_url(); ?>Return_barang/add" method="POST" id="formReturnBarang">
              <div class="form-group">

                <input type="hidden" class="form-control" id="id-keluar-return" name="id_keluar" readonly>
              </div>
              <div class="form-group">
                <label for="id_produk">Id Transaksi</label>
                <input type="text" class="form-control" id="id-transaksi-return" name="id_transaksi" readonly>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama-return" name="nama_return" value="" disabled>
              </div>
              <div class="form-group">
                <label for="jumlah_keluar">Jumlah Terbeli</label>
                <input type="text" class="form-control" id="jumlah-keluar-return" name="jumlah_keluar" readonly>

              </div>
              <div class="form-group">
                <label for="jumlah_return">Jumlah Return</label>
                <input type="text" class="vertical-spin" id="jumlah-return" name="jumlah_return" required>

              </div>
              <div class="form-group">
                <label for="harga_return">Harga</label>
                <input type="text" class="form-control harga-masuk" id="harga-return" name="harga_return" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" readonly>

              </div>
              <div class="form-group">
                <label for="total-return">total</label>
                <input type="text" class="form-control total" id="total-return" name="total_return" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" value="" readonly>
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