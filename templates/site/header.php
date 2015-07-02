<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title><?=fn('page.meta_title')?></title>
		<meta name="robots" content="<?=$page['c10']['index']?>">
		<link rel="canonical" href="<?=rtrim(site_url, '/').$page['int']?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?=fn('page.meta_description')?>">
		<meta name="keywords" content="<?=fn('page.meta_keywords')?>">
		<meta name="author" content="<?=$_SERVER['HTTP_HOST']?>" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Bitter:400italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<!--[if lte IE 8]>
			<link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.6.0/base-min.css&pure/0.6.0/grids-min.css&pure/0.6.0/grids-responsive-old-ie-min.css">
		<![endif]-->
		<!--[if gt IE 8]><!-->
			<link rel="stylesheet" href="http://yui.yahooapis.com/combo?pure/0.6.0/base-min.css&pure/0.6.0/grids-min.css&pure/0.6.0/grids-responsive-min.css">
		<!--<![endif]-->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
		<?php foreach(fn('page.styles') as $__inc): ?>
		<link rel="stylesheet" href="<?=$__inc?>" media="screen" type="text/css" />
		<?php endforeach; ?>
		<?=fn::get_header()?>
	</head>

<body class="<?=$page['title']?>">

<?php include_once("analyticstracking.php") ?>

<div class="bkg-sec color-white text-center banner border-box">
	<div class="l-container">
		<!--<nav>
		  <ul class="nav">
		    <?php $lis = fn::get_datas_with_tag('page', 1); foreach($lis as $li): ?>
		    <li><a <?=is_active($page, $li)?> href="<?=site_url?><?=$li['int']?>"><?=$li['title']?></a></li>
		    <?php endforeach; ?>
		  </ul>
		</nav>-->

		<span class="logo-text serif text-shadow">- Ruth Carr Racing -</span>
	</div>
</div>
