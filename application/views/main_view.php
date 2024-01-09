<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo ucwords($seo['meta_title']);?></title>
<link rel="canonical" href="<?= base_url() ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<link href="<?= base_url()?>admin/uploads/logo3.png" rel="icon">
<link rel="stylesheet" href="<?= base_url() ?>assets/templates/common-core/lib/bootstrap/css/bootstrapcfc9.css" type="text/css" />
<link rel="StyleSheet" href="<?= base_url() ?>assets/templates/common-core/css/corecfc9.css" type="text/css" />
<link rel="StyleSheet" href="<?= base_url() ?>assets/templates/common-core/css/owl.carousel.min.css" type="text/css" />
<link rel="StyleSheet" href="<?= base_url() ?>assets/templates/common-core/css/view_cart.css" type="text/css" />

<script src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?= base_url()?>assets/templates/common-core/js/owl.carousel.min.js"></script>
<link rel="stylesheet" type="../cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
<link href='zoomove-master/dist/zoomove.min.css' rel='stylesheet' type='text/css'>

<!-- sample fb meta -->
    <meta property="fb:app_id" content="" />
    <meta property="og:title" content="<?php echo ucwords($seo['meta_title']);?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:image" content="<?php echo base_url('admin/uploads/settings/'. $getsettings['header_logo']);?>" />
    <meta property="og:image:secure_url" content="<?php echo base_url('admin/uploads/settings/'. $getsettings['header_logo']);?>" />
    <meta property="og:image:width" content="417" />
    <meta property="og:image:height" content="333" />
    <meta property="og:description" content="<?php echo $seo['meta_description'];?>"/>
    <!-- sample twitter meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="Yentna - Find The Guides">
    <meta name="twitter:title" content="<?php echo ucwords($seo['meta_title']);?>">
    <meta name="twitter:description" content="<?php echo $seo['meta_description'];?>">
    <meta name="twitter:creator" content="@creator_username">
    <meta name="twitter:image" content="<?php echo base_url('admin/uploads/settings/'. $getsettings['header_logo']);?>">
    <meta name="twitter:domain" content="<?= base_url() ?>">
      

<!-- Flickity CSS -->

<!-- Flickity JavaScript -->


<style>
    .TSnav {
        float:right;
        position: relative;
    }
    /* Arrows */
    .slick-prev,
    .slick-next
    {
        font-size: 0;
        line-height: 0;

        position: absolute;
        top: 0%;

        display: block;

        width: 20px;
        height: 20px;
        padding: 0;
/*
        -webkit-transform: translate(0, -50%);
        -ms-transform: translate(0, -50%);
        transform: translate(0, -50%);
*/
        cursor: pointer;

        color: transparent;
        border: none;
        outline: none;
        background: transparent;
    }
    .slick-prev:hover,
    .slick-prev:focus,
    .slick-next:hover,
    .slick-next:focus
    {
        color: transparent;
        outline: none;
        background: transparent;
    }
    .slick-prev:hover:before,
    .slick-prev:focus:before,
    .slick-next:hover:before,
    .slick-next:focus:before
    {
        opacity: 1;
    }
    .slick-prev.slick-disabled:before,
    .slick-next.slick-disabled:before
    {
        opacity: .25;
    }

    .slick-prev:before,
    .slick-next:before
    {
        font-family: "fontello";
        font-size: 24px;
        line-height: 1;

        opacity: .75;
        color: #502701;

        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .slick-prev
    {
        left: -40px;
    }
    [dir='rtl'] .slick-prev
    {
        right: -0px;
        left: auto;
    }
    .slick-prev:before
    {
        content: '\f104';
    }
    [dir='rtl'] .slick-prev:before
    {
        content: '\f105';
    }

    .slick-next
    {
        right: 0px;
    }
    [dir='rtl'] .slick-next
    {
        right: auto;
        left: -40px;
    }
    .slick-next:before
    {
        content: '\f105';
    }
    [dir='rtl'] .slick-next:before
    {
        content: '\f104';
    }

    .modal-popagewrp{
}

.modal-open{
    padding-right:0 !important;
}

.modal-popagewrp .modal-dialog{
    width:400px;
    margin-top:12%
}

.modal-popagewrp .modal-content{
    border-radius:0
}

.modal-popagewrp #myModal{
    padding-right:0 !important;
}

.modal-popagewrp .modal-content .modal-header{
    text-align:center;
}

.modal-popagewrp .modal-content .modal-header .modal-title{
    font-size:22px;
    font-weight:bold
}

.modal-popagewrp .modal-body{
    padding:25px
}

.modal-text-loading .headingtop-modal{
    font-size: 16px;
    color: #19866d;
    font-weight: 500;
    line-height: 24px;
    margin-bottom:15px;
}

.modal-text-loading .form-group{
}

.modal-text-loading .form-group label{
    font-size:13px;
    margin-bottom: 0;
}


.modal-text-loading .form-group .form-control{
    height: 30px;
    box-shadow: none;
    border: none;
    outline: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0;
    padding: 0;
    font-size: 12px;
}

</style>
<link href='<?= base_url()?>assets/templates/common-core/lib/contentbuilder/minimalist-blocks/contentcfc9.css' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?= base_url() ?>assets/templates/cigarvenue-core/css/defaultcfc9.css" type="text/css" />


<link rel="stylesheet" href="<?= base_url() ?>assets/cookies_consent.css">

</head>
<body>




	<!-- Top Nav -->
<?php $this->load->view('common/top_nav') ?>

<!-- header -->
<?php $this->load->view('common/header') ?>

<!-- header menu -->

<?php $this->load->view('common/top_menu') ?>


<!-- body -->

<?php $this->load->view($page_content) ?>

<!-- footer -->

<?php 
// echo "<pre>";
// print_r($getsettings);
// exit;
?>


<?php $this->load->view('common/footer', $getsettings) ?>

<div id="cookieconsent_wrapper" style="display: none;">
   <div id="cookieconsent_innerwrapper">
      <h4 id="cookieconsent_header">This website uses cookies</h4>
      <div>This website uses cookies to improve user experience. By using our website you consent to all cookies in accordance with our <a href="cookies_policy.html" id="cookieconsent_policy">Privacy Policy.</a></div>
      <div id="cookieconsent_buttonswrapper">
         <button type="button" id="cookieconsent_accept" class="cookieconsent_buttons">I Understand</button>
      </div>
   </div>
</div>

<script src="<?=base_url() ?>assets/cookies_consent.js"></script>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal({
            backdrop:'static',
            keyboard:false
        });
    });
    $('#yes-button').on('click',function(){
        $('#myModal').modal('hide');
    });
    $('#no-button').on('click',function(){
        window.open('','_parent',''); 
       window.top.close();
    });
</script>


	


</body>
</html>