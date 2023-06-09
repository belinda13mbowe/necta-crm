<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRM - NECTA </title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/login/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/login/css/animate.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/login/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/sweetalert2/package/dist/sweetalert2.css">
        <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/images/logo-mini.png" />
        <style>
            /*.rotate {*/
                /*animation: rotation 14s infinite linear;*/
            /*}*/

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
                <img class="rotate" src="<?php echo base_url();?>public/assets/images/logo-mini.png" style="height:150px;width:150px;">
                <form class="m-t" role="form" action="javascript:login()">
                    <!--h2 style="color: white;font-weight:bold">SIMS</h2-->
                    <h3 style="color: #2da439;font-weight: 900;">CRM NECTA</h3>
                    <div class="form-group"  style="margin-top: 15px;">
                        <input type="email" id="txt_identity" class="form-control" placeholder="Username" value="" autocomplete="off" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" id="txt_pwd" class="form-control" placeholder="Password" value="" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b" style="background-color: #2da439;">Login</button>
                </form>
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
