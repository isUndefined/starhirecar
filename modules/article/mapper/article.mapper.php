<?php
	function SQL_GetArticleList(&$iCount, $iCurrPage, $iPerPage){
		$sql = "SELECT * 
			FROM 
				`shc_article` 
			ORDER BY `id_article` DESC
			LIMIT ?i,?i";
		
		if($aRows=sql_mapper_select_page($iCount, $sql, ($iCurrPage-1)*$iPerPage, $iPerPage)){
			return $aRows;
		}
		return false;
	}
	
	function SQL_GetArticleById($sId){
		$sql = "SELECT * 
			FROM 
				`shc_article` 
			WHERE
				`id_article` = ?i
		";
		
		if($aRows = sql_mapper_select_row($sql, $sId)){
			return $aRows;
		}
		return false;
	}
?>