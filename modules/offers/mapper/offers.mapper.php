<?php

	function SQL_AddOffer($aData){
		$sql = "INSERT INTO `shc_offer`
			(
				`title`,
				`link`,
				`short_text`,
				`full_text`,
				`date_add`,
				`image`
			)
			VALUES
			(?s, ?s, ?s, ?s, ?s, ?s)
		";
		
		if($nId = sql_mapper_query($sql, $aData['offer_name'], $aData['offer_link'], $aData['offer_short_text'], $aData['offer_full_text'], date('Y-m-d H:i:s'), $aData['image'])){
			return $nId;
		}
		return false;
	}
	
	function SQL_GetOfferByLink($sLink){
		$sql = "SELECT * 
			FROM 
				`shc_offer` 
			WHERE 
				`link` = ?s";
		
		if($aRows = sql_mapper_select_row($sql, $sLink)){
			return $aRows;
		}
		return false;
	}
	
	
	function SQL_GetOffersByFilter($iCurrPage=null, $iPerPage=null, $aFilter=array()){	
		$sWhere = '';

		$sql = "SELECT * 
			FROM
				`shc_offer` as offer
			WHERE
				1=1
			". $sWhere ."
			ORDER BY offer.`date_add` desc
		";
		
		if (is_null($iCurrPage)) {
			$aRows=sql_mapper_query($sql);
		} else {
			$sql.=" LIMIT ?i, ?i ";
			$aRows=sql_mapper_query($sql,($iCurrPage-1)*$iPerPage, $iPerPage);		
		}
		

		if($aRows){
			return $aRows;
		}
		return false;
	}
	
	function SQL_GetOfferById($sOfferId){
		$sql = "SELECT * 
			FROM 
				`shc_offer` 
			WHERE 
				`id_offer` = ?i";
		
		if($aRows = sql_mapper_select_row($sql, $sOfferId)){
			return $aRows;
		}
		return false;
	}
	
	function SQL_UpdateOffer($aData){
		$sql = "UPDATE `shc_offer`
			SET
				`title` = ?s,
				`link` = ?s,
				`short_text` = ?s,
				`full_text` = ?s,
				`date_add` = ?s,
				`image` = ?s
			WHERE
				`id_offer` = ?i
		";
		
		$nId = sql_mapper_query($sql, $aData['offer_name'], $aData['offer_link'], $aData['offer_short_text'], $aData['offer_full_text'], $aData['date_add'], 
										$aData['image'], $aData['id_offer']);
		return $nId!==false;
	}
	
?>