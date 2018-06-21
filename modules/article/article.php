<?php
require_once "mapper/article.mapper.php";

// Register Events
Event_AddEvent('','EventIndex','article');

// Execute Events
Event_RunEvents();

function EventIndex(){
	$sql = SQL_GetArticleList($iCount, 1, 20);
	$count = $iCount;
	var_dump($sql, $count);
	
	//var_dump(SQL_GetArticleById(5));
	exit;
}
?>