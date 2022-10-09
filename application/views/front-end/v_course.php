<!-- Header Artikel -->
<section>
      <div class="container-fluid bg-artikel1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-2 text-center mt-2">
              <img src="<?php echo base_url('assets/') ?>img/course/course.png" alt="article" height="130px" class="mt-3">
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center bg-secondary py-2 mt-2">
          <h4 class="fw-bold text-white">Course</h4>
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
        <li class="breadcrumb-item active" aria-current="page">Course</li>
      </ol>
    </nav>
    </div>
    <hr class="mt-0 mb-0">
    <hr class="mt-0">
  </div>
</section>
<!-- Content -->
<section>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row mb-3">
            <form class="col-lg-4 d-flex offset-8 " action="<?= base_url('courseview/cari'); ?>"">
              <input class="form-control me-2" type="search" placeholder="Search" name="keyword" aria-label="Search" required>
              <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            <?php foreach($course as $data): ?>
            <div class="col-lg-4 position-relative">
              <div class="card card-recom rounded-5 position-relative mx-auto mt-5" style="width: 18rem; height: 420px">
                <div class="level-course position-absolute px-2 end-0 mt-3 pt-1"><h6><?= $data['level_name'] ?></h6></div>
                <div class="col-12 text-center pt-2 rounded-top gb-recom">
                  <img src="<?= base_url('assets/img/course/' . $data['logo']);?>" class="card-img-top gmb-recom" alt="..." />
                </div>
                <div class="card-body">
                  <div class="" style="width: 100%; height: 100px">
                    <h5 class="card-title"><?= $data['judul']; ?></h5>
                  </div>
                  <hr class="mb-0">
                  <p class="badge bg-warning mt-0"><?= $data['nama_kategori'] ?></p>
                  <div class="rating d-flex" style="height: 30px">
                    <img src="<?=base_url('assets/')?>img/star.png" alt="rating" class="" />
                    <img src="<?=base_url('assets/')?>img/star.png" alt="rating" class="" />
                    <img src="<?=base_url('assets/')?>img/star.png" alt="rating" class="" />
                    <img src="<?=base_url('assets/')?>img/star.png" alt="rating" class="" />
                    <img src="<?=base_url('assets/')?>img/star.png" alt="rating" class="" />
                  </div>
                  <p class="card-text mb-2"><?= $data['harga']  ?></p>
                  <div class="col text-center pt-0">
                    <a href="<?= base_url('courseview/read/' . $data['slug']);?>" class="btn btn-recom text-decoration-none px-4 fw-bold">View Course</a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php if($jumlah >= 6 ) : ?>
            <?= $this->pagination->create_links(); ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
              
        <div class="col-lg-3 border-start pe-4">
          <h5>Category</h5>
          <hr>
          <div class="mb-0">
            <?php foreach($kategori as $data): ?>
            <a href="<?= base_url('courseview/kategori?filter=' . $data['nama_kategori']); ?>" class="text-decoration-none text-reset"><p>- <?= $data['nama_kategori']; ?></p></a>
            <?php endforeach; ?>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>