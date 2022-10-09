<div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-graduation-cap"></i>  <?php echo $title ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                // Validasi data tidak boleh kosong
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i>','</div>')
                ?>
                <?php 
                echo form_open('pendidikan/edit/' . $pendidikan->id_pendidikan);
                 ?>
                  <div class="form-group">
                    <label class="">Pendidikan</label>
                    <input name="pendidikan" class="form-control" type="text" value="<?= $pendidikan->pendidikan?>" placeholder="Pendidikan">
                  </div>
                  <div class="form-group">
                    <label class="">Jurusan</label>
                    <input name="jurusan" class="form-control" type="text" value="<?= $pendidikan->jurusan?>" placeholder="Jurusan">
                  </div>
                  <div class="form-group">
                    <label class="">Tahun</label>
                    <input name="tahun" class="form-control" type="text" value="<?= $pendidikan->tahun?>" placeholder="Tahun">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('pendidikan')?>" class="btn btn-warning">Kembali</a>
                  </div>
                 <?php echo form_close(); ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>