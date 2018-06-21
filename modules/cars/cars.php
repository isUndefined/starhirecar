<?php
require_once "mapper/cars.mapper.php";

// Register Events
Event_AddEvent('','EventIndex','cars');
Event_AddEvent('add','EventAddCar','cars');
Event_AddEvent('loadcarsfromcategory','AjaxLoadCarsFromCategory','cars');
Event_AddEventPreg('/^edit$/','/^\d+$/','/^$/','EventEditCar','cars');
Event_AddEventPreg('/^category$/','/^edit$/','/^\d+$/','/^$/','EventEditCategory','cars');

Event_AddEventPreg('/^[\w\-\_]+$/i','/^([a-zA-Z\-_0-9])+\.html$/','/^$/','EventShowCar','cars');
Event_AddEventPreg('/^[\w\-\_]+$/i','/^$/','EventCategoryCars','cars');

// Execute Events
Event_RunEvents();


	
function EventIndex(){
	global $smarty, $aUri, $config;
		
	$iCountCars = $config['cars_limit_for_each_category'];
	// * Get 4 last cars from each category
	$aCars = SQL_GetCarsGroupByExistCategory($iCountCars);
	$aCarGroup = array();
	foreach($aCars as $aCar){
		$aCarGroup[$aCar['category_name']][] = $aCar;
	}

	// * Get count cars per each category
	$aCountCategoryCars = SQL_CountCarsByCategories();

	$smarty->assign('aCountCategoryCars',$aCountCategoryCars);
	$smarty->assign('aCarGroup',$aCarGroup);
	$smarty->assign('page_title','Car asortiment / '.$config['default_site_name']);
	$smarty->display('index.tpl');
}

function EventCategoryCars(){
	global $smarty, $aUri, $config;
	
	$smarty->assign('selectedCarType',$aUri[2]);

	// * Check if category from link exist
	if(!$aCategory = SQL_GetCategoryByLink($aUri[2])){
		return Event_PageNotFound();
	}
	
	// * Create filter for select cars
	$aFilter['car_category'] = $aCategory['id_category'];

	// * Select cars from databse
	$aCars = SQL_GetCarsByFilter(1, $config['cars_per_page_by_category'], $aFilter);
	
	// * Assign smarty variables
	$smarty->assign('aCategory',$aCategory);
	$smarty->assign('aCars',$aCars);
	
	// * Show template
	$smarty->display('cars_type.tpl');
}

function EventShowCar(){
	global $smarty, $aUri, $config;
	
	// * Get adress link of car
	$sLink = preg_match('/(.*)\.html/', $aUri[3], $aLink) ? $aLink[1] : "";
	if($sLink==""){
		return Event_PageNotFound();
	}
	
	// * Check if category from link exist
	if(!$aCategory = SQL_GetCategoryByLink($aUri[2])){
		return Event_PageNotFound();
	}
	
	// * Check if car from link exist
	if(!$aCar = SQL_GetCarsByLink($sLink)){
		return Event_PageNotFound();
	}
	
	// * If category from car equal with category from link
	if($aCategory['id_category'] != $aCar['car_category']){
		return Event_PageNotFound();
	}

	// * Assign smarty variables
	$smarty->assign('aCategory',$aCategory);
	$smarty->assign('aCar',$aCar);
	$smarty->assign('page_title',$aCar['car_title'].' / '.$config['default_site_name']);
	// * Show template
	$smarty->display('show_car.tpl');
}

function EventAddCar(){
	global $smarty, $aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	$aCategories = SQL_GetCategoryList();
	// * Достаем категории
	$smarty->assign('aCategories',$aCategories);
	
	// * Если отправлена форма
	if(isPost('submit_add_car')){
		SubmitAddCar();
	} 
	
	// * Show template
	$smarty->display('add.tpl');
}

