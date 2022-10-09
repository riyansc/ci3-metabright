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
              <img src="<?= base_url('assets/img/pengajar/'.$pengajar['image']);?>" alt="" class="rounded-circle ms-0" height="70px">
            </div>
            <div class="col-lg-9 mt-3 ">
              <h6><?= $pengajar['pengajar'] ?></h6>
              <p><span class="badge bg-primary"><?= $level['level_name'] ?></span> <span class="badge bg-secondary"><?= $kategori['nama_kategori'] ?></span></p>
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
            <h1><?= $materi_id['judul'] ?></h1>
            <hr>
            <?php 
            $namafile = $materi_id['file'];
            $pecah = explode("." , $namafile);
            $format = $pecah[1];
            ?>
            <?php if($format=='mp4'):?>
            <video controls controlsList="nodownload" class="mx-auto" height="450">
              <source src="<?= base_url('assets/img/course/materi/' . $materi_id['file'])?>" type="video/mp4">
            </video>
            <h3 class="mt-4">Thory Description</h3>
            <p><?= $materi_id['deskripsi'] ?></p>
            <?php elseif($format=='jpeg'): ?>
              <img src="<?= base_url('assets/img/course/materi/' . $materi_id['file'])?>" alt="" height="500" width="800">
              <h3 class="mt-4">Thory Description</h3>
              <p><?= $materi_id['deskripsi'] ?></p>
              <?php elseif($format=='pdf'): ?>
                <embed src="<?= base_url('assets/img/course/materi/' . $materi_id['file'])?>#toolbar=0" type="application/pdf" height="800" width="800">
                <h3 class="mt-4">Thory Description</h3>
                <p><?= $materi_id['deskripsi'] ?></p>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>