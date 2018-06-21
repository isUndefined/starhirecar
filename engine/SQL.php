<?php


function sql_db_connect(){
	global $config;
	
	// создаем соединение
	$mysqli = new mysqli($config['sql']['server'],$config['sql']['user'],$config['sql']['password'],$config['sql']['db_name']);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	return $mysqli;
}

function sql_mapper_query(){
	$args = func_get_args();
	$total = false;
	$rows = call_user_func_array('_query', array($args, &$total));
	return $rows;
}

function refValues(&$arr){
    if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
    {
        $refs = array();
        foreach($arr as $key => $value){
            $refs[$key] = &$arr[$key];
		}
        return $refs;
    }
    return $arr;
}


function sql_mapper_select_row(){
	$args = func_get_args();
	$total = false;
	$rows = call_user_func_array('_query', array($args, &$total));
	if (!is_array($rows)) return $rows;
	if (!count($rows)) return array();
	reset($rows);
	return current($rows);
}

function sql_mapper_select_page(&$total, $query) {
	$args = func_get_args();
	array_shift($args);
	$total = true;
	$rows = call_user_func_array('_query', array($args, &$total));
	return $rows;
}

function _query($args, &$total){

    $iCountArgs=count($args);
    if ($iCountArgs<1) {
        throw new Exception("Incorrect number of arguments when adding events");
    }
	
	$sql = $args[0];
	
	if($mysqli = sql_db_connect()){
		
		$queryParams = array();
		if(preg_match_all('/(\?(s|d|i)+)/', $sql, $aGetParams)){
			if(empty($aGetParams[2])) {
				throw new Exception("Incorrect arguments in sql values");
			}
			
			$sql = str_replace(array('?d','?i','?s','\n'), '?', $sql);
			//$iCountArgs=func_num_args();
			
			if ($iCountArgs < count($aGetParams[2])+1) {
				throw new Exception("Incorrect number of arguments when execute sql query");
			}
	
			if($iCountArgs > 1){
				$i=1;
				$arr = array();
				$queryParams[] = implode('',$aGetParams[2]);
				foreach($aGetParams[2] as $key=>$sParam){
					$sArg = $args[$i];					
					$arr[] = $sArg;
					$i++;
				}
				$queryParams = array_merge($queryParams, $arr);
				$linq = refValues($queryParams);
				
			}			
		}
		$sql = _replaceStmt("select","SELECT SQL_CALC_FOUND_ROWS ", strtolower($sql));;
		$stmt = $mysqli->prepare($sql);
		
		if ($stmt === FALSE) {
			die ("Mysql Error: " . $mysqli->error);
		}
		
		if(!empty($queryParams)){
			call_user_func_array(array($stmt, 'bind_param'), $queryParams);
		}
		
		$stmt->execute();	
		$result = $stmt->get_result();
		
		$queryResult = array();
		
		if(substr_count(strtolower(trim($sql)),"select") > 0){
			while($rows = $result->fetch_array(MYSQLI_ASSOC)){ 
				$queryResult[] = $rows; 
			} 
			
			
			if($total){
	
				 //get total number of rows.
				$query="SELECT FOUND_ROWS()";
				$stmt = $mysqli->prepare($query);
				$stmt->execute();
				$stmt->bind_result($num);
				$stmt->fetch();
				
				$total = $num;
				
			}
			$result->free();
		} else if(substr_count(strtolower(trim($sql)),"insert") == 1){
			(string)$queryResult = $stmt->insert_id;
		}
		
		$stmt->close();
		
		// Close connection
		$mysqli->close();
		
		return $queryResult;
		
	}
	
	return null;

}



?>