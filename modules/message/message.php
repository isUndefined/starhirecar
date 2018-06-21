<?php

	/**
	 * ������ ��������� �� �������� ������
	 *
	 * @var array
	 */
	$aMsgError=array();
	/**
	 * ������ ��������� �� �������� ���������
	 *
	 * @var array
	 */
	$aMsgNotice=array();
	/**
	 * ������ ���������, ������� ����� �������� �� ��������� ���������
	 *
	 * @var array
	 */
	$aMsgNoticeSession=array();
	/**
	 * ������ ������, ������� ����� �������� �� ��������� ���������
	 *
	 * @var array
	 */
	$aMsgErrorSession=array();
	
	/**
	 * ��������� ����� ���������
	 *
	 * @param string $sMsg	���������
	 * @param string $sTitle	���������
	 * @param bool   $bUseSession	�������� ��������� ��� ��������� ��������� ������������ � �����
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
	 * ��������� ����� ��������� �� ������
	 *
	 * @param string $sMsg	���������
	 * @param string $sTitle	���������
	 * @param bool   $bUseSession	�������� ��������� ��� ��������� ��������� ������������ � �����
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