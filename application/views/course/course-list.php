<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-sm-5 row pl-4">
    <p>
        <a href="<?= base_url('course/coursetambah'); ?>" class="btn btn-primary mx-3"><i class="fas fa-fw fa-plus"></i> Add New Course</a>
    </p>
    <p>
        <a href="<?= base_url('course/level');?>" class="btn btn-warning"><i class="fas fa-fw fa-plus"></i> Level</a>
    </p>
    <p>
        <a href="<?= base_url('course/kategori');?>" class="btn btn-success mx-3"><i class="fas fa-fw fa-plus"></i> Category</a>
    </p>
    </div>
    <div class="col-md-4 offset-3">
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search Course" name="keyword">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>
  </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
   </div>
  <div class="col-lg-12">
  <table class="table table-border">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Course</th>
        <th>Image</th>
        <th>Category</th>
        <th>Level</th>
        <th>Instructor</th>
        <th>Harga</th>
        <th>Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=$start; ?>
      <?php foreach($kursus as $data): ?>
      <tr>
        <td><?= ++$i; ?></td>
        <td><?= $data['judul'];?></td>
        <td><img class="img-thumbnail" height="100px" width="100px" src="<?= base_url('assets/img/course/' . $data['logo']);?>"></td>
        <td><?= $data['nama_kategori']; ?></td>
        <td>
          <?php if($data['level'] == 1): ?>
          <span class="badge badge-success"><?= $data['level_name'];?></span>
          <?php elseif($data['level'] == 2 ): ?>
            <span class="badge badge-danger"><?= $data['level_name'];?></span>
            <?php endif; ?>
        </td>
        <td><?= $data['pengajar'] ?></td>
        <td><?= $data['harga'] ?></td>
        <td>
          <?php if($data['status']==1): ?>
          <span class="badge badge-primary"><?= $data['status_name'] ?></span>
          <?php elseif($data['status']==2): ?>
            <span class="badge badge-danger"><?= $data['status_name'] ?></span>
            <?php endif; ?>
        </td>
        <td>
          <a href="<?= base_url('course/materi/'.$data['id']);?>" class="btn btn-primary btn-sm mb-2"> <i class="fa fa-book"></i> Materi</a>
          <a href="<?= base_url('courseview/read/' . $data['slug'])?>" class="btn btn-secondary btn-sm mb-2"> <i class="fa fa-search"></i> Detail</a>
          <a href="<?= base_url('course/courseEdit/' . $data['id'])?>" class="btn btn-success btn-sm mb-2 pr-3"> <i class="fa fa-edit"></i> Edit</a>
          <a href="<?= base_url('course/coursehapus/' . $data['id'])?>" class="btn btn-danger btn-sm mb-2 px-2" onclick="return confirm('Yakin?');"> <i class="fa fa-trash"></i> Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php if($jumlah >= 5 ) : ?>
<?= $this->pagination->create_links(); ?>
<?php else : ?>
<?php endif; ?>
  </div>
</div>
  <!-- /.container-fluid -->

</div>
  <!-- End of Main Content -->
