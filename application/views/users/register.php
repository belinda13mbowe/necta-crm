<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRM</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/login/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/login/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/login/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/sweetalert2/package/dist/sweetalert2.css">
        <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/images/logo-mini.png" />
        <style>
            .rotate {
                animation: rotation 14s infinite linear;
            }

            @keyframes rotation {
                from {
                    -webkit-transform: rotate(0deg);
                    -moz-transform: rotate(0deg);
                    -o-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                to {
                    -webkit-transform: rotate(359deg);
                    -moz-transform: rotate(359deg);
                    -o-transform: rotate(359deg);
                    transform: rotate(359deg);
                }
            }
        </style>
    </head>

    <body style="background-color:white;padding:20px !important">
        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div style="padding-top: 60px;">
                <form class="m-t" role="form" action="javascript:login()">
                    <h3 style="color: #2da439;font-weight: 900;">USER REGISTRATION</h3>
                    <div class="form-group"  style="margin-top: 0;">
                        <input type="full_name" id="txt_name" class="form-control" placeholder="Full Name" value="" autocomplete="off" required="">
                    </div>
                    <div class="form-group"  style="margin-top: 0;">
                        <input type="p_number" id="txt_name" class="form-control" placeholder="Phone Number" value="" autocomplete="off" required="">
                    </div>
                    <div class="form-group"  style="margin-top: 0;">
                        <input type="address" id="txt_name" class="form-control" placeholder="P.O.Box address" value="" autocomplete="off" required="">
                    </div>
                    <div class="form-group"  style="margin-top: 0;">
                        <input type="email" id="txt_name" class="form-control" placeholder="Email" value="" autocomplete="off" required="">
                    </div>
                    <div class="form-group"  style="margin-top: 0;">
                        <input type="password" id="txt_name" class="form-control" placeholder="Password" value="" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" id="txt_pwd" class="form-control" placeholder="Repeat Password" value="" required="">
                    </div>
                    <button type="submit" onclick="login.php" class="btn btn-primary block full-width m-b" style="background-color: #2da439;">Register</button></a>
<!--                    Or &nbsp; <span style="color: #2da439;font-weight: bold;">Login</span>-->
                </form>
                <a href="<?php echo base_url(); ?>Login"  class="btn btn-primary block full-width m-b" style="background-color: #2da439;">Login</a>

            </div>
        </div>

        <span id="url" style="display: none"><?php echo base_url();?></span>

        <script src="<?php echo base_url();?>public/assets/login/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/login/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>public/assets/login/js/bootstrap.js"></script>
        <script src="<?php echo base_url();?>public/assets/data/users.js"></script>
        <script src="<?php echo base_url();?>public/assets/sweetalert2/package/dist/sweetalert2.js"></script>
    </body>
</html>
