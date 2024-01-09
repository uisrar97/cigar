<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon_1.ico"> -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>uploads/logo3.png">

        <title>MAC - Admin LogIn</title>

        <!-- Base Css Files -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?php echo base_url() ?>assets/css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="<?php echo base_url() ?>assets/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> <strong>MR ANDERSONS CIGAR</strong> </h3>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal m-t-20" enctype="multipart/form-data" accept-charset="utf-8" role="form" action="<?php echo base_url() ?>validation" method="POST">
                    
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <label for="InputUserName">Username: </label>
                            <input type="text" name="username" class="form-control" id="InputUserName" placeholder="Enter Username ">
                            <?php echo form_error('username', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <label for="InputPassword">Password: </label>
                            <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Password">
                            <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                        </div>
                    </div>                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg w-lg waves-effect waves-light" name="save" value="upload">Log In</button>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
        <script>
            var resizefunc = [];
        </script>
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo base_url() ?>assets/jquery-detectmobile/detect.js"></script>
        <script src="<?php echo base_url() ?>assets/fastclick/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url() ?>assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>
    
    </body>
</html>