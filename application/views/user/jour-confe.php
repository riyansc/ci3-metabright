<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <p>
    <a class="btn btn-primary mb-3" href="<?php echo base_url('jourconfe/tambahjournal'); ?>"">
      <i class="fa fa-plus"></i> Add New journal
    </a>
  </p>
  <div class="row">
    <div class="col-lg-12">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
  </div>
  <table class="table table-border">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Jurnal</th>
        <th scope="col">Image</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Access</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      <?php foreach($journal as $jr ) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $jr['judul']; ?></td>
          <td><img src="<?= base_url('assets/img/jourconfe/journal/' . $jr['image']); ?>" alt="" class="img-thumbnail" height="150px" width="100px"></td>
          <td><?= $jr['date']?></td>
          <td>
            <?php if($jr['access'] == 1): ?>
            <span class="badge badge-primary"><?= $jr['access_name']?></span></td>
            <?php else : ?>
            <span class="badge badge-warning"><?= $jr['access_name']?></span></td>
            <?php endif; ?>
          <td>
            <a href="<?= base_url('user/updateUser/' . $jr['id']);?>" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit</a>
            <a href="<?= base_url('jourconfe/journalHapus/' . $jr['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"> <i class="fa fa-trash"></i> Delete</a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>

  <br>
  <hr>
  <hr>
  <br>
  <p>
    <a class="btn btn-primary mb-3" href="<?php echo base_url('jourconfe/tambahconf'); ?>"">
      <i class="fa fa-plus"></i> Add New Conference
    </a>
  </p>
  <table class="table table-border">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Conference</th>
        <th scope="col">Image</th>
        <th scope="col">Link</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      <?php foreach($conference as $cr ) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $cr['judul']; ?></td>
          <td><img src="<?= base_url('assets/img/jourconfe/conference/' . $cr['image']); ?>" alt="" class="img-thumbnail" height="150px" width="100px"></td>
          <td><?= $cr['link']?></td>
          <td><?= $cr['date']?></td>
          <td>
            <a href="<?= base_url('user/updateUser/' . $jr['id']);?>" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit</a>
            <a href="<?= base_url('jourconfe/hapusconf/' . $cr['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"> <i class="fa fa-trash"></i> Delete</a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
