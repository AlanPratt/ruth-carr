<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$_SERVER['DOCUMENT_ROOT'] = '/srv/ruthcarr.com/public/htdocs/';
define('n', "\n");
define('r', "\r");
define('d', '/');
define('t', "\t");
define('br', '<br />');
define('int', $_SERVER['DOCUMENT_ROOT']);
define('ext', '/');
define('lib', 'lib/');
define('templates', 'templates/');
define('template', 'site');
define('site_key', 'p1943cnwu58rjdsoajsnke7cj');
define('site_secret', '01wnsqfweiuho0s09eifjaps00e');
define('logging', false);
define('site_id', 140);
define('site_url', 'http://ruthcarr.com.testing.bowdev.vm.bytemark.co.uk');
define('host', 'ruthcarr.com.testing.bowdev.vm.bytemark.co.uk/');
define('site_title', 'Ruth Carr Racing');
define('db_host', '213.129.84.44');
define('db_db', 'ruthcarr_cms');
define('db_user', 'ruthcarr_cms');
define('db_pass', '?^nkJR=Adre)');

session_start();

function pa($a) { echo '<pre>'; print_r($a); echo '</pre>'; }
function vd($v) { var_dump($v); }
function ok($t='', $m='', $r='')
{
	$arr = array('ok'=>array('type'=>$t, 'message'=>$m), 'rtn'=>$r);
	return $arr;
}

function error($t='', $m='', $r='')
{
	$arr = array('error'=>array('type'=>$t, 'message'=>$m), 'rtn'=>$r);
	return $arr;
}

function __autoload($c)
{
	$class = int.ext.lib.(string)$c;
	if(file_exists($class) && !is_dir($class)) require_once($class);
	else fn::error("_config.__autoload cannot find class '".$c."'", 'There was an error loading a required file.');
}

function site_init()
{
	$remote_ip = $_SERVER['REMOTE_ADDR'];

	$debug_ips = array('82.68.134.182');
	if(in_array($remote_ip, $debug_ips)) define('debug', true); else define('debug', false);

	$bh_ips = array('82.68.134.182');
	if(in_array($remote_ip, $bh_ips)) define('bh', true); else define('bh', false);
}

site_init();

//if(!debug) { fn::error('You do not have permission to access this site.'); }

function fn()
{
	global $page;
	$args = func_get_args();
	$method = $args[0];
	$opts = array_slice($args, 1);

	//quick methods
	$quick = trim(strtolower(str_replace(array(' ', '_', '-'), array('', '', ''), $method)));
	switch($quick):
	case 'load': case 'add':
		$key = $opts[0];
		$opts = array_slice($opts, 1);
		fn::add_object($key, $opts);
		return true;
	break;
	case 'isajax': return fn::is_ajax(); break;
	case 'isbh': case 'isoffice': case 'isbowhouse': return bh; break;
	case 'page.metatitle': return fn::data('page.meta_title', $args[1]); break;
	case 'page.metadescription': return fn::data('page.meta_description', $args[1]); break;
	case 'page.metakeywords': return fn::data('page.meta_keywords', $args[1]); break;
	case 'page.scripts': $scripts = fn::data('page.scripts'); if(!is_array($scripts)) $scripts = array();
		if($args[1]) { $scripts[] = $args[1]; } fn::data('page.scripts', $scripts); return $scripts;
	break;
	case 'page.styles': $styles = fn::data('page.styles'); if(!is_array($styles)) $styles = array();
		if($args[1]) { $styles[] = $args[1]; } fn::data('page.styles', $styles); return $styles;
	break;
	case 'site.header': require_once(int.ext.templates.template.'/header.php'); return; break;
	case 'site.footer': require_once(int.ext.templates.template.'/footer.php'); return; break;
	endswitch;

	$ps = explode('.', $method); $newopts = $opts[0];

	return fn::call_object($ps[0], $ps[1], $opts);
}

fn('add', 'db', new mysql(db_host, db_db, db_user, db_pass));
if(!fn('db.connected')) { fn::error('Could not connect to database.'); }

//fn('page.styles', ext.'js/lib/lightslider/css/lightslider.min.css');
fn('page.styles', ext.'css/styles.css');
//fn('page.styles', 'http://yui.yahooapis.com/pure/0.6.0/pure-min.css');
//fn('page.styles', 'http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css');
fn('page.scripts', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
//fn('page.scripts', ext.'js/lib/lightslider/js/lightslider.min.js');
fn('page.scripts', ext.lib.'fn.js');
fn('page.scripts', ext.'js/main.min.js');
//fn('page.scripts', ext.'js/lib/jquery.innerfade.js');


fn::sitemap();
