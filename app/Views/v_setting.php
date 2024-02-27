<div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

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
               <?php echo form_open('Admin/UpdateSetting')?>

              <div class="form_group">
                <label for="">Nama Toko</label>
                <input name="nama_toko" class="form-control" value="<?=$setting['nama_toko'] ?>" >
              </div>

              <div class="form_group">
                <label for="">Slogan</label>
                <input name="slogan" class="form-control" value="<?=$setting['slogan'] ?>" >
              </div>

              <div class="form_group">
                <label for="">Almat</label>
                <input name="alamat" class="form-control" value="<?=$setting['alamat'] ?>" >
              </div>

              <div class="form_group">
                <label for="">No Telpon</label>
                <input name="no_telpon" class="form-control" value="<?=$setting['no_telpon'] ?>" >
              </div>

              <div class="form_group">
                <label for="">Deskripsi</label>
               <textarea rows="3" name="deskripsi" class="form-control"><?=$setting['deskripsi'] ?></textarea>
              </div>

              <div class="form_group">
                <button class="btn btn-flat btn-warning">Simpan</button>
              </div>

               <?php echo form_close()?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>