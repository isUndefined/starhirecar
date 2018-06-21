<?php

// Register Events
Event_AddEvent('','EventAbout','about');

// Execute Events
Event_RunEvents();

function EventAbout(){
	global $smarty, $config;
	
	$smarty->assign('page_title','About us / '.$config['default_site_name']);
	$smarty->display("index.tpl");
	
}


?>