<?php

require_once "mapper/faq.mapper.php";

// Register Events
Event_AddEvent('','EventFaq','faq');
Event_AddEvent('add','EventAddFaq','faq');
Event_AddEventPreg('/^edit$/','/^\d+$/','/^$/','EventEditFaq','faq');

// Execute Events
Event_RunEvents();

function EventFaq(){
	global $smarty, $config;
	
	// * Достаем список вопросов и ответов
	$aFaqs = SQL_GetFaqList();
	$smarty->assign('aFaqs',$aFaqs);
	$smarty->assign('page_title','FAQ / '.$config['default_site_name']);
	$smarty->display("faq.tpl");
}

function EventEditFaq(){
	global $smarty, $aUri, $aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	// * Get adress link of car
	$sFaqId = preg_match('/^\d+$/', $aUri[3], $aLink) ? $aLink[0] : "";
	if($sFaqId==""){
		return Event_PageNotFound();
	}
	
	if(!$aFaq = SQL_GetFaqById($sFaqId)){
		return Event_PageNotFound();
	}
	
	// * Если отправлена форма
	if(isPost('submit_add_faq')){
		SubmitEditFaq($aFaq);
	} else {
		$_POST['question'] = $aFaq['question'];
		$_POST['answer'] = $aFaq['answer'];
	}
	
	$smarty->display("add.tpl");
}

function SubmitEditFaq($aFaq){
	global $config, $aUser;
	
	// * Если форма не отправлена 
	if(!isPost('submit_add_faq')){
		return false;
	}
	
	// * Если данные о форме не переданы
	if($aFaq==""){
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
	
	$bError = false;
	if(!func_check(getRequestStr('question'),'text', 3, 150)){
		Message_AddError('Question must contain from 3 to 150 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('answer'),'text', 3, 2000)){
		Message_AddError('Answer must contain from 3 to 2000 characters','Error');
		$bError = true;
	}
	
	if($bError){
		Message_ShowErrors();
		return false;
	}
	
	$aData['faq_id'] = $aFaq['faq_id'];
	$aData['question'] = getRequestStr('question');
	$aData['answer'] = getRequestStr('answer');
	
	if(SQL_EditFaq($aData)){
		func_header_location($config['path_root_web']."/faq#q".$aFaq['faq_id']);
	} else {
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
}

function EventAddFaq(){
	global $smarty,$aUser;
	
	// * Если пользователь не авторизирован
	if(!$aUser){
		return Event_PageNotFound();
	}
	
	// * Если отправлена форма
	if(isPost('submit_add_faq')){
		SubmitAddFaq();
	} 
	
	$smarty->display("add.tpl");
}

function SubmitAddFaq(){
	global $config,$aUser;
	
	// * Если форма не отправлена 
	if(!isPost('submit_add_faq')){
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
	
	$bError = false;
	if(!func_check(getRequestStr('question'),'text', 3, 150)){
		Message_AddError('Question must contain from 3 to 150 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('answer'),'text', 3, 2000)){
		Message_AddError('Answer must contain from 3 to 2000 characters','Error');
		$bError = true;
	}
	
	if($bError){
		Message_ShowErrors();
		return false;
	}
	
	$aData['question'] = getRequestStr('question');
	$aData['answer'] = getRequestStr('answer');
	
	if($nId = SQL_AddFaq($aData)){
		func_header_location($config['path_root_web']."/faq#q".$nId);
	} else {
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
}

?>