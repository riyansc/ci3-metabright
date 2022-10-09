<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-8">
      <form action="<?= base_url('teacher/leveltambahsimpan');?>" method="POST">
        <div class="form-group row">
          <div class="col-lg-2">
            Level
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control" name="level" id="level">
          </div>
          <div class="col-lg-4">
            <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Save</button>
            <a href="<?= base_url('teacher/level');?>" class="btn btn-secondary"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>