function SubmitAddCar(){
	global $config, $aUser;
	
	// * Если форма не отправлена 
	if(!isPost('submit_add_car')){
		return false;
	}
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	// * Валидируем секретный ключ
	if(!base64_decode(getRequestStr('security_key'), true) or getRequestStr('security_key') !== base64_encode($config['security_key'])){
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
	
	// Validate fields
	if(validateCarFields()){
		Message_ShowErrors();
		return false;
	}	
	
	$aParams = getRequest('car_params', array());
	$sParams = serialize ( array('Engine volume'=>$aParams['engine'],'Gear box'=>$aParams['gear'], 'Fuel'=>$aParams['fuel'] ) );
	
	$s = null;
	if(count(getRequest('car_images',array())) > 0 ){
		$aImages = getRequest('car_images',array());
		$s = serialize(array('slider'=>$aImages));
	}
	
	
	$sCarLink = func_str2url(getRequestStr('car_link'));
	$aData['car_title'] = getRequestStr('car_title');
	$aData['car_link'] = $sCarLink;
	$aData['car_category'] = getRequestStr('car_category');
	$aData['car_price'] = getRequestStr('car_price');
	$aData['car_text'] = getRequestStr('car_description');
	$aData['car_params'] = $sParams;
	$aData['car_extra'] = $s;
	$aData['date_add'] = date('Y-m-d');

	// * Save to database
	if($nId = SQL_AddCar($aData)){
		$aCategory = SQL_GetCategoryById(getRequestStr('car_category'));
		func_header_location($config['path_root_web']."/cars/".$aCategory['category_link']."/". $sCarLink .".html");
	} else {
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}

}

function AjaxLoadCarsFromCategory(){
	global $smarty, $config;
	header_json();
	
	$iCategory = getRequestStr('category');
	$iStart = getRequestStr('start');
	if($iCategory=="" or $iStart==""){
		return;
	}
	
	// * Create filter for select cars
	$aFilter['car_category'] = (int)$iCategory;
	
	$iCountCars = $config['cars_limit_for_each_category'];
	// * Load data
	$Cars = SQL_GetCarsByFilter((int)$iStart, $iCountCars, $aFilter);
	$aCategory = SQL_GetCategoryById($aFilter['car_category']);
	$smarty->assign('action','edit');
	$smarty->assign('aCategory',$aCategory);
	$smarty->assign('aGetCars',$Cars);
	$output = $smarty->fetch("ajax.load_cars.tpl");
	
	// * Get count cars per each category
	$aCountCategoryCars = SQL_CountCarsByCategories();
	$bMore = false;
	
	// * Count remaining cars and set if exists more
	$iTotalCars = $iStart * $iCountCars;
	if(isset($aCountCategoryCars[$iCategory]) and $aCountCategoryCars[$iCategory] > $iTotalCars){
		$bMore = true;
	}
	
	echo json_encode(array('sText'=>$output,'bMore'=>$bMore));
	
}

function EventEditCar(){
	global $smarty, $aUri, $aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}

	// * Get adress link of car
	$sCarId = preg_match('/^\d+$/', $aUri[3], $aLink) ? $aLink[0] : "";
	if($sCarId==""){
		return Event_PageNotFound();
	}
	
	if(!$aCar = SQL_GetCarById($sCarId)){
		return Event_PageNotFound();
	}
	
	$aCategories = SQL_GetCategoryList();
	// * Достаем категории
	$smarty->assign('aCategories',$aCategories);
	
	// * Если отправлена форма
	if(isPost('submit_add_car')){
		SubmitEditCar($aCar);
	} else {
		$_POST['id_car'] = $sCarId;
		$_POST['car_title'] = $aCar['car_title'];
		$_POST['car_category'] = $aCar['car_category'];
		$_POST['car_link'] = $aCar['car_link'];
		$_POST['car_price'] = $aCar['car_price'];
		$_POST['car_description'] = $aCar['car_text'];
		if($aCar['car_params']){
			$aParams = @unserialize($aCar['car_params']);
			$_POST['car_params']['engine'] = isset($aParams['Engine volume']) ? $aParams['Engine volume']: '';
			$_POST['car_params']['gear'] = isset($aParams['Gear box']) ? $aParams['Gear box'] : '';
			$_POST['car_params']['fuel'] = isset($aParams['Fuel']) ? $aParams['Fuel'] : '';
		}
		
		if($aCar['car_extra']){
			$aExtra = @unserialize($aCar['car_extra']);
			$_POST['car_images'] = isset($aExtra['slider']) ? $aExtra['slider'] : '';
		}
	}
	
	// * Show template
	$smarty->display('add.tpl');
}

