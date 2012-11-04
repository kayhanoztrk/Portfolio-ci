
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Yönetim Paneli</title>
	<link rel="stylesheet" href="<?php echo public_url();?>/admin/css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="<?php echo public_url();?>/admin/ckeditor/ckeditor.js"></script>

	<script src="<?php echo public_url();?>/admin/ckeditor/sample.js" type="text/javascript"></script>
	<link href="<?php echo public_url();?>/admin/ckeditor/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Header -->
   
	
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">Yönetim Paneli</a></h1>
			<div id="top-navigation">
				Hoşgeldin <?php echo $this->session->userdata('username');?> &nbsp
				<?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/admin/logout','Çıkıs yap');?>
				<span>|</span>
				
				<?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/admin/change','Sifre Degistir'); ?>
				<?php echo anchor(base_url().'index.php/index/','Siteyi Gör',array('target'=>'__blank'));?>
			<!--	<a href="change.php">Sifre Değiştir</a> -->
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			 
			
			  
				<li><?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/admin/admin_panel','<span>Özgeçmis</span>',array('class'=>'active'));?></li>
				<li><?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/about','<span>Hakkımda</span>',array('class'=>'active'));?></li>
				<li><?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/blog','<span>Blog</span>',array('class'=>'active'));?></li>
				<li><?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/project','<span>Projeler</span>',array('class'=>'active'));?></li>
			    <li><?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/contact/','<span>İletisim</span>',array('class'=>'active'));?></li>
                <li><?php echo anchor(base_url().'index.php/'.basename(dirname(dirname(__FILE__))).'/settings/','<span>Ayarlar</span>',array('class'=>'active'));?></li>
			
			   
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
	