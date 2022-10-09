   <!-- Header Awal -->
    <section>
      <div class="container pt-sm-5 mb-5">
        <div class="row">
          <div class="col-lg-6 px-5 text-lg-start align-self-center pt-sm-5">
            <div class="metawarna">
              <!-- <?= $user['name']; ?> -->
              <h2>Everyone definitely CAN!</h2>
              <h2>Start all from now!</h2>
              <p>Come on, improve your skills and abilities, learn with Metabright, starting with the skills needed by startups and the industry today.</p>
              <h6>Together with Metabright, you CAN!</h6>
            </div>
            <?php if (!$this->session->userdata('email')) : ?>
            <div class="row">
              <div class="col-sm-3 mt-3">
                <a href="<?= base_url('auth/registration');?>" class="btn btn-registrasi px-3 fw-bold fs-5 me-5">Register</a>
              </div>
              <div class="col-sm-3 mt-3">
                <a href="<?= base_url('auth');?>" class="btn btn-login fw-bold fs-5">Login</a>
              </div>
            </div>
          <?php else : ?>
            <a href="<?= base_url('mycourse');?>" class="btn btn-LearnNow fw-bold fs-5 me-5">Learn Now...</a>
          <?php endif; ?>
          </div>
          <div class="col-lg-6">
            <div class="">
            <?php if (!$this->session->userdata('email')) : ?>
              <img src="assets/img/Model1.png" alt="Metabright" class="w-100" />
              <?php else : ?>
                <img src="assets/img/Model2.png" alt="Metabright" class="w-100" />
                <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Header Awal -->

    <!-- Fact -->
    <div class="container-fluid text-center metawarna pt-5 pb-5 mb-5">
      <div class="pb-4 text-uppercase">
        <h5><u>Facts in the world of work</u></h5>
      </div>
      <div class="bgfact d-lg-flex justify-content-center">
        <div class="card bgmetawarna pt-5 pb-lg-4 position-relative mx-lg-4 mx-auto mb-lg-0 mb-5" style="width: 15rem">
          <div class="facthead rounded-circle position-absolute top-0 start-50 translate-middle bgmetawarna pt-3">
            <img src="assets/img/Worker2.png" alt="" class="proffact" />
          </div>
          <div class="card-body">
            <h6 class="card-subtitle mb-4 text-light lh-base">Most companies need people with abilities who have been directly involved in industrial projects with complete skills</h6>
          </div>
        </div>
        <div class="card bgmetawarna pt-5 pb-4 mx-lg-4 position-relative mx-auto mb-lg-0 mb-5" style="width: 15rem">
          <div class="facthead rounded-circle position-absolute top-0 start-50 translate-middle bgmetawarna pt-3">
            <img src="assets/img/Worker.png" alt="" class="proffact" />
          </div>
          <div class="card-body">
            <h6 class="card-subtitle mb-4 text-light lh-base">Many people can do work in the IT field but with quality below company standards, the projects they work on tend to be unstable</h6>
          </div>
        </div>
        <div class="card bgmetawarna pt-5 mx-lg-4 position-relative mx-auto mb-lg-0 mb-5" style="width: 15rem">
          <div class="facthead rounded-circle position-absolute top-0 start-50 translate-middle bgmetawarna pt-2">
            <img src="assets/img/Worker3.png" alt="" class="proffact2" />
          </div>
          <div class="card-body">
            <h6 class="card-subtitle mb-4 text-light lh-base">Competition in the world of work is very tight, if your skills and abilities are still standard and nothing stands out then you will be eliminated</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- End fact -->

    <!-- Benefits -->
    <section>
      <div class="container-fluid">
        <div class="container metawarna px-5">
          <div class="row">
            <div class="col-12 text-uppercase text-center">
              <h5><u>Benefits of taking a course at Metabright</u></h5>
            </div>
          </div>
          <div class="row py-5">
            <div class="col-lg-4 mt-5">
              <div class="card border border-white position-relative mx-auto" style="width: 17rem">
                <div class="benefits position-absolute top-0 start-50 translate-middle">
                  <img src="assets/img/benefits1.png" alt="" class="bgbenf" />
                </div>
                <div class="card-body mt-5 px-0 text-center">
                  <div class="card-title fw-bold fs-6 mb-4">Project Experience</div>
                  <div class="card-subtitle">By taking courses with Metabright you will be given experience working on specific projects required by the industry.</div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-5">
              <div class="card border border-white position-relative mx-auto" style="width: 17rem">
                <div class="benefits position-absolute top-0 start-50 translate-middle">
                  <img src="assets/img/benefits2.png" alt="" class="bgbenf" />
                </div>
                <div class="card-body mt-5 px-0 text-center">
                  <div class="card-title fw-bold fs-6 mb-4">Training Problem Solving</div>
                  <div class="card-subtitle">Taught to solve a case study, where there will be problems that must be solved using the methods that have been taught in the course.</div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-5">
              <div class="card border border-white position-relative mx-auto" style="width: 17rem">
                <div class="benefits position-absolute top-0 start-50 translate-middle">
                  <img src="assets/img/benefits3.png" alt="" class="bgbenf" />
                </div>
                <div class="card-body mt-5 px-0 text-center">
                  <div class="card-title fw-bold fs-6 mb-0">Training Understanding Documentation</div>
                  <div class="card-subtitle">Learn to understand the documentation of a case, and learn to understand the case to be resolved on demand from the existing documentation.</div>
                </div>
              </div>
            </div>
          </div>

          <div class="row py-5">
            <div class="col-lg-4 mt-5">
              <div class="card border border-white position-relative mx-auto" style="width: 17rem">
                <div class="benefits position-absolute top-0 start-50 translate-middle">
                  <img src="assets/img/benefits4.png" alt="" class="bgbenf" />
                </div>
                <div class="card-body mt-5 px-0 text-center">
                  <div class="card-title fw-bold fs-6 mb-4">Understanding company needs</div>
                  <div class="card-subtitle">Together with Metabright we will learn what the company needs, so that we will be ready to work and know the needs of the company.</div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-5">
              <div class="card border border-white position-relative mx-auto" style="width: 17rem">
                <div class="benefits position-absolute top-0 start-50 translate-middle">
                  <img src="assets/img/benefits5.png" alt="" class="bgbenf" />
                </div>
                <div class="card-body mt-5 px-0 text-center">
                  <div class="card-title fw-bold fs-6 mb-4">Adding Insight</div>
                  <div class="card-subtitle">Increase your insight and experience in working on case studies, so that you can overcome problems when working with the experience you have gained.</div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-5">
              <div class="card border border-white position-relative mx-auto" style="width: 17rem">
                <div class="benefits position-absolute top-0 start-50 translate-middle">
                  <img src="assets/img/benefits6.png" alt="" class="bgbenf" />
                </div>
                <div class="card-body mt-5 px-0 text-center">
                  <div class="card-title fw-bold fs-6 mb-4">Flexible Training Time & Place</div>
                  <div class="card-subtitle">Time and place of learning are more flexible, with online teaching systems and materials in the form of videos and documents that can be opened and studied anytime and anywhere.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Benefits -->

    <!-- Interested -->
    <section>
      <div class="container-fluid mt-5 mb-5">
        <div class="container">
          <div class="row">
            <div class="col-12 text-uppercase text-center">
              <h5><u>What are you interested in learning?</u></h5>
            </div>
          </div>
        </div>
        <div class="container-fluid bg-inters mt-4">
          <div class="container px-5">
            <div class="row text-center justify-content-center">
              <div class="col-lg-3 pt-4">
                <div class="card bginters py-5">
                  <div class="card-title">
                    <a href="<?= base_url('courseview/kategori?filter=Research%20Development')?>" class="" style="text-decoration: none;">
                    <h5>Research Development</h5>
                      </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bginters py-5">
                  <div class="card-title">
                    <a href="<?= base_url('courseview/kategori?filter=Management')?>" class="text-decoration-none text-reset" >
                      <h5>Management</h5>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bginters py-5">
                  <div class="card-title">
                  <a href="<?= base_url('courseview/kategori?filter=Data%20Mining')?>" class="text-decoration-none text-reset" >
                    <h5>Data Mining</h5>
                  </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row text-center justify-content-center pb-5">
              <div class="col-lg-3 pt-4">
                <div class="card bginters py-5">
                  <div class="card-title">
                  <a href="<?= base_url('courseview/kategori?filter=Digital%20Marketing')?>" class="text-decoration-none text-reset" >
                    <h5>Digital Marketing</h5>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bginters py-5">
                  <div class="card-title">
                  <a href="<?= base_url('courseview/kategori?filter=App%20Development')?>" class="text-decoration-none text-reset" >
                    <h5>App Development</h5>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bginters py-5">
                  <div class="card-title">
                  <a href="<?= base_url('courseview/kategori?filter=Web%20Development')?>" class="text-decoration-none text-reset" >
                    <h5>Web Development</h5>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Interested -->

    <!-- Recom Course -->
    <section>
      <div class="container-fluid px-5 metawarna">
        <div class="continer pt-5">
          <div class="row">
            <div class="col-12 text-uppercase text-center">
              <h5><u>Course Recommendations for you!</u></h5>
            </div>
          </div>

          <div class="row justify-content-center px-5">
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
                  <div class="rating d-flex " style="height: 30px">
                    <img src="assets/img/star.png" alt="rating" class="" />
                    <img src="assets/img/star.png" alt="rating" class="" />
                    <img src="assets/img/star.png" alt="rating" class="" />
                    <img src="assets/img/star.png" alt="rating" class="" />
                    <img src="assets/img/star.png" alt="rating" class="" />
                  </div>
                  <p class="card-text mb-2"><?= $data['harga']  ?></p>
                  <div class="col text-center pt-0">
                    <a href="<?= base_url('courseview/read/' . $data['slug']);?>" class="btn btn-recom text-decoration-none px-4 fw-bold">View Course</a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

          <div class="row justify-content-center mt-4">
            <div class="col-lg-2">
              <div class="col text-center pt-0">
                <a href="<?= base_url('courseview')?>" class="btn btn-recom text-decoration-none px-4 fw-bold">See More</a>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Recom Course -->

    <!-- Support -->
    <section>
      <div class="container-fluid mt-5 mb-5 pt-5">
        <div class="container pt-3">
          <div class="row">
            <div class="col-12 text-center">
              <h5><u>Metabright will fully support you from start to finish!</u></h5>
            </div>
          </div>
        </div>
        <div class="container-fluid bg-supp mt-4">
          <div class="container px-5">
            <div class="row text-center justify-content-center">
              <div class="col-lg-3 pt-4">
                <div class="card bgsupport py-1">
                  <div class="prof-supp mx-auto mb-1">
                    <img src="assets/img/support1.png" alt="" />
                  </div>
                  <div class="card-title">
                    <h5>Access materials forever</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bgsupport py-1">
                  <div class="prof-supp mx-auto mb-1">
                    <img src="assets/img/support2.png" alt="" />
                  </div>
                  <div class="card-title">
                    <h5>Case studies and projects</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bgsupport py-1">
                  <div class="prof-supp mx-auto mb-1">
                    <img src="assets/img/support3.png" alt="" />
                  </div>
                  <div class="card-title">
                    <h5>Experienced teacher</h5>
                  </div>
                </div>
              </div>
            </div>

            <div class="row text-center justify-content-center pb-5">
              <div class="col-lg-3 pt-4">
                <div class="card bgsupport py-1">
                  <div class="prof-supp mx-auto mb-1">
                    <img src="assets/img/support4.png" alt="" />
                  </div>
                  <div class="card-title">
                    <h5>Flexible study time</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bgsupport py-1">
                  <div class="prof-supp mx-auto mb-1">
                    <img src="assets/img/support5.png" alt="" />
                  </div>
                  <div class="card-title">
                    <h5>Get certificate</h5>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 pt-4">
                <div class="card bgsupport py-1">
                  <div class="prof-supp mx-auto mb-1">
                    <img src="assets/img/support6.png" alt="" />
                  </div>
                  <div class="card-title">
                    <h5>Indonesian & English</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Support -->

    <!-- Artikel -->
    <section>
      <div class="container-fluid py-5">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <h5><u>Articles</u></h5>
            </div>
          </div>
        </div>
        <div class="container px-5">
          <div class="row">
            <?php foreach($artikel as $art): ?>
            <div class="col-lg-4 mt-4">
              <div class="card h-100">
                <a href="<?= base_url('artikel/read/' . $art['slug']); ?>" class="text-decoration-none text-reset"><img src="<?= base_url('assets/img/informasi/' . $art['image']); ?>" class="card-img-top artikel-home" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?php echo $art['judul']; ?></h5></a>
                  <p class="fw-normal"><?= htmlspecialchars_decode(word_limiter($art['konten'], 40, '...')); ?></p>
                </div>
                <div class="ms-3 see-more">
                  <a href="<?= base_url('artikel/read/' . $art['slug']); ?>">See more >></a>
                </div>
                <div class="card-footer">
                  <small class="text-muted"><?php echo date('d-M-Y',$art['date_created']); ?></small>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="row justify-content-center mt-4">
            <div class="col-lg-2">
              <div class="col text-center pt-0">
                <a href="<?= base_url('artikel')?>" class="btn btn-article text-decoration-none px-4 fw-bold">See More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Artikel -->

    <!-- teacher -->
    <section>
      <div class="container-fluid bgteacher mb-5">
        <div class="container mt-5 mb-3">
          <div class="row text-center">
            <div class="col-lg-12 mt-4">
              <h5>Our Teacher</h5>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row justify-content-center">
            <?php foreach($teacher as $data) : ?>
            <div class="col-lg-3 text-center">
              <img src="<?= base_url('assets/img/pengajar/' . $data['image']);?>" alt="" class="rounded-circle mb-3 border border-light border-3" style="max-height: 140px; max-width: 140px" />
              <a href="<?= base_url('teacher/detailteacher/' . $data['id'])?>" class="text-decoration-none text-reset"><h6><?= $data['pengajar']; ?></h6></a>
              <p><?= $data['level_name']; ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- <div class="container justify-content-center mb-5">
        <div class="col-lg-12">
          <div class="col text-center pt-0">
            <a href="#" class="btn btn-article text-decoration-none px-4 fw-bold">See More</a>
          </div>
        </div>
      </div> -->
    </section>
    <!-- End teacher -->

    <!-- Metabright partner 1 -->
    <div class="container-fluid bgpartner mb-5 mt-5">
      <div class="container text-center pt-3">
        <div class="row texpartner">
          <h4 class="fw-bold">MetaBright</h4>
        </div>
        <div class="row justify-content-evenly pb-5 pt-4">
          <div class="col-lg-2 partner">
            <a href="https://bright-journal.org/" class="text-decoration-none text-reset"><img src="assets/img/Metabright.png" alt="Metabright" class="mb-2" />
            <h5 class="fw-bold">Bright Publisher</h5>
            </a>
          </div>
          <div class="col-lg-2 partner">
            <a href="https://icmis.asia/" class="text-decoration-none text-reset"><img src="assets/img/imisf.png" alt="IMISF" class="mb-2" />
            <h5 class="fw-bold">IMISF</h5>
            </a>
          </div>
          <div class="col-lg-2 partner">
            <a href="https://apssd.org/" class="text-decoration-none text-reset"><img src="assets/img/apssd.png" alt="APPSD" class="mb-2" />
            <h5 class="fw-bold">APSSD</h5>
            </a>
          </div>
          <div class="col-lg-2 partner">
            <a href="https://icmis.asia/" class="text-decoration-none text-reset"><img src="assets/img/icms.png" alt="ICMS" class="mb-2" />
            <h5 class="fw-bold">ICMS</h5>
            </a>
          </div>
          <div class="col-lg-2 partner">
            <a href="https://apssd.org/" class="text-decoration-none text-reset"><img src="assets/img/icri.png" alt="ICRI" class="mb-2" />
            <h5 class="fw-bold">ICRI</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- End Metabright partner 1 -->
    <!-- Partner 2 -->
    <div class="container-fluid pt-4">
      <div class="container px-5">
        <div class="row text-center">
          <h5><u>Our Partner</u></h5>
        </div>
        <div class="row mb-5">
          <div class="card-group justify-content-evenly">
            
            <div class="card bgpartner2 rounded-3" style="max-width: 18rem">
              <div class="row">
                <div class="col-6" style="width: 135px">
                  <img src="assets/img/mdpi .png" class="card-partner mt-2 ms-2" alt="..." />
                </div>
                <div class="col-6 mx-0">
                  <h5 class="mx-0 mt-2 lh-1">MDPI in<br /><span class="fs-6 fw-bold">Sustainability</span></h5>
                  <p class="font-partner mb-0">Impact factor 3.521<br />Cite Score 3.9</p>
                </div>
              </div>
              <div class="card-body">
                <h5 class="card-title lh-1 mb-0">Frontiers In Sustainable Information And Communications Technology.</h5>
                <p class="card-text lh-1 font-partner mt-2">
                  We encourage you to contribute research or a comprehensive review article for consideration for publication in Sustainability, an international Open Access journal that provides an advanced forum for research findings in
                  areas related to sustainability and sustainable…
                </p>
              </div>
              <div class="row align-items-end ms-1">
                <div class="col">
                  <a href="#" class="link-partner">Read More..</a>
                </div>
              </div>
              <div class="card-footer">
                <small class="">March 17, 2022</small>
              </div>
            </div>

            <div class="card bgpartner2 rounded-3" style="max-width: 18rem;">
            <div class="row">
              <div class="col-6" style="width: 135px">
                <img src="assets/img/mdpi 1.png" class="card-partner mt-2 ms-2" alt="..." />
              </div>
              <div class="col-6 mx-0">
                <h5 class="mx-0 mt-2 lh-1">Frontier in<br /><span class="fs-6 fw-bold">Psychology</span></h5>
                <p class="font-partner mb-0">Impact factor 2.990<br />Cite Score 3.5</p>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title lh-1 mb-0">Future And Impact Of Information And Communication Technology For Society 5.0.</h5>
              <p class="card-text lh-1 font-partner mt-2">
                We encourage you to contribute research or a comprehensive review rticle for consideration for publication in Frontier in Psychology, an international Open Access journal that provides an advanced forum for research findings in areas related to Information and Communication Technology…
              </p>
            </div>
            <div class="row align-items-end ms-1">
              <div class="col">
                <a href="https://www.frontiersin.org/research-topics/32155/future-and-impact-of-information-and-communication-technology-for-society-50" class="link-partner">Read More..</a>
              </div>
            </div>
            <div class="card-footer">
              <small class="">March 17, 2022</small>
            </div>
          </div>


          <div class="card bgpartner2 rounded-3 " style="max-width: 18rem">
            <div class="row">
              <div class="col-6" style="width: 135px">
                <img src="assets/img/mdpi 2.png" class="card-partner mt-2 ms-2" alt="..." />
              </div>
              <div class="col-6 mx-0 partnerfn3">
                <h5 class="mx-0 mt-2 lh-1 mb-0">Bright Publisher in </h5>
                <h6 class="fw-bold mt-0 partnerfn3-h6">IJIIS : International Journal of Informatics and Information System</h6>
                <p class= "font-partner3 mb-0">Impact factor 3.521<br />Cite Score 3.9</p>
              </div>
            </div>
            <div class="card-body">
              <h5 class="card-title lh-1 mb-0">Frontiers In Sustainable Information And Communications Technology.</h5>
              <p class="card-text lh-1 font-partner mt-2">
                We encourage you to contribute research or a comprehensive review article for consideration for publication in Sustainability, an international Open Access journal that provides an advanced forum for research findings in
                areas related to sustainability and sustainable…
              </p>
            </div>
            <div class="row align-items-end ms-1">
              <div class="col">
                <a href="http://ijiis.org/index.php/IJIIS/" class="link-partner">Read More..</a>
              </div>
            </div>
            <div class="card-footer">
              <small class="">March 17, 2022</small>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Partner 2 -->

    <!-- Register Now -->
    <section>
      <div class="container-fluid pt-5">
        <div class="container mb-5">
          <div class="row justify-content-evenly">
            <div class="col-lg-4 reg-style">
              <img src="assets/img/Ilustrasi1.png" alt="">
            </div>
            <div class="col-lg-4 pt-4 bgreg-par">
              <h5 class="fw-bold">Are you ready to face the industrial revolution 4.0?</h5>
              <p class="lh-1 reg-par">Indonesia is one of the countries with a very fast growth in the technology industry, which is marked by many startups appearing with a valuation of millions of dollars. However, many companies are still having trouble getting IT talent in Indonesia.</p>
              <p><span class="fw-bold lh-1">So there is no reason that job opportunities are not available, but do your competencies meet or not?</span></p>
              <?php if(!$this->session->userdata('email')) : ?>
              <a href="<?= base_url('auth/registration');?>" class="btn btn-reg">Register Now!</a>
              <?php else : ?>
                <a href="<?= base_url('courseview')?>" class="btn btn-reg">Let's Go!</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Register Now -->

   
