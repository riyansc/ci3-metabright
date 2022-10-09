<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php echo form_open_multipart('teacher/editTeacherSimpan');?>
    <div class="form-group row">
      <div class="col-lg-2">Nama Pengajar</div>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="pengajar" id="pengajar" value="<?= $teacher['pengajar']?>">
          <input type="hidden" class="form-control" name="id" id="id" value="<?= $teacher['id']?>" readonly>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Deskripsi</div>
      <div class="col-lg-10">
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"><?= $teacher['deskripsi'] ?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2">Level</div>
        <div class="col-sm-10">
            <select name="level" id="level" class="form-control">
              <?php foreach($level as $data) : ?>
                <?php if ($data['id_level'] == $teacher['level']) : ?>
              <option value="<?= $data['id_level'];?>" selected><?= $data['level_name']; ?></option>
                <?php else : ?>
              <option value="<?= $data['id_level'];?>"><?= $data['level_name']; ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
            </select>
          </div>
        </div>
    <div class="form-group row">
      <div class="col-lg-2">Image</div>
      <div class="col-lg-4">
        <img src="<?= base_url('assets/img/pengajar/'. $teacher['image'])?>" alt="" class="img-thumbnail">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2"></div>
      <div class="col-sm-6">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image" name="image" required>
          <label class="custom-file-label" for="image">Choose File</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-lg-3 offset-2">
          <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Save</button>
          <a href="<?= base_url('teacher')?>" class="btn btn-secondary"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
        </div>
      </div>
    </div>
  </form>
</div>
</div>