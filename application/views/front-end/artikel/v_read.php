<section>
      <div class="container-fluid bg-artikel1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-2 text-center mt-2">
              <img src="<?php echo base_url('assets/') ?>img/tampilan_artikel/artikel.png" alt="article" height="130px" class="mt-3">
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center bg-secondary py-2 mt-2">
          <h4 class="fw-bold text-white">Article</h4>
        </div>
      </div>
</section>
<!-- Breadcumb -->
<section>
  <div class="container-fluid mt-2">
    <div class="container ps-4 pt-2">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>" class="text-decoration-none text-reset">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('artikel'); ?>" class="text-decoration-none text-reset">Article</a></li>
        <li class="breadcrumb-item active"><?php echo $artikel['judul']; ?></li>
      </ol>
    </nav>
    </div>
    <hr class="mt-0 mb-0">
    <hr class="mt-0">
  </div>
</section>
<!-- Konten -->
<div class="container-fluid">
  <div class="container ps-4">
    <div class="row">
      <div class="col-lg-9 mt-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <h3><?php echo $artikel['judul'] ?></h3>
                <span class="badge bg-secondary"><?php echo date('d-M-Y',$artikel['date_created']); ?></span>
                <span class="badge bg-primary"><?= $artikel['nama_kategori']; ?></span>
              </div>
            </div>
            <img src="<?php echo base_url('assets/img/informasi/' . $artikel['image']); ?>" alt="" class="img-thumbnail mt-4" height="100%" width="100%">
            <p>
              <?php echo htmlspecialchars_decode($artikel['konten']); ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 border-start pe-4 mt-4">
          <h5>Category</h5>
          <hr>
          <div class="mb-0">
            <?php foreach($kategori as $data) : ?>
            <a href="<?php echo base_url('artikel/kategori?filter=' . $data['nama_kategori']); ?>" class="text-decoration-none text-reset">- <?php echo $data['nama_kategori'];?><br></a>
            <?php endforeach; ?>
          </div>
      </div>
    </div>
  </div>
</div>
