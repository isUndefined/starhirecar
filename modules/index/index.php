<?php
// Register Events
Event_AddEvent('','EventIndex','index');

// Execute Events
Event_RunEvents();

function EventIndex(){
	global $smarty;
	
	$smarty->display('index.tpl');
}


?>