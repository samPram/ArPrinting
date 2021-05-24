    <!-- Start content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card-box table-responsive">
              <h4 class="m-t-0 header-title"><b>DATA BARANG</b></h4>
              <!-- Full width modal -->
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
                    <th>harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
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