<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-12">
      <?php echo form_open_multipart('informasi/editInformasiSimpan');?>
        <div class="form-group row">
          <input type="hidden" id="id" name="id" value="<?= $edit['id'];?>">
          <label for="judul" class="col-sm-2 col-form-label">Judul Konten</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $edit['judul']; ?>" required>
            
          </div>
          <div class="col-sm-2">
            <select name="kategori" id="kategori" class="form-control" required>
              <option value="Kategori">Kategori</option>
              <?php foreach($kategori as $ktg) : ?>
                <?php if($ktg['id']==$edit['kategori']): ?>
                  <option value="<?= $ktg['id'];?>" selected><?php echo $ktg['nama_kategori']; ?></option>
                <?php else: ?>
                  <option value="<?= $ktg['id'];?>"><?php echo $ktg['nama_kategori']; ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-2">Gambar Konten</div>
            <div class="col-sm-2">
            <img src="<?= base_url('assets/img/informasi/'. $edit['image']); ?>" alt="" height="200px" width="200px" class="img-thumbnail">
            </div>
              <div class="col-lg-8">            
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-2">Konten</div>
              <div class="col-sm-10">
                <textarea id="ckeditor" name="ckeditor" required aria-valuetext=""><?php echo $edit['konten']; ?></textarea>
                <?= form_error('ckeditor','<small class="text-danger pl-3">','</small>');?>
              </div>
          </div>
           <div class="form-group row">
              <div class="col-sm-2">Status</div>
                <div class="col-sm-10">
                  <select name="status" id="status" class="form-control" required>
                  <option value="">Select Item</option>
                  <?php foreach($status as $st) : ?>
                    <?php if($st['id'] == $edit['status']) : ?>
                      <option value="<?= $st['id'];?>" selected><?php echo $st['status']; ?></option>
                    <?php else : ?>
                      <option value="<?= $st['id'];?>"><?php echo $st['status']; ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  </select>
                </div>
            </div>
            <div class="form-group row justify-content-end">
              <div class="col-lg-2 text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo base_url('informasi/daftarinformasi'); ?>" class="btn btn-secondary">Back</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
                <!-- /.container-fluid -->
</div>