<?php

	/**
	 * Массив сообщений со статусом ОШИБКА
	 *
	 * @var array
	 */
	$aMsgError=array();
	/**
	 * Массив сообщений со статусом СООБЩЕНИЕ
	 *
	 * @var array
	 */
	$aMsgNotice=array();
	/**
	 * Массив сообщений, который будут показаны на СЛЕДУЮЩЕЙ страничке
	 *
	 * @var array
	 */
	$aMsgNoticeSession=array();
	/**
	 * Массив ошибок, который будут показаны на СЛЕДУЮЩЕЙ страничке
	 *
	 * @var array
	 */
	$aMsgErrorSession=array();
	
	/**
	 * Добавляет новое сообщение
	 *
	 * @param string $sMsg	Сообщение
	 * @param string $sTitle	Заголовок
	 * @param bool   $bUseSession	Показать сообщение при следующем обращении пользователя к сайту
	 */
	function Message_AddNotice($sMsg,$sTitle=null,$bUseSession=false) {
		global $aMsgNotice;
		if(!$bUseSession) {
			$aMsgNotice[]=array('msg'=>$sMsg,'title'=>$sTitle);
		} else {
			$aMsgNoticeSession[]=array('msg'=>$sMsg,'title'=>$sTitle);
		}
	}
	
	/**
	 * Добавляет новое сообщение об ошибке
	 *
	 * @param string $sMsg	Сообщение
	 * @param string $sTitle	Заголовок
	 * @param bool   $bUseSession	Показать сообщение при следующем обращении пользователя к сайту
	 */
	function Message_AddError($sMsg,$sTitle=null,$bUseSession=false) {
		global $aMsgError;
		if(!$bUseSession) {
			$aMsgError[]=array('msg'=>$sMsg,'title'=>$sTitle);
		} else {
			$aMsgErrorSession[]=array('msg'=>$sMsg,'title'=>$sTitle);
		}
	}
	
	function Message_ShowErrors(){
		global $smarty, $aMsgError;
		
		$smarty->assign('aMsgError', $aMsgError);
	}
	
	function Message_ShowNotice(){
		global $smarty, $aMsgNotice;
		$smarty->assign('aMsgNotice',$aMsgNotice);
	}
		
?>