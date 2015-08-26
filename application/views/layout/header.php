<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="<?= base_url('assets/images/favicon.ico') ?>" type="image/x-icon" rel="shortcut icon">
    <title><?= ucwords($data['title']). " - One-stop platform for hiring creative arts talent in Indonesia | 8bulbs.co" ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?= base_url('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet">
	<!-- My Style -->
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <!-- showcase-->
    <link href="<?= base_url('assets/css/showcase/demo.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/showcase/component.css') ?>" rel="stylesheet">
    <!-- slider -->
    <link href="<?= base_url('assets/css/slider/slider.css') ?>" rel="stylesheet">
    <!-- select -->
    <link href="<?= base_url('assets/css/select/bootstrap-select.css') ?>" rel="stylesheet" type="text/css" >
 
 	 <script type="text/javascript" src="<?= base_url('assets/js/slider/jssor.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/slider/jssor.slider.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/slider/slider.js') ?>"></script>
   	
     
  </head>

  <body role="document">
  
<div class="col-md-12" style="padding:0px; ">
<div class="col-md-9" style="padding:0px; ">
<div class="navbar navbar-default navbar-static-top" role="navigation">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
          <a class="navbar-brand" href="<?=site_url('')?>"> <img src="<?php echo base_url('assets/images/logo.png'); ?>" /></a>
        </div>
        <div class="navbar-collapse collapse" style="float:right">
         
         <ul class="nav navbar-nav">
            <li class="active"><a href="<?=site_url('showcase')?>">Showcase</a></li>
            <li><a href="<?=site_url('creative')?>">creatives</a></li>
            <li><a href="<?=site_url('news')?>">News</a></li>
            <li><a href="<?=site_url('workshop')?>">Workshop</a></li>
            
          </ul>
          
        </div><!--/.nav-collapse -->
     
    </div>
</div>

<div class="col-md-3" style="padding:0px;">
	<div class="navbar navbar-default navbar-static-top" role="navigation" style="background:#2a5da8">
     	
        <?php
		if($this->session->userdata('user_id')){
        $data_user = $this->access->get_data_user($this->session->userdata('user_id'));
		?>
        <ul class="nav navbar-nav">
            <li><a href="<?=site_url('profile/?id='.$this->session->userdata('user_id'))?>">Hi, <?= $data_user['user_name'] ?></a></li>
            <li><a href="<?=site_url('profile/logout')?>">Logout</a></li>
          </ul>
        <?php
		}else{
		?>
         <ul class="nav navbar-nav">
            <li><a href="<?=site_url('login')?>">Login / Sign up</a></li>
            
          </ul>
     	<?php
		}
		?>
    </div>
</div>
</div>

<div class="main_content">

   