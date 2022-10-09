<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php echo form_open_multipart('course/materitambah ');?>
  <input type="hidden" name="id_kursus" id="id_kursus" value="<?= $id_kursus['id']?>">
  <div class="form-group row">
    <div class="col-lg-2">Kursus</div>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="kursus" id="kursus" value="<?=$id_kursus['judul']?>" readonly>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-lg-2">Judul Materi</div>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Materi.." required>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-lg-2">Deskripsi</div>
    <div class="col-lg-10">
      <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-lg-2">File Materi</div>
    <div class="col-lg-10">
      <div class="custom-file">
          <input type="file" class="custom-file-input" id="file" name="file" required>
          <label class="custom-file-label" for="file">Choose file</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-lg-2">Media Pembelajaran</div>
    <div class="col-lg-4">
      <select name="media" id="media" class="form-control">
        <option value="Zoom">Zoom</option>
        <option value="E-Book">E-Book</option>
        <option value="Video">Video</option>
      </select>
    </div>
  </div>
  <div class="form-group row justify-content-end">
    <a href="<?= base_url('course/materi/' . $id_kursus['id'])?>" class="btn btn-secondary">Kembali</a>
    <button class="btn btn-primary mx-3" type="submit">Simpan</button>
  </div>
</form>
</div>
</div>