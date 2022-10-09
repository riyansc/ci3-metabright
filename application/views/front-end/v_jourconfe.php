<!-- Header Artikel -->
<section>
      <div class="container-fluid bg-artikel1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-2 text-center mt-2">
              <img src="<?php echo base_url('assets/') ?>img/jourconfe/conference.png" alt="article" height="130px" class="mt-3">
            </div>
          </div>
        </div>
        <div class="col-lg-12 text-center bg-secondary py-2 mt-2">
          <h4 class="fw-bold text-white">Journal & Conference</h4>
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
        <li class="breadcrumb-item active" aria-current="page">Journal & Conference</li>
      </ol>
    </nav>
    </div>
    <hr class="mt-0 mb-0">
    <hr class="mt-0">
  </div>
</section>

<!-- Journal -->
<section>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 ms-5">
          <h2 class="fw-bold metawarna">Journal</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-11 ms-5">
        <?php foreach($journal as $data): ?>
            <?php if($data['access']==1): ?>
          <div class="card shadow mt-4 mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-2">
                  <img src="<?= base_url('assets/img/jourconfe/journal/'.$data['image']); ?>" alt="" height="100%" width="100%" class="img-thumbnail">
                </div>
                <div class="col-lg-8">
                  <h4><?= $data['judul'];?></h4>
                  <span><?= $data['access_name'];?> | <?= $data['volume'];?> <?= $data['date'];?></span> <br>
                  <a href="<?= $data['link']?>" class="btn btn-warning mt-2">View Details</a>
                </div>
              </div>
            </div>
          </div>           
          <?php endif; ?>
          <?php endforeach; ?> 
        </div>
      </div>
      <div class="row ms-5 mt-4">
        <div class="col-lg-4 ms-5 ps-5">
          <img src="<?= base_url('assets/img/jourconfe/ilustrasi.png')?>" alt="Journal" height="400px" width="350px">
        </div>
        <div class="col-lg-5 mt-5">
          <h3 class="metawarna fw-bold mt-5 mb-4">Publish Your Journal Now...</h3>
          <span class="metawarna fw-bold">Easily create your own version of the journal, just by taking a course on Metabright you can create your own journal...</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Conference -->
<section>
  <div class="container-fluid mt-5">
    <div class="container">
      <div class="row">
      <div class="col-lg-4 ms-5 mt-4">
          <h2 class="fw-bold metawarna">Conference</h2>
        </div>
      </div>
    </div>
    <div class="row ms-5">
        <div class="col-lg-11 ms-5">
        <?php foreach($conference as $data): ?>
          <div class="card shadow mt-4 mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-9 py-3">
                  <h4><?= $data['judul'];?></h4>
                  <span><?= $data['date'];?></span> <br>
                  <a href="<?= $data['link']?>" class="btn btn-warning mt-2">View details</a>
                </div>
                <div class="col-lg-3 my-5">
                  <img src="<?= base_url('assets/img/jourconfe/conference/'.$data['image']); ?>" alt="" height="100%" width="100%" class="">
                </div>
              </div>
            </div>
          </div>           
          <?php endforeach; ?> 
        </div>
      </div>
  </div>
</section>