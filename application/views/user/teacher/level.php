<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <p>
        <a href="<?= base_url('teacher/leveltambah');?>" class="btn btn-primary mx-3"><i class="fas fa-fw fa-plus"></i> Add New Level</a>
    </p>
  </div>
  <div class="row">
    <div class="col-lg-5">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
   </div>
  <div class="row">
    <div class="col-lg-5">
      <table class="table table-border">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach($level as $data): ?>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data['level_name'];?></td>
            <td>
              <a href="<?= base_url('teacher/leveledit/' . $data['id_level']);?>" class="btn btn-success"> <i class="fa fa-edit"></i> Edit</a>
              <a href="<?= base_url('teacher/levelhapus/' . $data['id_level']);?>" class="btn btn-danger" onclick="return confirm('Yakin?');"> <i class="fa fa-trash"></i> Hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
  <!-- /.container-fluid -->

</div>
  <!-- End of Main Content -->
