<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<link id="bs-css" href="<?=$css ?>/bootstrap-cerulean.css" rel="stylesheet">
	<link href="<?=$css ?>/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?=$css ?>/charisma-app.css" rel="stylesheet">
	<link href="<?=$css ?>/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?=$css ?>/fullcalendar.css' rel='stylesheet'>
	<link href='<?=$css ?>/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?=$css ?>/chosen.css' rel='stylesheet'>
	<link href='<?=$css ?>/uniform.default.css' rel='stylesheet'>
	<link href='<?=$css ?>/colorbox.css' rel='stylesheet'>
	<link href='<?=$css ?>/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?=$css ?>/jquery.noty.css' rel='stylesheet'>
	<link href='<?=$css ?>/noty_theme_default.css' rel='stylesheet'>
	<link href='<?=$css ?>/elfinder.min.css' rel='stylesheet'>
	<link href='<?=$css ?>/elfinder.theme.css' rel='stylesheet'>
	<link href='<?=$css ?>/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?=$css ?>/opa-icons.css' rel='stylesheet'>
	<link href='<?=$css ?>/uploadify.css' rel='stylesheet'>
	<style type="text/css">
	body { padding-bottom: 40px; }
	.chzn-single {height: 28px;}
	li.nav-header {font-size: 13px; padding: 8px 12px; margin: 0px; cursor: pointer;}  	
	.sidebar-nav { padding: 9px 0; }
	.center {text-align: center;}
  	.right {text-align: right;}
  	.left {text-align: left;}
  	.box {margin-top: 0px;}
  	.required {color: #ff0000;}
  	.request {display: inline-block; margin: 0 0 0 10px; color: red;}
  	a.tab {color: #555555; cursor: pointer; margin: 0 10px;}
  	a.tab-current {color: #369bd7; text-decoration: underline;}
  	div.uploader { width: 191px;}
	</style>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?=$img?>/favicon.ico">
		
</head>

<body>
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html" style="padding:2px 20px;"> <img alt="Charisma Logo" src="<?=$img?>/logo.jpg" style="width:110px;height:42px;" /> </a>
				
				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> 更换主题</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> 经典</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> 蔚蓝</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> 电子</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> 重染</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> 期刊</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> 简约</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> 板岩</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> 太空</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> 明快</a></li>
					</ul>
				</div>
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> 管理员</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?=base_url()?>user/info">个人信息</a></li>
						<li class="divider"></li>
						<li><a href="<?=base_url()?>user/modifyPassword">修改密码</a></li>
						<li class="divider"></li>
						<li><a href="<?=base_url()?>site/logout">退出</a></li>
					</ul>
				</div>
				<div class="top-nav pull-right" >
					<ul class="nav">
						<li><a href="#" style="border:0px;"><?=$username?></a></li>
						<li><a href="<?=base_url()?>site/logout" style="border:0px;">退出</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				<div class="top-nav nav-collapse">
					<ul class="nav">
						
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
			<!-- left menu starts -->
			<div class="span2 main-menu-span" style="width:11%">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<!--<li class="nav-1-child"><a class="ajax-link" href="table.html"><span class="hidden-tablet"><i class="icon-home"></i> 仪表板</span></a></li>-->
						<?php 
						foreach ($naviList as $navi) { 	
							$id = $navi['level1']['id'];
						?>
							<li id="nav-<?=$id?>" class="nav-header hidden-tablet" ><i class="icon-align-justify"></i> <?=$navi['level1']['name']?></li>	
						<?php
							foreach ($navi['level2'] as $naviChild) { 	
						?>
							<li class="nav-<?=$id?>-child"><a class="ajax-link" href="<?=base_url().$naviChild['url']?>"><span class="hidden-tablet"> <?=$naviChild['name']?></span></a></li>
						<?php 
							} 
						} 
						?>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10" style="width:89%">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10" style="width:87%;margin-left:1.4%;">
			<!-- content starts -->
			<?php } ?>
