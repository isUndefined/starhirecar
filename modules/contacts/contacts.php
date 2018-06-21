<?php
require_once ROOT."/engine/smtp-func.php";
// Register Events
Event_AddEvent('','EventContacts','contacts');

// Execute Events
Event_RunEvents();

function EventContacts(){
	global $smarty, $config;
	
	if(isPost('submit_contact_us')){
		SubmitContacts();
	}
	$smarty->assign('page_title','Contacts / '.$config['default_site_name']);
	$smarty->display("contacts.tpl");
	
}

function SubmitContacts(){
	global $config;
	
	if(!isPost('submit_contact_us')){
		return false;
	}
	
	// * Валидируем секретный ключ
	if(!base64_decode(getRequestStr('security_key'), true) or getRequestStr('security_key') !== base64_encode("1amSup3rH3r0C@R")){
		Message_AddError('System error','Error');
		Message_ShowErrors();
		return false;
	}
	
	// * Check if guest can send form by time in cookie	
	if(isset($_COOKIE['contacts']) and strtotime(date('Y-m-d H:i:s')) - $_COOKIE['contacts'] < $config['period_between_message_send']){
		Message_AddError('You already completed contact form. Please, come back later.','Error');
		Message_ShowErrors();
		return false;
	}
	
	$bError = false;
	if(!func_check(getRequestStr('contact_name'),'text', 3, 100)){
		Message_AddError('Contact name must contain from 3 to 100 characters','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('contact_mail'),'mail')){
		Message_AddError('Contact email not valid','Error');
		$bError = true;
	}
	
	if(!func_check(getRequestStr('contact_message'),'text', 3, 500)){
		Message_AddError('Contact text must contain from 3 to 500 characters','Error');
		$bError = true;
	}
	
	if($bError){
		Message_ShowErrors();
		return false;
	}
	
	$type = 'html'; //Можно поменять на html; plain означяет: будет присылаться чистый текст.
	$charset = 'windows-1251';


	// * Construct letter
	$email = $config['send_to'];
	$subject = "StarHireCar Contacts";
	$message = "Hello, <br>you have message from <strong>". strip_tags(getRequestStr('contact_name')) ."</strong> with text:<br><br>".strip_tags(getRequestStr('contact_message'));
	$message .= "<br><br>Please contact him at email: <strong>". getRequestStr('contact_mail') ."</strong>";
	$replyto = 'StarHireCar';
	$headers = "To: <$email>\r\n".
              "From: \"$replyto\"\r\n".
              "Content-Type: text/$type; charset=\"$charset\"\r\n";
	//$sended = smtpmail($email, $subject, $message, $headers);
	//if($sended){
		setcookie("contacts", strtotime(date('Y-m-d H:i:s')), time() + $config['period_between_message_send']);
		Message_AddNotice('Message sended succesfull','Success');
		Message_ShowNotice();
		return true;
	//}
}

?>