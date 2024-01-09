<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- <link rel="shortcut icon" href="images/favicon_1.ico"> -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>uploads/logo3.png">

        <title>MAC - Admin</title>

        <!-- Base Css Files -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?php echo base_url() ?>assets/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?php echo base_url() ?>assets/css/waves-effect.css" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="<?php echo base_url() ?>assets/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="<?php echo base_url() ?>assets/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />
                  <!-- DataTables -->
        <link href="<?= base_url() ?>assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <!-- CKEditor CDN -->
        <!-- <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
        <script src="//cdn.ckeditor.com/4.13.1/basic/ckeditor.js"></script>
        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script> -->

        <script src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?= base_url()?>assets/js/modernizr.min.js"></script>
        
    </head>



    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php
            $this->load->view('common/nav_bar');
            ?>

            <?php
            $this->load->view('common/side_bar');
            ?>
            <?php
            $this->load->view($page_content);
            ?>
            <?php
            $this->load->view('common/right_bar');
            ?>
        </div>
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
     
        <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/chat/moment-2.2.1.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-detectmobile/detect.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-blockui/jquery.blockUI.js"></script>

        <!-- sweet alerts -->
        <script src="<?php echo base_url() ?>assets/assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/sweet-alert/sweet-alert.init.js"></script>

        <!-- flot Chart -->
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.time.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- Counter-up -->
        <script src="<?php echo base_url() ?>assets/assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>

        <!-- Dashboard -->
        <script src="<?php echo base_url() ?>assets/js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="<?php echo base_url() ?>assets/js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="<?php echo base_url() ?>assets/js/jquery.todo.js"></script>




       

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
    
    </body>
</html>