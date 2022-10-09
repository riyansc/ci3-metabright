<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="col-lg-6">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
  <table class="table table-border">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kursus</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Upload</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      <?php foreach($checkout as $data): ?>
        <?php if($data['id_user']==$user['id']): ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['kursus'] ?></td>
          <td><?= $data['harga'] ?></td>
          <td>
            <span class="badge badge-primary"><?= $data['tagihan_status'] ?></span>
          </td>
          <td>
            <a href="<?= base_url('order/upload/'. $data['id'])?>" class="btn btn-success btn-sm">Upload</a>
          </td>
        </tr>
        <?php $i++; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>