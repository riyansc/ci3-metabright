
<!-- Begin Page Content --> 
<div class="container-fluid">

<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
      <div class="col-lg-12">
        <?php echo form_open("user/tambahuser", array('enctype'=>'multipart/form-data')); ?>
            <div class="form-group row">
              <div class="col-lg-1">Nama</div>
              <div class="col-lg-11">
                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                <?= form_error('name','<small class="text-danger pl-3">','</small>');?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-lg-1">Email</div>
              <div class="col-lg-11">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-lg-1">Foto</div>
              <div class="col-lg-11">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose File</label>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-lg-1">Password</div>
              <div class="col-lg-11">
                <div class="row">
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                    <?= form_error('password2','<small class="text-danger pl-3">','</small>');?>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-lg-1">Status</div>
              <div class="col-lg-11">
                <select name="role_id" id="role_id" class="form-control">
                    <?php foreach($role as $r) : ?>
                      <option value="<?= $r['id'];?>"><?= $r['role']; ?></option>
                      <?php endforeach; ?>
                </select>
              </div>
            </div>
            
            <div class="form-group row justify-content-end">
              <div class="col-lg-2 text-center">
                <button type="submit" name="submit" id="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>

                <a href="<?= base_url('user/daftaruser');?>" type="button" class="btn btn-secondary"><i class="fa fa-arrow-alt-circle-left"> </i> Close</a>              
              </div>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>