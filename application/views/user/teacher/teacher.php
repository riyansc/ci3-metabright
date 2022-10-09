<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <p>
        <a href="<?= base_url('teacher/teachertambah'); ?>" class="btn btn-primary mx-3"><i class="fas fa-fw fa-plus"></i> Add New Teacher</a>
    </p>
    <p>
        <a href="<?= base_url('teacher/level');?>" class="btn btn-warning"><i class="fas fa-fw fa-plus"></i> Level</a>
    </p>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
   </div>
  <div class="col-lg-10">
  <table class="table table-border">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Nama Pengajar</th>
        <th>Level</th>
        <th>Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      <?php foreach($pengajar as $data): ?>
      <tr>
        <td><?= $i; ?></td>
        <td><?= $data['pengajar'];?></td>
        <td>
          <?php if($data['level'] == 1 ): ?>
          <span class="badge badge-primary"><?= $data['level_name'];?></span>
          <?php elseif($data['level'] == 2 ) : ?>
            <span class="badge badge-success"><?= $data['level_name'];?></span>
            <?php elseif($data['level'] == 3): ?>
              <span class="badge badge-danger"><?= $data['level_name'];?></span>
              <?php endif; ?>
        </td>
        <td><img class="img-thumbnail" height="100px" width="100px" src="<?= base_url('assets/img/pengajar/' . $data['image']);?>"></td>
        <td class="text-right">
          <a href="<?= base_url('teacher/detailTeacher/' . $data['id']);?>" class="btn btn-secondary btn-sm mb-2"> <i class="fa fa-search"></i> Detail</a>
          <a href="<?= base_url('teacher/editTeacher/'.$data['id']);?>" class="btn btn-success btn-sm mb-2"> <i class="fa fa-edit"></i> Edit</a> <br>
          <a href="<?= base_url('teacher/tambahSertifikasi/' . $data['id']);?>" class="btn btn-primary btn-sm"> <i class="fa fa-image"></i> Sertifikasi</a>
          <a href="<?= base_url('teacher/teacherhapus/' . $data['id'])?>" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Hapus</a>
        </td>
      </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
</div>
  <!-- /.container-fluid -->

</div>
  <!-- End of Main Content -->
