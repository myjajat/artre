<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author jajat ismail
 * @copyright 2016 moegi
 */
 
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <meta http-equiv="content-type" content="text/html" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    
	<meta name="author" content="moegi" />
    <meta name="description" content="Modern outdoor apparel for adventurous living. Produk durable tanpa melupakan estetika. Harga terjangkau tanpa mengorbankan kualitas." />
    <meta name="keywords" content="artre, artre outgear, outdoor apprarel, #betteroutdoor, adventure, clothing, fieldwalker" />
    
    <title>Artre Outgear Outdoor Apparel</title>

	<link rel="shortcut icon" href="<? echo base_url('favicon.ico') ?>" />
    <link rel="stylesheet" href="<? echo base_url('bootstrap/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<? echo base_url('assets/css/p_style.css') ?>" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<? echo base_url('plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
</head>

<body>
<div class="container">
    <div class="logo">
        <a href="<? echo site_url('p/home'); ?>">
            <img src="<? echo base_url('assets/images/logo-text.png') ?>" height="170px" />
        </a>
    </div>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".top-nav" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs-block" href="#"></a>
        </div>
        <div class="collapse navbar-collapse top-nav">
            <ul class="nav">
                <li class="col-sm-2" id="mHOME"><a href="<? echo site_url('p/home') ?>">Home</a></li>
                <li class="col-sm-3" id="mABOUT"><a href="<? echo site_url('p/about') ?>">About</a></li>
                <li class="col-sm-2" id="mPRODUCTS"><a href="<? echo site_url('p/products') ?>">Products</a></li>
                <li class="col-sm-3" id="mSTORIES"><a href="<? echo site_url('p/stories') ?>">Stories</a></li>
                <li class="col-sm-2" id="mCONTACT"><a href="<? echo site_url('p/contact') ?>">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    <?
        if (isset($content)){
            echo $content;
        } else {
            echo "content not found!";
        }
    ?>
    
    <!-- Footer -->
    <div class="footer" >
        <div class="sosmed">
            <a href="#" target="_blank">
                <img src="<? echo base_url('assets/images/sosmed-tw.png') ?>"/>
            </a>
            <a href="https://www.instagram.com/artreoutgear/" target="_blank">
                <img src="<? echo base_url('assets/images/sosmed-ig.png') ?>"/>
            </a>
            <a href="https://www.facebook.com/artreoutgear" target="_blank">
                <img src="<? echo base_url('assets/images/sosmed-fb.png') ?>"/>
            </a>
            <div class="copyright pull-right">
                2016 Moegi Std.
            </div>
        </div>
    </div>
</div>

<script src="<? echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<? echo base_url('plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
<script src="<? echo base_url('assets/js/main.js') ?>"></script>
<script>
    $(function(){
        setMenuActive('<? echo strtoupper($this->uri->segment('2','')); ?>');
    });
</script>
</body>
</html>