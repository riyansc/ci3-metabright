<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
   </div>
   <table class="table table-border">
    <thead class="thead-dark">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nomor</th>
        <th>Pesan</th>
        <th>Kursus</th>
        <th>Tagihan</th>
        <th>Bukti</th>
        <th>Status</th>
        <th>Tanggal</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; ?>
      <?php foreach($checkout as $data): ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $data['nama'] ?></td>
          <td><?= $data['nomor'] ?></td>
          <td><?= $data['pesan'] ?></td>
          <td><?= $data['kursus'] ?></td>
          <td>
            <span class="badge badge-primary"><?= $data['tagihan_status'] ?></span>
          </td>
          <?php if($data['image']===null): ?>
            <td>0</td>
            <?php else : ?>
              <td><img src="<?= base_url('assets/img/checkout/Bukti/' . $data['image']); ?>" alt="" class="" height="100px"></td>
            <?php endif; ?>
          <td>
            <span class="badge badge-warning"><?= $data['status_name'] ?></span>
          </td>
          <td><?= date('d-M-Y',$data['date']); ?></td>
          <td>
            <a href="<?= base_url('order/approved/'.$data['id']);?>" class="btn btn-success btn-sm" onclick="return confirm('Terima Transaksi');">Approved</a>
            <a href="<?= base_url('order/disapproved/'.$data['id']);?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Batalkan Transaksi?');">Disapproved</a>
          </td>
        </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
   </table>
</div>
</div>