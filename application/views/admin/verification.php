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
                            <h4 class="page-title">REGISTRATION REQUEST DASHBOARD</h4>
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
                                            <table id="data" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
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
<script>
    var table = null;

    $(document).ready(function() {
        table = $("#data").DataTable({
            pageLength: 15,
            language: {search: "", searchPlaceholder: "Search..."},
            responsive: true,
            serverSide:true,
            searching:true,
            ordering:false,
            processing:true,
            ajax: {url: $("#base_url").html() + 'UsersList/data', type: 'post'},
            columns: [
                {data: "extension", defaultContent: ''},
                {data: "name", defaultContent: ''},
                {data: "phone", defaultContent: ''},
                {data: "email", defaultContent: ''},
                {data: "address", defaultContent: ''},
                {data: "action", defaultContent: ''}
            ]
        });

        $('.dataTables_filter input').addClass("form-control").css("font-size", "12px");

        $.fn.dataTable.ext.errMode = 'none';
    });
</script>
</body>
</html>s