<div class="row">
      <div class="col-sm-3">
            <div class="card card-primary">
                  <div class="card-header">
                  <h3 class="card-title">
                        <i class="nav-icon fa fa-image"> </i>
                        Foto Profil
                        </h3>
                  </div>
                  <div class="card-body">
                        <?php echo form_open_multipart('admin/setting'); ?>
                        <div class="form-group">
                        <img src="<?= base_url('assets/img/' . $biodata->gambar)?>" id="gambar_load" alt="" width="200px" height="235px">
                        </div>
                  <div class="form-group">
                        <label for="">Ganti Foto</label>
                        <input type="file" class="form-control" placeholder="Ganti Foto" name="foto" id="priview_gambar">
                  </div>
                  </div>
            </div>
      </div>
      <div class="col-sm-9">
            <div class="card card-primary">
                  <div class="card-header">
                        <h3 class="card-title">
                              <i class="nav-icon fas fa-table"></i>
                              Biodata
                        </h3>
                  </div>
                  <div class="card-body">
                  <?php 
                  // Validasi Data tidak boleh Kosong
                      echo validation_errors('<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <i class="icon fas fa-ban"></i>', '</div>');

                      if($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="icon fas fa-checked"></i>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                        
                    }
                  ?>
                        <div class="row">
                              <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">Nama Lengkap</label>
                                          <input name="nama_lengkap" value="<?= $biodata->nama_lengkap ?>" class="form-control">
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">Nama Panggilan</label>
                                          <input name="nama_panggilan" value="<?= $biodata->nama_panggilan ?>" class="form-control">
                                    </div>
                              </div>
                              <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">Tempat Lahir</label>
                                          <input name="tempat_lahir" value="<?= $biodata->tempat_lahir ?>" class="form-control">
                                    </div>
                              </div>
                              <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">Tanggal Lahir</label>
                                          <input name="tgl_lahir" value="<?= $biodata->tgl_lahir ?>" class="form-control">
                                    </div>
                              </div>
                              <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">Email</label>
                                          <input name="email" value="<?= $biodata->email ?>" class="form-control">
                                    </div>
                              </div>
                              <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">No Hp</label>
                                          <input name="no_hp" value="<?= $biodata->no_hp ?>" class="form-control">
                                    </div>
                              </div>
                              <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">Password</label>
                                          <input name="password" value="<?= $biodata->password ?>" class="form-control">
                                    </div>
                              </div>
                              <div class="col-sm-6">
                                    <div class="group">
                                          <label for="">Alamat</label>
                                          <input name="alamat" value="<?= $biodata->alamat ?>" class="form-control">
                                    </div>
                              </div>
                        </div>
                        <button class="btn btn-primary mt-3 fas fa-save"> Simpan</button>
                  </div>
                  <?php echo form_close(); ?>
            </div>
      </div>
</div>
