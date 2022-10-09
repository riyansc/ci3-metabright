<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php echo form_open_multipart('teacher/teachertambah');?>
    <div class="form-group row">
      <div class="col-lg-2">Nama Pengajar</div>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="pengajar" id="pengajar">
        </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Deskripsi</div>
      <div class="col-lg-10">
      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Level</div>
      <div class="col-lg-4">
        <select name="level" id="level" class="form-control">
          <?php foreach($level as $data): ?>
          <option value="<?= $data['id_level']?>"><?= $data['level_name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Image</div>
      <div class="col-lg-10">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image" name="image" required>
          <label class="custom-file-label" for="image">Choose File</label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row justify-content-end">
        <div class="col-lg-3 text-right">
          <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Simpan</button>
          <a href="<?= base_url('teacher')?>" class="btn btn-secondary"> <i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
    </div>
  </form>
</div>
</div>