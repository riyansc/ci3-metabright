<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
  
  <?php foreach($checkout as $ck): ?>
    <?php if($ck['status']==2): ?>
    <?php foreach($course as $data): ?>
      <?php if($data['id']==$ck['id_kursus']): ?>
        <div class="col-sm-6 mb-3 ">
          <div class="card ml-0 pl-0 ml-0">
            <div class="card-body row pt-0 pl-2 pb-0">
              <div class="col-lg-4 bg-mycourse rounded-left text-center pt-4">

                  <img src="<?= base_url('assets/img/course/' . $data['logo']);?>" alt="" height="130px" class="my-auto">

              </div>
              <div class="col-lg-8 pt-3">
                <h5 class="card-title"><?= $data['judul'] ?></h5>
                <p class="card-text">
                  <?= $data['pengajar'] ?><br><span class="badge badge-primary"><?= $data['level_name'] ?></span> <span class="badge badge-secondary"><?= $data['nama_kategori'] ?></span>
                </p>
                <a href="<?= base_url('courseview/mycourse_view/' . $data['slug']);?>" class="btn btn-outline-primary">Start Learn</a>
              </div>
            </div>
          </div>
        </div>
    <?php endif; ?>
    <?php endforeach; ?>   
    <?php endif; ?>
  <?php endforeach; ?>
</div>
</div>
</div>