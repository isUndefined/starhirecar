<?php

// Register Events
Event_AddEventPreg('/(\d)?/','EventIndex','error');


// Execute Events
Event_RunEvents();


	
function EventIndex(){
	global $smarty, $aUri;
	
	$smarty->assign('iError',$aUri[2]);
	
	$smarty->display('index.tpl');
}

?>