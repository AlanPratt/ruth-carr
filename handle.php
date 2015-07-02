<?php
require_once('_config.php');


switch($_REQUEST['action']):
case 'contact': 
	$name = fn::rci('name');
	$email = fn::rci('email', 'email');
	$tel = fn::rci('tel');
	$content = fn::rci('content');
	$surname = fn::rci('surname');

	if($surname != ''):
		fn::redirect(site_url.'/form-fail');
	endif;
	
	$n = '<br />'.n;
	$html = "
		Contact from $name ($email) via contact form on ".site_title." website$n
		===================================================$n
		$n
		Name: $name
		$n $n
		Email: $email
		$n $n
		Tel: $tel
		$n $n
		$content $n
		$n $n
		===================================================$n
		$n $n
		Info$n
		========$n
		Sent: ".fn::now()."$n
		IP: {$_SERVER['REMOTE_ADDR']}$n
		Ref: {$_SERVER['HTTP_REFERER']}$n 	
	";
	
	$arr = array();
	$arr['to_email'] = 'alan@bowhouse.co.uk';
	$arr['to_name'] = 'Alan';
	//$arr['to_email'] = '';
	//$arr['to_name'] = 'York City FC Foundation' /*site_title*/;
	$arr['from_email'] = 'noreply@'.str_replace('www.', '', host);
	$arr['from_name'] = $name;
	$arr['reply_to'] = $email;
	$arr['subject'] = 'Contact via contact form on '.site_title.' website';
	$arr['plain'] = $html;
	$arr['html'] = $html;

	$sent = fn::send_email($arr);
	if($sent) $state = 'ok';
	else $state = 'error';

	$ref = $_SERVER['HTTP_REFERER'];
	fn::redirect($ref.'?&state='.$state);
break;
endswitch;

exit();