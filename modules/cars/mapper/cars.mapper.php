<?php

function SQL_GetCarsByLink($sLink){
	$sql = "SELECT * 
		FROM 
			`shc_car` 
		WHERE 
			`car_link` = ?s";
	
	if($aRows = sql_mapper_select_row($sql, $sLink)){
		return $aRows;
	}
	return false;
	
}

function SQL_GetCarById($nId){
	$sql = "SELECT * 
		FROM 
			`shc_car` 
		WHERE 
			`id_car` = ?s";
	
	if($aRows = sql_mapper_select_row($sql, $nId)){
		return $aRows;
	}
	return false;
}

function SQL_GetCategoryList(){
	$sql = "SELECT * 
		FROM 
			`shc_category`
		ORDER BY `id_category` DESC
		";
	
	if($aRows = sql_mapper_query($sql)){
		return $aRows;
	}
	return false;
}

function SQL_GetCategoryByLink($sLink){
	$sql = "SELECT * 
		FROM 
			`shc_category` 
		WHERE 
			`category_link` = ?s";
	
	if($aRows = sql_mapper_select_row($sql, $sLink)){
		return $aRows;
	}
	return false;
}

function SQL_GetCategoryById($sId){
	$sql = "SELECT * 
		FROM 
			`shc_category` 
		WHERE 
			`id_category` = ?i";
	
	if($aRows = sql_mapper_select_row($sql, $sId)){
		return $aRows;
	}
	return false;
}

function SQL_GetCarsByFilter($iCurrPage=null, $iPerPage=null, $aFilter=array()){	
	$sWhere = SQL_CarsBuildFilter($aFilter);

	$sql = "SELECT * 
		FROM
			`shc_car` as car
		WHERE
			1=1
		". $sWhere ."
		ORDER BY car.`id_car` desc
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

function SQL_CarsBuildFilter($aFilter){
	$sWhere = "";

	if(isset($aFilter['car_category'])){
		$sWhere .= " AND car.`car_category` = ".(int)$aFilter['car_category'];
	}
	
	
	return $sWhere;
}

function SQL_AddCar($aData){
	$sql = "INSERT INTO `shc_car`
		(
			`car_title`,
			`car_link`,
			`car_category`,
			`car_price`,
			`car_text`,
			`car_params`,
			`car_extra`,
			`date_add`
		)
		VALUES
		(?s, ?s, ?i, ?i, ?s, ?s, ?s, ?s)
	";
	
	if($nId = sql_mapper_query($sql, $aData['car_title'], $aData['car_link'], $aData['car_category'], $aData['car_price'], $aData['car_text'],$aData['car_params'],
										$aData['car_extra'], $aData['date_add'])){
		return $nId;
	}
	return false;
}

function SQL_UpdateCar($aData){
	$sql = "UPDATE `shc_car`
		SET
		
			`car_title` = ?s,
			`car_link` = ?s,
			`car_category` = ?i,
			`car_price` = ?i,
			`car_text` = ?s,
			`car_params` = ?s,
			`car_extra` = ?s,
			`date_add` = ?s
		WHERE
			`id_car` = ?i
	";
	
	$nId = sql_mapper_query($sql, $aData['car_title'], $aData['car_link'], $aData['car_category'], $aData['car_price'], $aData['car_text'],$aData['car_params'],
										$aData['car_extra'], $aData['date_add'], $aData['car_id']);										
	
	return $nId!==false;
	
}

function SQL_UpdateCategory($aData){
	$sql = "UPDATE `shc_category`
		SET
			`category_name` = ?s,
			`category_text` = ?s,
			`category_link` = ?s
		WHERE
			`id_category` = ?i
		";
	$nId = sql_mapper_query($sql, $aData['category_name'], $aData['category_text'], $aData['category_link'], $aData['category_id']);	
	return $nId!==false;
}

function SQL_GetCarsGroupByExistCategory($iCount){

	$sql = "SELECT * 
		FROM `shc_car` s
		INNER JOIN `shc_category` c
		on s.`car_category` = c.`id_category`
		WHERE (

			SELECT COUNT( * ) 
			FROM `shc_car` f
			WHERE f.`car_category` = s.`car_category`
			AND f.`id_car` >= s.`id_car`
		) <=?i
		order by s.`id_car` desc
	";
	if($aRows = sql_mapper_query($sql, $iCount)){
		return $aRows;
	}
	return false;
}

function SQL_CountCarsByCategories(){
	$sql = "SELECT count(*) as count_cars, c.id_category
		FROM 
			`shc_car` s
		INNER JOIN 
			`shc_category` c
		ON s.car_category = c.id_category
		GROUP BY c.id_category
	";
	$aResult = array();
	if($aRows = sql_mapper_query($sql)){
		foreach($aRows as $aRow){
			$aResult[$aRow['id_category']] = $aRow['count_cars'];
		}
	}
	return $aResult;
}

?>