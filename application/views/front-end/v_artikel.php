<!-- Header Artikel -->
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
        <li class="breadcrumb-item active" aria-current="page">Article</li>
      </ol>
    </nav>
    </div>
    <hr class="mt-0 mb-0">
    <hr class="mt-0">
  </div>
</section>
<!-- Daftar Artikel -->
<section>
  <div class="container-fluid">
    <div class="container ps-5">
    <div class="row pe-3">
    <form class="col-lg-3 d-flex offset-9" action="<?= base_url('artikel/cari'); ?>"">
        <input class="form-control me-2" type="search" placeholder="Search" name="keyword" aria-label="Search" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
      <div class="row">
        <div class="col-lg-8">
          <?php foreach($artikel as $data): ?>
            <?php if($data['status']==1): ?>
          <div class="card shadow mt-4 mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <a href="<?= base_url('artikel/read/' . $data['slug']); ?>"><img src="<?= base_url('assets/img/informasi/'.$data['image']); ?>" alt="" height="100%" width="100%" class="img-thumbnail"></a>
                </div>
                <div class="col-lg-8">
                  <a href="<?= base_url('artikel/read/' . $data['slug']); ?>" class="text-decoration-none text-reset"><h4><?= $data['judul'];?></h4></a>
                  <span class="badge bg-secondary"><?= date('d-M-Y', $data['date_created']); ?></span> <span class="badge bg-primary"><?= $data['nama_kategori']; ?></span>
                  <p><?= htmlspecialchars_decode(word_limiter($data['konten'], 40, '...')); ?></p>
                  <a href="<?= base_url('artikel/read/' . $data['slug']); ?>" class="text-decoration-none" style="color:#ffdb43;">See More..</a>
                </div>
              </div>
            </div>
          </div>           
          <?php endif; ?>
          <?php endforeach; ?> 
          <?php if($jumlah > 5): ?>
          <?= $this->pagination->create_links();?>
          <?php else : ?>
          <?php endif; ?>
        </div>
              
        <div class="col-lg-3 offset-1 border-start pe-4 mt-4">
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
</section>
