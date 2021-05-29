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
              <h4 class="m-t-0 header-title"><b>DATA RETUR</b></h4>
              <!-- Full width modal -->
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Return</th>
                    <th>Harga (Rp. )</th>
                    <th>Total (Rp. )</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($data as $val) :  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $val['id_transaksi']; ?></td>
                      <td><?= $val['nama_produk']; ?></td>
                      <td><?= $val['jumlah_barang']; ?></td>
                      <td><?= number_format($val['harga_barang'], 0, '', '.'); ?></td>
                      <td><?= number_format($val['total_barang'], 0, '', '.'); ?></td>
                      <td>

                        <button data-id="<?= $val['id_return']; ?>" class='on-default default-row btn btn-primary btnUpdateReturn' data-toggle='modal' data-target='#modal-return-update'>
                          <i class='ti-pencil'></i></button>

                        <a data-href="<?= base_url('Return_barang/delete/' . $val['id_keluar'] . '/' . $val['jumlah_barang'] . '/' . $val['id_return']) ?>" class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#modal-deleteReturn'>
                          <i class='ti-trash'></i></a>

                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="modal-deleteReturn" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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
    <div class="modal fade" id="modal-return-update">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- header-->
          <div class="modal-header">
            <button class="close" data-dismiss="modal"><span>&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">DATA RETURN</h4>
          </div>
          <!--body-->
          <div class="modal-body">
            <form action="<?= base_url(); ?>Return_barang/update" method="POST" id="formReturnBarang">
              <div class="form-group">
                <label for="id_return">Id Return</label>
                <input type="text" class="form-control" id="id-return" name="id_return" readonly>
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" id="id-keluar" name="id_keluar" readonly>
              </div>
              <div class="form-group">
                <label for="id_produk">Id Transaksi</label>
                <input type="text" class="form-control" id="id-transaksi-return" name="id_transaksi" disabled>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama-return" name="nama_return" value="" disabled>
              </div>
              <div class="form-group">
                <label for="jumlah_keluar">Jumlah Terjual</label>
                <input type="number" class="form-control" id="jumlah-keluar" name="jumlah_keluar" readonly>
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" id="jumlah-return-cur" name="jumlah_return_cur" readonly>
              </div>
              <div class="form-group">
                <label for="jumlah_return">Jumlah Return</label>
                <input type="number" class="form-control" id="jumlah-return" name="jumlah_return" required>
              </div>
              <div class="form-group">
                <label for="harga_return">Harga</label>
                <input type="text" class="form-control" id="harga-return" name="harga_return" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" readonly>

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