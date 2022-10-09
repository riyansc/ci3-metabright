
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    <!-- !-- // Notifikasi --> 
                    <?php if(validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert"> 
                    <?php echo validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <p>
                                <a class="btn btn-primary " href="<?php echo base_url('informasi/tambahinformasi'); ?>"">
                                    <i class="fa fa-plus"></i> Add New Informasi 
                                </a>
                                <a class="btn btn-warning" href="<?php echo base_url('informasi/kategori'); ?>"">
                                    <i class="fa fa-plus"></i> Kategori
                                </a>
                            </p>
                        </div>
                        <div class="col-md-4 offset-4">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search Artikel" name="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <table class="table table-bordered table-triped" id="table" name="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Image</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $start; ?>
                            <?php foreach ($daftarInformasi as $inf) : ?>
                            <tr>
                            <th scope="row"><?php echo ++$i; ?></th>
                            <td><?php echo $inf['judul']; ?><br><br><span class="badge badge-info">creator : <?= $inf['creator'];?></span></td>
                            <td><img src="<?= base_url('assets/img/informasi/') . $inf['image'];?>" class="img-thumbnail" height="50px" width="50px"></td>
                            <td><?php echo date('d-M-Y', $inf['date_created']); ?></td>
                            <td><?php echo $inf['nama_kategori']; ?></td>
                            <td>
                                <?php if($inf['status'] == 'Publish'): ?>
                                <span class="badge badge-primary"><?php echo $inf['status']; ?></span>
                                <?php else :?>
                                <span class="badge badge-danger"><?php echo $inf['status']; ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('informasi/detailInformasi/')?><?= $inf['id'];?>" class="btn btn-info btn-sm mb-2"> <i class="fa fa-search"></i> Detail</a>

                                <a href="<?= base_url('informasi/editInformasi/')?><?= $inf['id'];?>" class="btn btn-success btn-sm mb-2"> <i class="fa fa-edit"></i> Edit</a>

                                <a href="<?= base_url('informasi/hapusInformasi/' . $inf['id']);?>" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Yakin?');"> <i class="fa fa-trash"></i> Delete</a>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php $i = 1; ?>
                        </tbody>
                    </table>
                    <?php if($jumlah >= 5 ) : ?>
                    <?= $this->pagination->create_links(); ?>
                    <?php else : ?>
                    <?php endif; ?>
                    <script>
                        $(document).ready( function () {
                             $('table').DataTable();
                        } );
                    </script>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

