<div class="container-fluid">

                    <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <!-- !-- // Notifikasi --> 
    <?php if(validation_errors()) : ?>
      <div class="alert alert-danger" role="alert"> 
    <?php echo validation_errors(); ?>
      </div>
    <?php endif; ?>

      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#kategoriModal">
        <i class="fa fa-plus"></i> Add New Kategori 
    </button>

    <div class="row">
      <div class="col-lg-4">
        <?php echo $this->session->flashdata('message'); ?>
      </div>
    </div>
      <table class="table table-bordered table-triped col-lg-4">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kategori</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($kategori as $ktg): ?>
            <tr>
              <th scope="row"><?php echo $i; ?></th>
              <td><?php echo $ktg['nama_kategori']; ?></td>
              <td>
                <a href="<?php echo base_url('informasi/editkategori/' . $ktg['id']); ?>" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit</a>
                <a href="<?php echo base_url('informasi/hapuskategori/' . $ktg['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"> <i class="fa fa-trash"></i> Hapus</a>
              </td>
            </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>
</div>



<!-- Modal Tambah Kategori-->
<div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="kategoriModalLabel">Add new Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('informasi/tambahkategori'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-sm-3">Masukan Kategori</div>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori">
          </div>
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-arrow-alt-circle-left"></i> Back</button>
        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Tambah Kategori-->
