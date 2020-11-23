<?php
 include_once 'session.php';
 require_once 'Facebook/autoload.php';
 $FB = new \Facebook\Facebook([
 	'app_id' => '1952149205110861',
 	'app_secret' => 'd938b4d2adeaef7a7193dcc3f98952a2',
 	'default_graph_version' => 'v2.10']);
 $helper = $FB->getRedirectLoginHelper();

?>