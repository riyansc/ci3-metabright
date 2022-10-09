<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-8">
      <form action="<?= base_url('course/kategoritambah');?>" method="POST">
        <div class="form-group row">
          <div class="col-lg-2">
            Category
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control" name="kategori" id="kategori">
            <?= form_error('kategori','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="col-lg-4">
            <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Save</button>
            <a href="<?= base_url('course/kategori');?>" class="btn btn-secondary"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>