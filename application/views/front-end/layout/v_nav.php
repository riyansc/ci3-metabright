<!-- Headr Navbar -->
<header class="navbar sticky-top navbar-expand-lg navbar-dark bg-metabright main-nav">
      <div class="container px-4">
        <a class="navbar-brand" href="<?= base_url('home');?>">
          <img src="<?php echo base_url('assets/') ?>img/logo.png" alt="MetaBright" class="main-logo main-logo-hitam" height="80px">
          <img src="<?php echo base_url('assets/') ?>img/logo putih.png" alt="MetaBright" class="main-logo main-logo-putih" height="80px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto py-3">
            <a <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'class="nav-link px-3 active"' : '' ?> aria-current="page" href="<?= base_url('home');?>" class="nav-link px-3" >Home</a>

            <a <?= $this->uri->segment(1) == 'courseview' ? 'class="nav-link px-3 active"' : '' ?> class="nav-link px-3" href="<?= base_url('courseview');?>">Course List</a>

            <a <?= $this->uri->segment(1) == 'artikel' ? 'class="nav-link px-3 active"' : '' ?> class="nav-link px-3" href="<?= base_url('artikel');?>">Article</a>

            <a <?= $this->uri->segment(1) == 'jourconfeview' ? 'class="nav-link px-3 active"' : '' ?>class="nav-link px-3" href="<?= base_url('jourconfeview');?>">Journal & Conference</a>

            <a <?= $this->uri->segment(1) == 'aboutus' ? 'class="nav-link px-3 active"' : '' ?>class="nav-link px-3" href="<?= base_url('aboutus');?>">About Us</a>           
                <?php if (!$this->session->userdata('email')) : ?> 
                  <a class="nav-link account pt-2 fas fa-user mt-1" href="<?= base_url('auth');?>"> 
                    <span>Sign in</span>
                <?php else :?>
                <li class="nav-item dropdown me-3">
                  <a type="submit" class="nav-link account" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                  <?= $user['name']; ?>
                  <img class="img-profile rounded-circle ms-2" src="<?= base_url('assets/img/') . $user['image'];?>" height="25px" width="25px">
                <?php endif; ?>
                </a>
                <?php if ($this->session->userdata('role_id') == 1) : ?>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?= base_url('admin');?>">Dashboard</a></li>
                  <?php else : ?>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="<?= base_url('user');?>">Dashboard</a></li>
                  <?php endif; ?>
                  <li><a class="dropdown-item" href="<?= base_url('auth/logout');?>">Logout</a></li>
                </ul>
            </li>
          </div>
        </div>        
      </div>
    </header>
    <!-- End Navbar -->