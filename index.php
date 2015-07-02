<?php
require_once('_config.php');

$reqs = fn::reqs();

if($reqs[0]=='index') { fn::redirect(ext); }

$page1 = fn::get_data('page', $reqs[0]);
if($reqs[1]) { $page2 = fn::get_data('page', $reqs[1]); }
if($reqs[2]) { $page3 = fn::get_data('page', $reqs[2]); }

if($page3) $page = $page3;
elseif($page2) $page = $page2;
else $page = $page1;

if($page && empty($page['template'])) { $page['template'] = 'page.php'; }
if(empty($page['meta_title'])) { $page['meta_title'] = $page['title']; }

$base = int.ext.templates;
$real = $base.$page['url'].'.php';
$temp = $base.$page['template'].'.php';
$fourohfour = $base.'404.php';


fn('page.meta_title', $page['meta_title']);
fn('page.meta_description', $page['meta_description']);
fn('page.meta_keywords', $page['meta_keywords']);

if(file_exists($real) && !is_dir($real)):
	require_once($real);
elseif(file_exists($temp) && !is_dir($temp)):
	require_once($temp);
else:
	require_once($fourohfour);
endif;

fn('site.header');
fn('site.footer');
