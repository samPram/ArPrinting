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
          <?php echo form_open_multipart('Barang/update/' . $data['id_produk'], ['method' => 'post']); ?>
          <div class="form-group">
            <label for="id_produk">Id Barang</label>
            <input type="text" class="form-control" id="id_produk" name="id_produk" value="<?= $data['id_produk']; ?>" disabled>
          </div>
          <div class="form-group">
            <label for="namaProduk">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_produk']; ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
          <div class="form-group">
            <label for="satuan">Satuan</label>
            <select class="form-control" id="satuan" name="satuan" data-style="btn-white">
              <option value="Lembar" <?php if ($data['satuan'] == 'Lembar') : echo 'selected';
                                      endif; ?>>Lembar</option>
              <option value="Buah" <?php if ($data['satuan'] == 'Buah') : echo 'selected';
                                    endif; ?>>Buah</option>
            </select>
          </div>

          <div class="form-group">
            <label for="image">Image</label>
            <div class="">
              <img src="<?= base_url() . 'uploads/' . $data['image']; ?>" alt="image" class="img-responsive img-rounded" width="200">
              <p class="m-t-15 m-b-0">
                <small><?= $data['image']; ?></small>
              </p>
            </div>
            <input type="file" class="form-control" id="image" name="image">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>