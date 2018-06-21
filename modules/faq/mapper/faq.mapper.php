<?php

function SQL_AddFaq($aData){
	$sql = "INSERT INTO `shc_faq`
		(
			`question`,
			`answer`
		)
		VALUES
		(?s, ?s)
	";
	
	if($nId = sql_mapper_query($sql, $aData['question'], $aData['answer'])){
		return $nId;
	}
	return false;
}

function SQL_EditFaq($aData){
	$sql = "UPDATE `shc_faq`
		SET
			`question` = ?s,
			`answer` = ?s
		WHERE
			`faq_id` = ?i
	";
	
	$bResult = sql_mapper_query($sql, $aData['question'], $aData['answer'], $aData['faq_id']);
	
	return $bResult !== false;
}

function SQL_GetFaqList(){
	$sql = "SELECT * 
		FROM
			`shc_faq`
		ORDER BY `faq_id` DESC
	";
	
	if($aRows = sql_mapper_query($sql)){
		return $aRows;
	}
	
	return false;
}

function SQL_GetFaqById($sId){
	$sql = "SELECT * 
		FROM
			`shc_faq`
		WHERE
			`faq_id` = ?i
	";

	if($aRow = sql_mapper_select_row($sql, $sId)){
		return $aRow;
	}
	return false;

}

?>