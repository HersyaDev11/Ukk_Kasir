<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i class="fas fa-plus"></i> Add Data
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                if (session()->getFlashdata('pesan')){
                  echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                  echo session()->getFlashdata('pesan');
                  echo '</h5></div>';
                }
                ?>
                <table class="table table-bondered">
                    <thead>
                    <tr class= "text-center">
                        <th width="50px">No</th>
                        <th>Nama User</th>
                        <th>E-mail</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th width="100px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $no =1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $value['nama_user'] ?></td>
                          <td><?= $value['email'] ?></td>
                          <td class= "text-center"><?= $value['password'] ?></td>
                          <td class= "text-center"><?php 
                                if($value['level'] == 1){ ?>
                                <span class="badge bg-success">Admin</span>
                                <?php } else { ?>
                                <span class="badge bg-primary">Kasir</span>
                                <?php } ?>
                            </td>
                          <td class= "text-center">
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_user'] ?>"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_user'] ?>"><i class="fas fa-trash"></i></button>
                          </td>
                        </tr>
                    <?php } ?>
                    
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>



          <!-- Modall Add Data -->
          <div class="modal fade" id="add-data">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php  echo form_open('User/InsertData') ?>
            <div class="modal-body">
              <div class="form_group">
                <label for="">Nama User</label>
                <input name="nama_user" class="form-control" placeholder="Nama User" required>
              </div>

              <div class="form_group">
                <label for="">E-mail</label>
                <input name="email" class="form-control" placeholder="E-mail" required>
              </div>

              <div class="form_group">
                <label for="">Password</label>
                <input name="password" class="form-control" placeholder="Password" required>
              </div>

              <div class="form_group">
                <label for="">Level</label>
                <select name="level" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2" selected>Kasir</option>

                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




      <?php foreach ($user as $key => $value) { ?>
        <div class="modal fade" id="edit-data<?= $value['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php  echo form_open('User/UpdateData/' . $value['id_user']) ?>
            <div class="modal-body">
            <div class="form_group">
                <label for="">Nama User</label>
                <input name="nama_user" class="form-control" value="<?= $value['nama_user'] ?>" placeholder="Nama User" required>
              </div>

              <div class="form_group">
                <label for="">E-mail</label>
                <input name="email" class="form-control" value="<?= $value['email'] ?>" placeholder="E-mail" required>
              </div>

              <div class="form_group">
                <label for="">Password</label>
                <input name="password" class="form-control" value="<?= $value['password'] ?>" placeholder="Password" readonly>
              </div>

              <div class="form_group">
                <label for="">Level</label>
                <select name="level" class="form-control">
                    <option value="1" <?= $value['level']== 1 ? 'Selected' : '' ?>>Admin</option>
                    <option value="2"  <?= $value['level']== 2 ? 'Selected' : '' ?>>Kasir</option>

                </select>
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning btn-flat">Save</button>
            </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <?php } ?>




       <!-- Modall delete Data -->
       <?php foreach ($user as $key => $value) { ?>
        <div class="modal fade" id="delete-data<?= $value['id_user'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
      </div>
            <div class="modal-body">
              Apakah Anda Yakin Hapus <b><?= $value['nama_user'] ?></b> ..?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <a href="<?= base_url('User/DeleteData/' . $value['id_user']) ?>" class="btn btn-danger btn-flat">Delete</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <?php } ?>