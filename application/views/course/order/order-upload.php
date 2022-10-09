<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php echo form_open_multipart('order/uploadBukti');?>
    <input type="hidden" class="form-control" name="id" id="id" value="<?= $checkout['id']?>">
    <div class="form-group row">
      <div class="col-sm-2">Confirm Payment</div>
      <div class="col-sm-10">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="image" name="image" >
          <label class="custom-file-label" for="image">Choose File</label>
        </div>
      </div>
    </div>
    <div class="form-group row justify-content-end">
      <a href="<?= base_url('order/pembayaran')?>" class="btn btn-secondary ">Back</a>
      <button type="submit" class="btn btn-primary mx-3">Upload</button>
    </div>
  </form>
</div>
</div>
