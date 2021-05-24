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
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($data as $val) :  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $val['tanggal']; ?></td>
                      <td><?= $val['jumlah']; ?> item</td>
                      <td>Rp. <?= number_format($val['total'], 2, ',', '.'); ?></td>
                      <td>

                        <button class='on-default edit-row btn btn-primary' id='btn-detailTransaksi' data-id="<?= $val['id_transaksi']; ?>" class='col-sm-6 col-md-4 col-lg-3'>
                          <i class='ti-eye'></i></button>

                        <!-- <a data-href="" class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal'>
                          <i class='ti-trash'></i></a> -->
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
              <h4 class="m-t-0 header-title"><b>DATA DETAIL TRANSAKSI</b></h4>
              <!-- Full width modal -->
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody class="data-detail">

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

    <script type="text/javascript">

    </script>