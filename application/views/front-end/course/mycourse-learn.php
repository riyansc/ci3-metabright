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
          <h4 class="fw-bold text-white"><?= $course['judul'] ?></h4>
        </div>
      </div>
</section>

<!-- Content -->
<section>
  <div class="container-fluid">
    <div class="container ps-5">
      <div class="row ps-5">
        <div class="col-lg-3 border rounded mt-4">
          <div class="row">
            <div class="col-sm-3 ms-0 mt-3">
              <img src="<?= base_url('assets/img/pengajar/'.$course['image']);?>" alt="" class="rounded-circle ms-0" height="70px">
            </div>
            <div class="col-lg-9 mt-3 ">
              <h6><?= $course['pengajar'] ?></h6>
              <p><span class="badge bg-primary"><?= $course['level_name'] ?></span> <span class="badge bg-secondary"><?= $course['nama_kategori'] ?></span></p>
            </div>
          </div>
          <hr>
          <h5 class="fw-bold ps-2">Materi</h5>
          <hr>
          <?php foreach($materi as $data): ?>
            <?php if($data['id_kursus']==$course['id']): ?>
            <a href="<?= base_url('courseview/mycourse_theory/' . $data['id']);?>" class="text-decoration-none text-reset">
              <div class="card py-3 mt-2 ps-3 bg-materi"><?= $data['judul']; ?></div>
            </a>
          <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="col-lg-8 mt-4">
              <img src="<?= base_url('assets/img/pengajar/' . $course['sertifikasi']);?>" alt="" class="img-thumbnail">
              <h3 class="mt-4">Course Description</h3>
              <p class="text-justify"><?= $course['deskripsi'] ?></p>
              <div class="row mt-4 justify-content-center">
              <div class="col-lg-2 text-center"><h4>Study Method</h4></div>
              <div class="row justify-content-between">
                <div class="col-lg-4 bgmethod text-center">
                  <img src="<?= base_url('assets/img/course/Video Learning.png')?>" alt="" height="50px" class="mt-3">
                  <h5 class="metawarna">Video Learning</h5>
                  <p class="metawarna text-justify mt-3">Suitable for beginners to understand the concept from basics and can be repeated watching it until you can.</p>
                </div>
                <div class="col-lg-3 bgmethod text-center mx-1">
                  <img src="<?= base_url('assets/img/course/Project Based.png')?>" alt="" height="50px" class="mt-3">
                  <h5 class="metawarna">Project Based</h5>
                  <p class="metawarna mt-3">Learn by making projects as a result taught by the instructor</p>
                </div>
                <div class="col-lg-4 bgmethod text-center">
                  <img src="<?= base_url('assets/img/course/Study Case.png')?>" alt="" height="50px" class="mt-3">
                  <h5 class="metawarna">Case Study</h5>
                  <p class="metawarna mt-3">Learn with case studies according to the industry</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>