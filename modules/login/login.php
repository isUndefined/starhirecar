<?php

require_once "mapper/login.mapper.php";

// Register Events
Event_AddEvent('','EventLogin','login');

// Execute Events
Event_RunEvents();

// �������� �����������


function EventLogin(){
	global $smarty;
	$bIsAuthorized = false;
	
	// * If user already authorized
	if(AutoLogin()){
		$bIsAuthorized = true;
	}

	//die(var_dump($_SERVER['REMOTE_ADDR']));
		
	// * If user trying to login
	if(isPost('submit_login')) {
		return SubmitLogin();
	}
	
	$smarty->assign("bIsAuthorized", $bIsAuthorized);
	$smarty->display("login.tpl");
	
}

function SubmitLogin(){
	global $config;
	
	if(!isPost('submit_login')) {
		return false;
	}

	// ����������� �� �� ������, � ������� ����� ���������� ����������
	$aUser = SQL_GetUserByLogin(getRequestStr('login'));

	
	// ���������� ������
	if ($aUser and $aUser['user_password'] === func_encrypt(func_encrypt(getRequestStr('password')))) {

		// ���������� ��������� ����� � ������� ���
		$hash = func_encrypt(func_generator(10));
	
		$aData = array(
			'user_hash' => $hash,
			'user_ip' => $_SERVER['REMOTE_ADDR'],
			'user_id' => $aUser['user_id']
		);	
		
		// ���������� � �� ����� ��� ����������� � IP
		$bUpdateUserIp = SQL_UpdateUser($aData);
		
		// ������ ����
		setcookie("id", (int)$aUser['user_id'], time() + 60 * 60 * 24 * 1);
		setcookie("hash", $hash, time() + 60 * 60 * 24 * 1);
		
		func_header_location($config['path_root_web']);

	} else {
		//print "�� ����� ������������ �����/������";
		return false;
	}
	
}

function AutoLogin(){
	
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash']) and is_string($_COOKIE['hash'])) {   
		$aUser = SQL_GetUserById($_COOKIE['id']);
	
		if($aUser and (($aUser['user_hash'] !== $_COOKIE['hash']) or ($aUser['user_id'] !== (int)$_COOKIE['id'])
			or (($aUser['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($aUser['user_ip'] !== "0")))) {

			// ������ ����
			setcookie("id", "", time() - 3600*24*30*12, "/");
			setcookie("hash", "", time() - 3600*24*30*12, "/");
			
			return false;
		}
		return $aUser;		
	}
	return false;
}

function Logout(){
	global $config;
	
	// ������ ����
	setcookie("id", "", time() - 3600*24*30*12, "/");
	setcookie("hash", "", time() - 3600*24*30*12, "/");
	
	func_header_location($config['path_root_web']);

}



?>