function SubmitEditCar($aCar){
	global $config, $aUser;
	
	// * Если форма не отправлена 
	if(!isPost('submit_add_car')){
		return false;
	}
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	// * Валидируем секретный ключ
	if(!base64_decode(getRequestStr('security_key'), true) or getRequestStr('security_key') !== base64_encode($config['security_key'])){
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}

	// Validate fields
	if(validateCarFields()){
		Message_ShowErrors();
		return false;
	}	
	
	$aParams = getRequest('car_params', array());
	$sParams = serialize ( array('Engine volume'=>$aParams['engine'],'Gear box'=>$aParams['gear'], 'Fuel'=>$aParams['fuel'] ) );
	
	$s = null;
	if(count(getRequest('car_images',array())) > 0 ){
		$aImages = getRequest('car_images',array());
		$s = serialize(array('slider'=>$aImages));
	}
	
	$sCarLink = func_str2url(getRequestStr('car_link'));
	$aData['car_id'] = $aCar['id_car'];
	$aData['car_title'] = getRequestStr('car_title');
	$aData['car_link'] = $sCarLink;
	$aData['car_category'] = getRequestStr('car_category');
	$aData['car_price'] = getRequestStr('car_price');
	$aData['car_text'] = getRequestStr('car_description');
	$aData['car_params'] = $sParams;
	$aData['car_extra'] = $s;
	$aData['date_add'] = $aCar['date_add'];

	// * Update in database
	if($nId = SQL_UpdateCar($aData)){
		$aCategory = SQL_GetCategoryById(getRequestStr('car_category'));
		func_header_location($config['path_root_web']."/cars/".$aCategory['category_link']."/". $sCarLink .".html");
	} else {
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
}

function validateCarFields(){
	
	$bError = false;
	if(!func_check(getRequestStr('car_title'),'text', 3, 150)){
		Message_AddError('Car title must contain from 3 to 150 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('car_link'),'text', 3, 50)){
		Message_AddError('Car link must contain from 3 to 50 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('car_category'),'id', 1, 5)){
		Message_AddError('Car category not selected','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('car_price'),'id', 1, 5)){
		Message_AddError('Car price must be digits','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('car_description'),'text', 3, 1000)){
		Message_AddError('Car text must contain from 3 to 1000 characters','Error');
		$bError = true;
	}
	
	$aParams = getRequest('car_params', array());
	if(empty($aParams['engine']) or !func_check($aParams['engine'],'id', 1, 6)){
		Message_AddError('Engine volume must be digits. 1 - 6 characters.','Error');
		$bError = true;
	}
	
	if(empty($aParams['gear']) or ($aParams['gear']!="automat" and $aParams['gear']!="manual")){
		Message_AddError('Gear not selected','Error');
		$bError = true;
	}
	
	if(empty($aParams['fuel']) or ($aParams['fuel']!="diesel" and $aParams['fuel']!="gasoline")){
		Message_AddError('Fuel not selected','Error');
		$bError = true;
	}
	
	return $bError;
}

function EventEditCategory(){
	global $smarty, $aUser, $aUri;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	// * Get id of category
	$sCategoryId = preg_match('/^\d+$/', $aUri[4], $aLink) ? $aLink[0] : "";
	if($sCategoryId==""){
		return Event_PageNotFound();
	}
	
	if(!$aCategory = SQL_GetCategoryById($sCategoryId)){
		return Event_PageNotFound();
	}
		
	$smarty->assign('action','edit');
	$smarty->assign('aCategory',$aCategory);
	
	// * Если отправлена форма
	if(isPost('submit_add_category')){
		SubmitEditCategory($aCategory);
	} else {
		$_POST['category_name'] = $aCategory['category_name'];
		$_POST['category_link'] = $aCategory['category_link'];
		$_POST['category_text'] = $aCategory['category_text'];
	}
	
	// * Show template
	$smarty->display('add_category.tpl');
}

function SubmitEditCategory($aCategory){
	global $config, $aUser;
	
	// * Если форма не отправлена 
	if(!isPost('submit_add_category')){
		return false;
	}
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	// * Валидируем секретный ключ
	if(!base64_decode(getRequestStr('security_key'), true) or getRequestStr('security_key') !== base64_encode($config['security_key'])){
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}

	// Validate fields
	if(validateCategoryFields()){
		Message_ShowErrors();
		return false;
	}	
	
	$sCategoryLink = func_str2url(getRequestStr('category_link'));
	$aData['category_id'] = $aCategory['id_category'];
	$aData['category_name'] = getRequestStr('category_name');
	$aData['category_link'] = $sCategoryLink;
	$aData['category_text'] = getRequestStr('category_text');
	
	// * Update in database
	if($nId = SQL_UpdateCategory($aData)){
		func_header_location($config['path_root_web']."/cars/".$sCategoryLink);
	} else {
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
	
}

function validateCategoryFields(){

	$bError = false;
	if(!func_check(getRequestStr('category_name'),'text', 3, 150)){
		Message_AddError('Category title must contain from 3 to 150 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('category_link'),'text', 3, 50)){
		Message_AddError('Category link must contain from 3 to 50 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('category_text'),'text', 3, 1000)){
		Message_AddError('Category text must contain from 3 to 1000 characters','Error');
		$bError = true;
	}
	
	
	return $bError;
}

?>