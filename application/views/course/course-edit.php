<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php echo form_open_multipart('course/courseEditSimpan');?>
    <div class="form-group row">
      <div class="col-lg-2">Course</div>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="judul" id="judul" placeholder="Course Name" value="<?= $kursus['judul']?>">
        <input type="hidden" class="form-control" name="id" id="id" placeholder="Course Name" value="<?= $kursus['id']?>">
        <?= form_error('judul','<small class="text-danger pl-3">','</small>');?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Logo</div>
      <div class="col-lg-2">
        <img src="<?= base_url('assets/img/course/'. $kursus['logo'])?>" alt="" class="logo-kursus">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2"></div>
      <div class="col-lg-4">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="logo" name="logo" >
          <label class="custom-file-label" for="image">Choose File</label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Category</div>
      <div class="col-lg-10">
        <select name="kategori" id="kategori" class="form-control" >
        <option value="">Select Category</option>
          <?php foreach($kategori as $data): ?>
            <?php if($data['id'] == $kursus['kategori']): ?>
            <option value="<?= $data['id']?>" selected><?= $data['nama_kategori']?></option>
            <?php else : ?>
              <option value="<?= $data['id']?>"><?= $data['nama_kategori']?></option>
              <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <?= form_error('kategori','<small class="text-danger pl-3">','</small>');?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Level</div>
      <div class="col-lg-10">
        <select name="level" id="level" class="form-control">
        <option value="">Select Level</option>
          <?php foreach($level as $data): ?>
            <?php if($data['id'] == $kursus['level']): ?>
            <option value="<?= $data['id']?>" selected><?= $data['level_name']?></option>
            <?php else : ?>
              <option value="<?= $data['id']?>"><?= $data['level_name']?></option>
              <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <?= form_error('level','<small class="text-danger pl-3">','</small>');?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Description</div>
      <div class="col-lg-10">
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control" placeholder="Deskripsi Course"><?= $kursus['deskripsi'] ?></textarea>
        <?= form_error('deskripsi','<small class="text-danger pl-3">','</small>');?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Instructor</div>
      <div class="col-lg-10">
        <select name="pengajar" id="pengajar" class="form-control" >
          <option value="">Select Instructor</option>
          <?php foreach($pengajar as $data): ?>
            <?php if($data['id'] == $kursus['pengajar']): ?>
            <option value="<?= $data['id']?>" selected><?= $data['pengajar']?></option>
            <?php else: ?>
              <option value="<?= $data['id']?>"><?= $data['pengajar']?></option>
              <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <?= form_error('pengajar','<small class="text-danger pl-3">','</small>');?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Price</div>
      <div class="col-lg-4">
          <input type="text" class="form-control" name="harga" id="harga" value="<?= $kursus['harga']?>">
          <?= form_error('harga','<small class="text-danger pl-3">','</small>');?>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-lg-2">Status</div>
      <div class="col-lg-10">
        <select name="status" id="status" class="form-control" >
          <option value="">Select Status</option>
          <?php foreach($status as $data): ?>
            <?php if($data['id'] == $kursus['status']): ?>
            <option value="<?= $data['id']?>" selected><?= $data['status_name']?></option>
            <?php else: ?>
              <option value="<?= $data['id']?>" ><?= $data['status_name']?></option>
              <?php endif; ?>
          <?php endforeach; ?>
        </select>
        <?= form_error('status','<small class="text-danger pl-3">','</small>');?>
      </div>
    </div>
    <div class="form-group">
      <div class="row justify-content-end text-right">
        <div class="col-lg-3">
          <button class="btn btn-primary" type="submit"> <i class="fa fa-save"></i> Update</button>
          <a href="<?= base_url('course')?>" class="btn btn-secondary"> <i class="fa fa-arrow-alt-circle-left"></i> Back</a>
        </div>
      </div>
    </div>
  </form> 
</div>
</div>