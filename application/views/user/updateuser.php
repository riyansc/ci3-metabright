<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
      <div class="col-lg-12">
        <?php echo form_open("user/updateSimpan", array('enctype'=>'multipart/form-data')); ?>
        <div class="form-group">
          <input type="hidden" name="id" id="id" value="<?php echo $tbl_user['id']; ?>">
        </div>
        <div class="form-group row">
          <div class="col-lg-1">Full Name</div>
          <div class="col-lg-11">
            <input type="text" class="form-control" id="name" name="name"value="<?= $tbl_user['name'];?>" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-1">Email</div>
          <div class="col-lg-11">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $tbl_user['email'];?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-1">Image</div>
          <div class="col-lg-2">
              <img src="<?= base_url('assets/img/') . $tbl_user['image']; ?>" class="img-thumbnail user-image" alt="">
            </div>
          <div class="col-lg-9">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-1">Status</div>
          <div class="col-sm-11">
            <select name="role_id" id="role_id" class="form-control">
              <?php foreach($role as $r) : ?>
                <?php if ($r['id'] == $tbl_user['role_id']) : ?>
              <option value="<?= $r['id'];?>" selected><?= $r['role']; ?></option>
                <?php else : ?>
              <option value="<?= $r['id'];?>"><?= $r['role']; ?></option>
                  <?php endif; ?>
                  <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
            <label class="form-check-label" for="is_active">
              Active?
            </label>
          </div>
        </div>
        <!-- </div> -->
        <div class="mx-auto">
        <a href="<?= base_url('user/daftaruser');?>" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-left"> </i> Close</a>
        <button type="submit" name="submit" id="submit" class="btn btn-primary"> <i class="fa fa-edit"></i> Update</button>
        </div>
    </form>
  </div>
</div>
</div>
</div>

     