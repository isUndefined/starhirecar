<?php
//error_reporting(E_ALL);
// * Define
define ('ROOT', $_SERVER["DOCUMENT_ROOT"]);
define ('DIR_WEB', 'http://'.getenv('HTTP_HOST'));


// * Require
require ROOT.'/config.php';
require ROOT.'/libs/Smarty.class.php';


// * Smarty Init
$smarty = new Smarty;
//$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;


// * Config smarty dirs
$smarty->setTemplateDir('/smarty/templates');
$smarty->config_dir = './smarty/configs/';
$smarty->setCompileDir('./smarty/templates_c/');
$smarty->setCacheDir('./smarty/cache/');

require_once "/engine/Event.php";
require_once "/engine/functions.php";
require_once "/engine/SQL.php";
// * Get URL
$uri = $_SERVER["REQUEST_URI"];
//$aUri = array_values(array_filter(explode('/',$uri)));
$aUri = explode('/',$uri);
foreach($aUri as $key=>$s){
	if($key!=0 and $s==""){
		unset($aUri[$key]);
	}
}
$aUri = array_values($aUri);
$page = $aUri[1] ? $aUri[1] : $config['page']['default'];

require_once ROOT.'/modules/message/message.php';

// * Autologin
if($page!="login" and isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
	include ROOT.'/modules/login/login.php';
	$aUser = AutoLogin();
	$smarty->assign("aUser",$aUser);
}


// * Load page
if(!empty($config['page'][$page])){
	$template_dir = $smarty->getTemplateDir();
	$template_dir = $config['path_root_web'].trim($template_dir[0],"\\");
	
	$smarty->assign("web_path",$config['path_root_web']);
	$smarty->assign("server_path",$config['path_root_server']);
	$smarty->assign("tpl_dir",$template_dir);
	$smarty->assign("page_title", $config['default_site_name']);
	$smarty->setTemplateDir('./smarty/templates/actions/Action'.ucfirst($page).'/');
	
	include ROOT.'/modules/'.$page.'/'.$config['page'][$page].'.php';
	
} else {
	Event_PageNotFound();
}

?>