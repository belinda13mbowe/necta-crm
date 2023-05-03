<!DOCTYPE html>
<html lang="en">
    <head>
        <?php if(isset($top)){echo $top;} ?>
    </head>
    <body>
        <div class="container-srcoller">
            <div class="container-fluid" style="padding: 10px;border-bottom: 2px solid #2da439;">
                <div class="row">
                    <div class="col-md-12" style="color: #2da439;text-align: center;">
                        <img src="<?php echo base_url();?>public/assets/images/logo-mini.png" style="height: 50px;float: left;"/>
                        <h4 style="margin-top: 14px;font-weight: bold;">CRM-NECTA</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="container" style="display: flex;align-items: center;justify-content: center;height: calc(100vh - 180px);">
                        <div class="row">
                            <div class="col-md-4" style="text-align: center; padding: 30px">
                                <table style="width: 100%;text-align: center;">
                                    <tr><td><a href="<?php echo base_url(); ?>Register" class="fa fa-address-book" style="font-size: 6em;color: green;"></a></td></tr>
                                    <tr><td>Registration</td></tr>
                                </table>
                            </div>
                            <div class="col-md-4" style="text-align: center;padding: 30px;">
                                <table style="width: 100%;text-align: center;">
                                    <tr><td><a href="<?php echo base_url(); ?>Register" class="fa fa-file" style="font-size: 6em;color: green;"></a></td></tr>
                                    <tr><td>Certification</td></tr>
                                </table>
                            </div>
                            <div class="col-md-4" style="text-align: center;padding: 30px;">
                                <table style="width: 100%;text-align: center;">
                                    <tr><td><a href="<?php echo base_url(); ?>Register" class="fa fa-file-pdf-o" style="font-size: 6em;color: green;"></a></td></tr>
                                    <tr><td>Verification</td></tr>
                                </table>
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
    </body>
</html>