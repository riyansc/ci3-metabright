<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <img src="<?php echo base_url('assets/img/informasi/' . $detail['image']); ?>" alt="" class="img-thumbnail">
        <h3><?php echo $detail['judul'] ?></h3>
        <span class="badge badge-info"><?php echo date('d-M-Y', $detail['date_created']); ?></span>
        <span class="badge badge-success"><?php echo $kategori['nama_kategori']; ?></span>
        <p>
          <?php echo htmlspecialchars_decode($detail['konten']); ?>
        </p>
      </div>
    </div>
  </div>
</div>
</div>