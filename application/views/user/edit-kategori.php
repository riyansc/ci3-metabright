<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-sm-12">
      <form action="<?= base_url('informasi/editkategorisimpan'); ?>" method="post">
        <div class="form-group row">
          <input type="hidden" name="id" id="id" value="<?= $editkategori['id']; ?>">
          <label for="kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $editkategori['nama_kategori']; ?>">
          </div>
          <div class="col-sm-4">
            <a href="<?= base_url('informasi/kategori'); ?>" class="btn btn-secondary">back</a>
            <button class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>