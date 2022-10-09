<section>
  <div class="container-fluid mt-5">
    <div class="container pt-3">
      <div class="row text-center">      
        <h1 class="metawarna">Make an Order</h1>
      </div>
      <form action="<?= base_url('courseview/checkoutsimpan');?>" method="POST">
      <div class="row justify-content-center">
        <div class="col-lg-8 bgbilling pb-3">
          <h4 class="mt-3">Billing Details</h4>
          <hr class="mb-0" size="5px">
          <hr class="mt-1">
          <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $user['id']?>">
          <input type="hidden" class="form-control" name="email" id="email" value="<?= $user['email']?>">
          <input type="hidden" class="form-control" name="id_kursus" id="id_kursus" value="<?= $kursus['id']?>">
          <input type="hidden" class="form-control" name="kursus" id="kursus" value="<?= $kursus['judul']?>">
          <input type="hidden" class="form-control" name="slug" id="slug" value="<?= $kursus['slug']?>">
          <input type="hidden" class="form-control" name="harga" id="harga" value="<?= $kursus['harga'] ?>">
          <label for="nama" class="text-muted">Participant name<span class="text-danger">*</span></label>
          <input type="text" class="form-control mt-1" name="name" id="name" placeholder="Name" required>
          <label for="No" class="text-muted mt-3">No. Telp/Wa <span class="text-danger">*</span></label>
          <input type="text" class="form-control mt-1" name="no" id="no" placeholder="No. Telp/Wa" required>
          <label class="text-muted mt-3" for="pesan">Message <span class="text-danger">*</span></label>
          <textarea name="pesan" id="pesan" cols="30" rows="5" placeholder="Note" class="form-control"></textarea>
        </div>
        <div class="col-lg-8 mt-5">
          <h4>Your Order</h4>
          <hr class="mb-0">
          <hr class="mt-0">
          <div class="row mb-4">
            <div class="col-lg-4"><span class="fw-bold">Course</span></div>
            <div class="col-lg-8">
              <?= $kursus['judul']; ?>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-lg-4"><span class="fw-bold">Instructor</span></div>
            <div class="col-lg-8">
              <?= $kursus['pengajar']; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4"><span class="fw-bold">Level</span></div>
            <div class="col-lg-8">
              <span class="badge bg-success"><?= $kursus['level_name'] ?></span>
            </div>
          </div>
          <hr class="mb-0">
          <hr class="mt-0">
          <div class="row">
            <div class="col-lg-4"><span class="fw-bold">Price</span></div>
            <div class="col-lg-8">
              Rp. <?= $kursus['harga'] ?>
            </div>
          </div>
          <hr class="mb-0">
          <hr class="mt-0">
          <div class="row pt-5">
            <h4>Methode</h4>
            <div class="col-lg-12 bgpay py-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
              <label class="form-check-label" for="flexRadioDefault1">
                Transfer Bank
              </label>
              <p class="text-justify">Check your email after placing your order or check your spam folder if the email is not received. Make payments directly to our bank account. Please your Order ID as a payment reference. Send Payment confirmation via WA +62-831-1629-9191 or email metbrigth.id@gmail.com</p>
              <div class="row text-center">
                <div class="col-lg-3">
                  <img src="<?= base_url('assets/img/checkout/BRI.png')?>" alt="" height="100px">
                </div>
                <div class="col-lg-3">
                  <img src="<?= base_url('assets/img/checkout/BCA.png')?>" alt="" height="100px">
                </div>
                <div class="col-lg-3">
                  <img src="<?= base_url('assets/img/checkout/BNI.png')?>" alt="" height="100px">
                </div>
                <div class="col-lg-3">
                  <img src="<?= base_url('assets/img/checkout/Mandiri.png')?>" alt="" height="100px">
                </div>
              </div>
            </div>
            <div class="form-check mt-4">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" disabled>
              <label class="form-check-label" for="flexRadioDefault2">
                Other
              </label>
            </div>
          </div>
          </div>
          <div class="row justify-content-center mt-5">
            <div class="col-lg-4 row">
              <button class="btn btn-success btn-lg" type="submit">Make an Order</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>