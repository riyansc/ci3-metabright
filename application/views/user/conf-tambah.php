<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="container">
  <?php echo form_open_multipart('jourconfe/simpanconf');?>
      <div class="form-group row">
        <div class="col-lg-1">Judul</div>
        <div class="col-lg-11">
          <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Jurnal . . .">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-1">Gambar</div>
        <div class="col-lg-11">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image"" required>
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-1">Link</div>
        <div class="col-lg-11">
          <input type="text" name="link" id="link" class="form-control" placeholder="Masukan Link Registrasi Jurnal . . .">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-lg-1">Tanggal</div>
        <div class="col-lg-11">
          <input type="text" name="date" id="date" class="form-control" placeholder="Masukan Tanggal">
        </div>
      </div>
      <div class="form-group row justify-content-end">
        <div class="col-lg-3 text-right">
          <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
          <a href="<?php echo base_url('jourconfe'); ?>" class="btn btn-secondary"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
        </div>
      </div>
  </form>
  </div>
</div>
</div>