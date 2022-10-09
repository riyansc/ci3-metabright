<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> > <?= $id_kursus['judul']?></h1>
  <div class="row">
    <p>
        <a href="<?= base_url('course/materitambah/'.$id_kursus['id']); ?>" class="btn btn-primary mx-3"><i class="fas fa-fw fa-plus"></i> Tambah Materi</a>
        <input type="hidden" value="<?= $id_kursus['id'];?>">
    </p>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-border">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Materi</th>
            <th>Media</th>
            <th>Tanggal</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach($materi as $data): ?>
            <?php if($data['id_kursus']==$id_kursus['id']): ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $data['judul'] ?></td>
              <td><?= $data['file'] ?></td>
              <td><span class="badge badge-warning"><?= $data['media'] ?></span></td>
              <td><?= date('d-M-Y',$data['date']) ?></td>
              <td>
                <a href="" class="btn btn-secondary btn-sm mt-1"> <i class="fa fa-search"></i> Detail</a>
                <a href="" class="btn btn-success btn-sm mt-1"> <i class="fa fa-edit"></i> Edit</a>
                <a href="<?= base_url('course/hapusMateri/' . $data['id']);?>" class="btn btn-danger btn-sm mt-1"> <i class="fa fa-trash"></i> Hapus</a>
              </td>
            </tr>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php $i++; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>