
                <!-- Begin Page Content -->
<div class="container-fluid">

                    <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<!-- // Notifikasi -->
        <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert"> 
        <?php echo validation_errors(); ?>
        </div>
        <?php endif; ?>
  <div class="row mt-2">
    <div class="col-lg-12">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
  </div>
<div class="row">
  <div class="col-md-2">
  <p>
    <a class="btn btn-primary " href="<?php echo base_url('user/tambahuser'); ?>"">
      <i class="fa fa-plus"></i> Add New User 
    </a>
  </p>
  </div>
    <div class="col-md-4 offset-6">
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search User" name="keyword">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>
  </div>
</div>
<?php if(empty($daftarUser)): ?>
        <div class="alert alert-danger" role="alert">
          Data not found!
        </div>
<?php endif; ?>
<table class="table table-border table-triped">
  <thead class="thead-dark">
    <tr>
     <th scope="col">No</th>
     <th scope="col">Name</th>
     <th scope="col">Email</th>
     <th scope="col">Image</th>
     <th scope="col">Role</th>
     <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = $start; ?>
    <?php foreach ($daftarUser as $data) : ?>
    <tr>
    <th scope="row"><?php echo ++$i; ?></th>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><img src="<?= base_url('assets/img/') . $data['image'];?>" class="img-thumbnail" height="50px" width="50px"></td>
    <td>
      <? if($data['role_id']==1):?>
        <span class="badge badge-primary"><?php echo $data['role']; ?></span>
        <?else :?>
          <span class="badge badge-secondary"><?php echo $data['role']; ?></span>
          <? endif; ?>
    </td>
    <td>
        <a href="<?= base_url('user/updateUser/' . $data['id']);?>" class="btn btn-success btn-sm"> <i class="fa fa-edit"></i> Edit</a>
        <a href="<?= base_url('user/hapus/' . $data['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');"> <i class="fa fa-trash"></i> Delete</a>
    </td>
    </tr>
    <?php endforeach; ?>
  <?php $i = 1; ?>
  </tbody>
</table>
<?php if($jumlah >= 5 ) : ?>
<?= $this->pagination->create_links(); ?>
<?php else : ?>
<?php endif; ?>
</div>
</div>

