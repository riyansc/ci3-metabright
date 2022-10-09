<!-- Header Artikel -->
<section>
      <div class="container-fluid bg-artikel1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-2 text-center mt-2">
              <img src="<?php echo base_url('assets/img/course/' . $course['logo']); ?>" alt="article" height="130px" class="mt-3">
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
        <li class="breadcrumb-item"><a href="<?php echo base_url('courseview'); ?>" class="text-decoration-none text-reset">Course</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $course['judul']; ?></li>
      </ol>
    </nav>
    </div>
    <hr class="mt-0 mb-0">
    <hr class="mt-0">
  </div>
</section>

<!-- Get Course -->
<section>
  <div class="container-fluid">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-3 text-center">
          <img src="<?= base_url('assets/img/course/Level.png')?>" alt="" height="110px">
          <p>Level</p>
          <h5>Beginner</h5>
        </div>
        <div class="col-lg-3 text-center">
          <img src="<?= base_url('assets/img/course/Access.png')?>" alt="" height="110px">
          <p>Access</p>
          <h5>Forever</h5>
        </div>
        <div class="col-lg-3 text-center">
          <img src="<?= base_url('assets/img/course/Language.png')?>" alt="" height="110px">
          <p>Language</p>
          <h5>Indonesian</h5>
        </div>
        <div class="col-lg-3 text-center">
          <img src="<?= base_url('assets/img/course/Sertifikat.png')?>" alt="" height="110px">
          <p>Certificate</p>
          <h5>Available</h5>
        </div>
      </div>
    </div>
    <hr>
  </div>
</section>

<!-- Konten -->
<div class="container-fluid">
  <div class="container px-5">
    <!-- Judul -->
    <div class="row">
      <div class="col-lg-9">
      <h3><?= $course['judul']; ?></h3>
      </div>
    </div>
    <!-- Profil & Kategori -->
    <div class="row">
      <div class="col-lg-1">
        <img src="<?= base_url('assets/img/pengajar/'.$course['image']);?>" alt="" class="rounded-circle" height="80px">
      </div>
      <div class="col-lg-4 align-items-center py-3">
        <p><span class="text-secondary ">Instructor</span><br><span class="fs-5"><?= $course['pengajar']; ?></span></p>
      </div>
      <div class="col-lg-1 text-end">
        <img src="<?= base_url('assets/img/course/Tag categori.png');?>" alt="" height="80px">
      </div>
      <div class="col-lg-3 py-3">
        <p><span class="text-secondary">Category</span><br><span class="fs-5"><?= $course['nama_kategori']; ?></span></p>
      </div>
    </div>
    <!-- Sertifikat -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-8">
        <img src="<?= base_url('assets/img/pengajar/' . $course['sertifikasi']);?>" alt="" width="850px">
      </div>
    </div>
    <!-- Deskripsi -->
    <div class="row pt-5">
      <h4>Course Description</h4><br>
      <p class="text-justify"><?= $course['deskripsi']; ?></p>
    </div>
    
    <!-- Metode Belajar -->
    <div class="row mt-4 justify-content-center">
      <div class="col-lg-2 text-center"><h4>Study Method</h4></div>
      <div class="row justify-content-evenly">
        <div class="col-lg-3 bgmethod text-center">
          <img src="<?= base_url('assets/img/course/Video Learning.png')?>" alt="" height="100px" class="mt-3">
          <h5 class="metawarna">Video Learning</h5>
          <p class="metawarna text-justify mt-3">Suitable for beginners to understand the concept from basics and can be repeated watching it until you can.</p>
        </div>
        <div class="col-lg-3 bgmethod text-center">
          <img src="<?= base_url('assets/img/course/Project Based.png')?>" alt="" height="100px" class="mt-3">
          <h5 class="metawarna">Project Based</h5>
          <p class="metawarna mt-3">Learn by making projects as a result taught by the instructor</p>
        </div>
        <div class="col-lg-3 bgmethod text-center">
          <img src="<?= base_url('assets/img/course/Study Case.png')?>" alt="" height="100px" class="mt-3">
          <h5 class="metawarna">Case Study</h5>
          <p class="metawarna mt-3">Learn with case studies according to the industry</p>
        </div>
      </div>
    </div>
    <!-- Materi Pembelajarn -->
    <div class="row mt-5 justify-content-center">
      <div class="col-lg-4 text-center pt-5"><h4>What you will learn in this course</h4></div>
      <div class="row justify-content-center">
        <div class="col-lg-8 mt-3">
          <?php foreach($materi as $data): ?>
            <?php if($data['id_kursus']==$course['id']) : ?>
          <div class="card py-2 px-4">
            <a class="text-decoration-none text-reset row" data-bs-toggle="collapse" href="#<?=$data['slug'];?>" role="button" aria-expanded="false" aria-controls="collapseExample">
              <div class="col-lg-10 ">
                <i class=" text-end fas fa-chevron-circle-right"></i>
                <span> <?= $data['judul'] ?> </span>
              </div>
              <div class="col-lg-2 text-end ">
                <span class="badge bg-warning"><?= $data['media'] ?></span>
              </div>
            </a>
                
            <div class="collapse" id="<?=$data['slug'];?>">
              <div class="card card-body mt-3">
                <?= $data['deskripsi'] ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Profesi yang bisa di ambil -->
    <div class="row">

    </div>
    <!-- Portofolio Contoh Fianal project -->
    <div class="row">

    </div>
    <!-- Spesifikasi dan harga Kursus -->
    <div class="row mt-5 ms-5 ps-5 align-items-center">
      <div class="col-lg-6 ps-5 ms-5">
        <img src="<?= base_url('assets/img/course/Writing.png')?>" alt="" height="350px">
      </div>
      <div class="col-lg-5 ">
        <h3>Let's Join Now!</h3>
        <p>Pay once, learn as much as you want</p>
        <p class="fw-bold">- Certificate of Completion <br>- Full Support <br>- Forever Access <br>- Start to Invest 100%</p>
        <div class="col-lg-8 justify-content-center row">
        <a class="btn btn-harga btn-sm">Rp. <?= $course['harga'] ?></a><br>
        <? if (!$this->session->userdata('email')) : ?>
        <a href="<?= base_url('auth')?>" class="btn btn-registrasi btn-lg mt-2">Join Now!</a>
        <?php else : ?>
          <a href="<?= base_url('courseview/checkout/'. $course['slug'])?>" class="btn btn-registrasi btn-lg mt-2">Join Now!</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>