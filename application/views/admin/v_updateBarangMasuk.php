<div class="content">
  <div class="container">
    <div class="card-box table-responsive">
      <div class="row m-b-30">
        <div class="col-sm-12">
          <h4 class="m-t-0 header-title"><b>DATA BARANG</b></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <form action="<?= base_url(); ?>Barang_masuk/update" method="POST" id="formBarangMasuk">
            <div class="form-group">
              <label for="id_masuk">Id Barang Masuk</label>
              <input type="number" class="form-control" id="id_masuk" name="id_masuk" value="<?= $data['id_masuk']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="id_produk">Id Barang</label>
              <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $data['id_produk']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_produk']; ?>" disabled>
            </div>
            <div class="form-group">
              <label for="jumlah_masuk">Jumlah</label>
              <input type="hidden" name="current_jumlah_masuk" value="<?= $data['jumlah_masuk']; ?>" required>
              <input type="number" class="form-control" id="jumlah-masuk" name="jumlah_masuk" min="1" value="<?= $data['jumlah_masuk']; ?>" required>
            </div>
            <div class="form-group">
              <label for="harga-masuk">Harga</label>
              <input type="text" class="form-control harga-masuk" id="harga-masuk" name="harga_masuk" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" value="<?= $data['harga_masuk']; ?>" required>

            </div>
            <div class="form-group">
              <label for="total">total</label>
              <input type="text" class="form-control total" id="total-masuk" name="total_harga" data-affixes-stay="true" data-thousands="." data-decimal="," data-precision="0" value="<?= $data['total_harga_masuk']; ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>