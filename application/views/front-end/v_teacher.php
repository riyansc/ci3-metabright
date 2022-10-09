<!-- Header Artikel -->
<section>
      <div class="container-fluid bg-artikel1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-3 text-center mt-2">
            <img src="<?= base_url('assets/img/pengajar/' . $teacher['image']);?>" alt="" class="rounded-circle border border-light border-3" style="max-height: 140px; max-width: 140px" />
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center bg-secondary py-2 mt-2">
          <h4 class="fw-bold text-white"><?= $teacher['pengajar'] ?></h4>
        </div>
      </div>
</section>

<!-- Breadcumb -->
<section>
  <div class="container-fluid mt-2">
    <div class="container ps-4 pt-2">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb" class="ms-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>" class="text-decoration-none text-reset">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $teacher['pengajar'] ?></li>
      </ol>
    </nav>
    </div>
    <hr class="mt-0 mb-0">
    <hr class="mt-0">
  </div>
</section>

<!-- Detail teacher -->
<section>
  <div class="container-fluid">
    <div class="container ps-5 pe-5">
      <div class="row">
        <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
              <div class="row mb-2">
                <div class="col-sm-2 me-3">
                  <img src="<?= base_url('assets/img/pengajar/'.$teacher['image']);?>" alt="" class="img-thumbnail image-pengajar">
                </div>
                <div class="col-sm-9">
                  <h3 class="card-title"><?= $teacher['pengajar'] ?></h3> 
                  <p class="badge bg-success"><?= $teacher['level_name'] ?></p>              
                </div>
              </div>
              <h5>Description</h5>
              <p class="text-justify"><?= $teacher['deskripsi'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="<?= base_url('assets/img/pengajar/' . $teacher['sertifikasi']);?>" alt="" class="image-sertifikasi">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Detail teacher -->