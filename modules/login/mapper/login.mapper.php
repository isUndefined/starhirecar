<?php

function SQL_GetUserByLogin($sLogin){
	$sql = "SELECT * 
		FROM 
			`shc_users` 
		WHERE 
			`user_login` = ?s";
	
	if($aRows = sql_mapper_select_row($sql, $sLogin)){
		return $aRows;
	}
	return false;
}

function SQL_UpdateUser($aData){
	$sql = "UPDATE `shc_users`
		SET
			`user_hash` = ?s,
			`user_ip` = ?s
		WHERE
			`user_id` = ?i
	";
	return false!==sql_mapper_query($sql, $aData['user_hash'], $aData['user_ip'], $aData['user_id']);
}

function SQL_GetUserById($iUserId){
	$sql = "SELECT * 
		FROM 
			`shc_users` 
		WHERE 
			`user_id` = ?i";
	
	if($aRows = sql_mapper_select_row($sql, $iUserId)){
		return $aRows;
	}
	return false;
}

?>