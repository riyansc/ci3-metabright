
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Pesan Sukses -->
                            <?= $this->session->flashdata('message'); ?>
                            <h5>Role : <?php echo $role['role']; ?></h5>
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Access</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $m['menu']; ?></td>
                                <td>
                                    <div class="form-check">
                                      <input type="checkbox" class="form-check-input" <?php echo check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'];?>" data-menu="<?= $m['id'];?>">
                                    </div>
                                </td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="form-group">
                        <a href="<?= base_url('admin/role');?>" class="btn btn-secondary"><i class="fa fa-arrow-alt-circle-left"> </i>  Back</a>
                    </div>
            </div>
            <!-- End of Main Content -->
</div>
