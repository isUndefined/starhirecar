<?php
require_once "mapper/offers.mapper.php";
require_once ROOT."/modules/image/image.php";

// Register Events
Event_AddEvent('','EventIndex','offers');
Event_AddEvent('add','EventAddOffer','offers');
Event_AddEventPreg('/^([a-zA-Z\-_0-9])+\.html$/','/^$/','EventShowOffer','offers');
Event_AddEventPreg('/^edit$/','/^\d+$/','/^$/','EventEditOffer','offers');

// Execute Events
Event_RunEvents();


function EventIndex(){
	global $smarty, $aUri, $config;
	
	// * Get list of offers
	$aOffers = SQL_GetOffersByFilter(1, $config['offers_per_page']);	
	
	// * Assign smarty variables
	$smarty->assign('aOffers',$aOffers);
	$smarty->display('index.tpl');
}

function EventAddOffer(){
	global $smarty, $config, $aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	if(isPost('submit_add_offer')){
		SubmitAddOffer();
	}
	
	$smarty->assign('action','add');
	$smarty->display('add.tpl');
}

function SubmitAddOffer(){
	global $config, $aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	if(!isPost('submit_add_offer')){
		return false;
	}
	
	// * Валидируем секретный ключ
	if(!base64_decode(getRequestStr('security_key'), true) or getRequestStr('security_key') !== base64_encode($config['security_key'])){
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
	
	// Validate fields
	if(validateOfferFields()){
		Message_ShowErrors();
		return false;
	}

	$sOfferLink = func_str2url(getRequestStr('offer_name'));

	// * Check if offer with new link exist
	if(SQL_GetOfferByLink($sOfferLink)){
		Message_AddError('Offer link already exist','Error');
		Message_ShowErrors();
		return false;
	}
	
	$aData['offer_name'] = strip_tags(getRequestStr('offer_name'));
	$aData['offer_link'] = $sOfferLink;
	$aData['offer_short_text'] = getRequestStr('offer_short_text');
	$aData['offer_full_text'] = getRequestStr('offer_full_text');
	
	if($aImage = EventUpload()){
		$aData['image'] = @$aImage['img_origin_src'];
	}
	
	
	// * Save to database
	if($nId = SQL_AddOffer($aData)){
		func_header_location($config['path_root_web']."/offers/".$sOfferLink .".html");
	} else {
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
}

function validateOfferFields(){
	$bError = false;
	if(!func_check(getRequestStr('offer_name'),'text', 3, 150)){
		Message_AddError('Offer title must contain from 3 to 150 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('offer_short_text'),'text', 3, 150)){
		Message_AddError('Offer short text must contain from 3 to 150 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('offer_full_text'),'text', 3, 3000)){
		Message_AddError('Offer full text must contain from 3 to 3000 characters','Error');
		$bError = true;
	}
	
	return $bError;
}

function EventShowOffer(){
	global $smarty, $aUri, $config;
	
	// * Get adress link of offer
	$sLink = preg_match('/(.*)\.html/', $aUri[2], $aLink) ? $aLink[1] : "";
	if($sLink==""){
		return Event_PageNotFound();
	}
	
	// * Check if offer from link exist
	if(!$aOffer = SQL_GetOfferByLink($sLink)){
		return Event_PageNotFound();
	}
	
	// * Assign smarty variables
	$smarty->assign('aOffer',$aOffer);
	$smarty->display('show_offer.tpl');
}

function EventEditOffer(){
	global $smarty, $aUri, $aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	// * Get adress link of offer
	$sOfferId = preg_match('/^\d+$/', $aUri[3], $aLink) ? $aLink[0] : "";
	if($sOfferId==""){
		return Event_PageNotFound();
	}

	// * Check if exist offer in db
	if(!$aOffer = SQL_GetOfferById($sOfferId)){
		return Event_PageNotFound();
	}
	
	// * Если отправлена форма
	if(isPost('submit_add_offer')){
		SubmitEditOffer($aOffer);
	} else {
		$_POST['id_offer'] = $sOfferId;
		$_POST['offer_name'] = $aOffer['title'];
		$_POST['offer_short_text'] = $aOffer['short_text'];
		$_POST['offer_full_text'] = $aOffer['full_text'];
		$_POST['image'] = $aOffer['image'];
	}
	
	$smarty->assign('action','edit');
	// * Show template
	$smarty->display('add.tpl');
}

function SubmitEditOffer($aOffer){
	global $config, $aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	if(!isPost('submit_add_offer')){
		return false;
	}
	
	// * Валидируем секретный ключ
	if(!base64_decode(getRequestStr('security_key'), true) or getRequestStr('security_key') !== base64_encode($config['security_key'])){
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
	
	// Validate fields
	if(validateOfferFields()){
		Message_ShowErrors();
		return false;
	}
	
	$sOfferLink = func_str2url(getRequestStr('offer_name'));
	
	// * Check if offer with new link exist
	if($sOfferLink != $aOffer['link']){
		if(SQL_GetOfferByLink($sOfferLink)){
			Message_AddError('Offer link already exist','Error');
			Message_ShowErrors();
			return false;
		}
	}
	
	$aData['id_offer'] = $aOffer['id_offer'];
	$aData['offer_name'] = strip_tags(getRequestStr('offer_name'));
	$aData['offer_link'] = $sOfferLink;
	$aData['offer_short_text'] = getRequestStr('offer_short_text');
	$aData['offer_full_text'] = getRequestStr('offer_full_text');
	$aData['date_add'] = $aOffer['date_add'];
	
	if(empty($_POST['image_exist']) and isset($_FILE['image_file'])){
		if($aImage = EventUpload()){
			$aData['image'] = @$aImage['img_origin_src'];
		}
	} else {
		$aData['image'] = $aOffer['image'];
	}
	
	// * Update to database
	if($nId = SQL_UpdateOffer($aData)){
		func_header_location($config['path_root_web']."/offers/".$sOfferLink .".html");
	} else {
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
}


?>