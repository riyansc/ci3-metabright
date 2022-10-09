<div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-graduation-cap"></i> Data <?php echo $title ?> </h3>

                <div class="card-tools">
                  <a href="<?= base_url('pendidikan/add')?>" class="btn btn-primary btn-xs">
                    <i class="fas fa-plus"> Add</i>
                  </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                  if($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <i class="icon fas fa-checked"></i>';
                      echo $this->session->flashdata('pesan');
                      echo '</div>';
                      
                  }
                ?>
                <table class="table table-bordered">
                    <tr class="text-center">
                      <th>No</th>
                      <th>Pendidikan</th>
                      <th>Jurusan</th>
                      <th>Tahun</th>
                      <th>Action</th>
                    </tr>
                    <?php $no = 1; 
                    foreach ($pendidikan as $key => $value) { ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?= $value->pendidikan ?></td>
                      <td><?php echo $value->jurusan ?></td>
                      <td class="text-center"><?php echo $value->tahun ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('pendidikan/edit/' . $value->id_pendidikan)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="<?= base_url('pendidikan/delete/' . $value->id_pendidikan)?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>