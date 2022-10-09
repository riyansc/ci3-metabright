<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-8">
      <form action="<?= base_url('teacher/levelEditSimpan');?>" method="POST">
        <div class="form-group row">
          <div class="col-lg-2">
            Level
          </div>
          <div class="col-lg-6">
            <input type="text" class="form-control" name="level" id="level" value="<?= $level['level_name'] ?>">
            <input type="hidden" class="form-control" name="id" id="id" value="<?= $level['id_level'] ?>">
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