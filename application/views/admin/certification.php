<!DOCTYPE html>
<html lang="en">
<head>
    <?php if(isset($top)){echo $top;} ?>
</head>
<body>
<div class="container-srcoller">
    <?php if(isset($nav)){echo $nav;} ?>

    <div class="container-fluid page-body-wrapper">
        <?php if(isset($admin)){echo $admin;} ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Page Title Header Starts-->
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">ADMIN'S DASHBOARD</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-toolbar">
                        </div>
                    </div>
                </div>
                <!-- Page Title Header Ends-->

                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table align-middle mb-0 bg-white">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($userlist !== null) {
                                                    $count = count($userlist);}
                                                { ?>
                                                    <tr>
                                                        <td><?php if(isset($userlist)){echo $userlist[$i]->user_name; } ?></td>
                                                        <!--                                                        <td>--><?php //echo $userlist[$i]->user_name; ?><!--</td>-->
                                                        <!--                                                        <td>--><?php //echo $userlist[$i]->user_email; ?><!--</td>-->
                                                        <!--                                                        <td>--><?php //echo $userlist[$i]->user_phone; ?><!--</td>-->
                                                        <!--                                                        <td>--><?php //echo $userlist[$i]->user_surname; ?><!--</td>-->
                                                    </tr>
                                                <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <span id="base_url" style="display: none"><?php echo base_url();?></span>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php if(isset($footer)){echo $footer;} ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-srcoller -->
<?php if(isset($bottom)){echo $bottom;} ?>

<script src="<?= base_url();?>public/assets/data/users.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url() ?>public/assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="<?= base_url() ?>public/assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.reorder.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.buttons.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.responsive.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.pdfmake.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.buttons.print.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.buttons.html5.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.buttons.flash.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.jszip.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/datatable.vfs_fonts.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url() ?>public/assets/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/responsive.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>public/assets/datatables/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>public/assets/datatables/js/dataTables.select.min.js"></script>
</body>
</html>