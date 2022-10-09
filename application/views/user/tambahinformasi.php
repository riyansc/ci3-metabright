<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-12">
      <?php echo form_open_multipart('informasi/tambahinformasi');?>
        <div class="form-group row">
          <label for="judul" class="col-sm-2 col-form-label">Judul Konten</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Konten">
            <?= form_error('judul','<small class="text-danger pl-3">','</small>');?>
          </div>
          <div class="col-sm-1 pt-2 text-center">
            Kategori
          </div>
          <div class="col-sm-2">
            <select name="kategori" id="kategori" class="form-control" required>
              <!-- <option value="Kategori">Kategori</option> -->
              <?php foreach($nama_kategori as $ktg) : ?>
              <option value="<?= $ktg['id'];?>"><?php echo $ktg['nama_kategori']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">Gambar Konten</div>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image" required>
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Konten</div>
              <div class="col-sm-10">
                <textarea id="ckeditor" name="ckeditor" required></textarea>
                <?= form_error('ckeditor','<small class="text-danger pl-3">','</small>');?>
              </div>
          </div>
           <div class="form-group row">
              <div class="col-sm-2">Status</div>
                <div class="col-sm-10">
                  <select name="status" id="status" class="form-control" required>
                  <!-- <option value="">Select Item</option> -->
                  <?php foreach($status as $st) : ?>
                  <option value="<?= $st['id'];?>"><?php echo $st['status']; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
            </div>
            <div class="form-group row justify-content-end">
              <div class="col-lg-2 text-right">
                <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
                <a href="<?php echo base_url('informasi/daftarinformasi'); ?>" class="btn btn-secondary"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
                <!-- /.container-fluid -->
</div>