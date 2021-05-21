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
              <h4 class="m-t-0 header-title"><b>DATA USER</b></h4>
              <!-- Full width modal -->
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($data as $val) :  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $val['username']; ?></td>
                      <td><?= $val['level']; ?></td>
                      <td><?= $val['status_user']; ?></td>
                      <td>

                        <a href='<?= base_url('User/update/' . $val["id_user"]); ?>' class='on-default edit-row btn btn-primary' id='btn-updateUser' data-id="<?= $val['id_user']; ?>" class='col-sm-6 col-md-4 col-lg-3'>
                          <i class='ti-pencil'></i></a>

                        <a data-href="<?= base_url('User/delete/' . $val['id_user']) ?>" class='on-default default-row btn btn-danger' data-toggle='modal' data-target='#delete-modal'>
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