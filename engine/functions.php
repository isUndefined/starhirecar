<?php
/**
 * ������� ������� � GET POST ���������� 
 * 
 * @param  string $sName
 * @param  mixed  $default
 * @param  string $sType
 * @return mixed
 */
function getRequest($sName,$default=null,$sType=null) {
	/**
	 * �������� � ����� �� ��������������� ������ ��������� ����
	 */
	switch (strtolower($sType)) {
		default:
		case null:
			$aStorage = $_REQUEST;
			break;
		case 'get':
			$aStorage = $_GET;
			break;
		case 'post':
			$aStorage = $_POST;
			break;	
	}
	
	if (isset($aStorage[$sName])) {
		if (is_string($aStorage[$sName])) {
			return trim($aStorage[$sName]);
		} else {
			return $aStorage[$sName];
		}
	}
	return $default;
}

/**
 * ������� ������� � GET POST ����������, ������� �������� ������������� �������� � ������
 *
 * @param string $sName
 * @param mixed $default
 * @param string $sType
 *
 * @return string
 */
function getRequestStr($sName,$default=null,$sType=null) {
	return (string)getRequest($sName,$default,$sType);
}

/**
 * ���������� ��� �� ������� ��������� �������� ������� POST
 *
 * @param  string $sName
 * @return bool
 */
function isPost($sName) {
	return (getRequest($sName,null,'post')!==null);
}

/**
 * �������� ����������� header('Location: *');
 *
 * @param unknown_type $sLocation
 */
function func_header_location($sLocation) {
	if(headers_sent())
    {
        $string = '<script type="text/javascript">';
        $string .= 'window.location = "' . $sLocation . '"';
        $string .= '</script>';

        echo $string;
    } else {
		$sProtocol=isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
		header("{$sProtocol} 301 Moved Permanently");
		header('Location: '.$sLocation);
	}
    exit();
}

/**
 * ���������� ��������� ������������������ ��������
 *
 * @param unknown_type $iLength
 * @return unknown
 */
function func_generator($iLength=10) {
	if ($iLength>32) {
		$iLength=32;
	}
	return substr(md5(uniqid(mt_rand(),true)),0,$iLength);
}

/**
 * ����������
 *
 * @param unknown_type $sData
 * @return unknown
 */
function func_encrypt($sData) {
	return md5($sData);
}

/**
 * ��������� �� ������������ �������� �������� �������
 *
 * @param unknown_type $sValue
 * @param unknown_type $sParam
 * @param unknown_type $iMin
 * @param unknown_type $iMax
 * @return unknown
 */
function func_check($sValue,$sParam,$iMin=1,$iMax=100) {
	if (is_array($sValue)) {
		return false;
	}
	switch($sParam)
	{
		case 'id': if (preg_match("/^\d{".$iMin.','.$iMax."}$/",$sValue)){ return true; } break;				
		case 'float': if (preg_match("/^[\-]?\d+[\.]?\d*$/",$sValue)){ return true; } break;	
		case 'mail': if (preg_match("/^[\da-z\_\-\.\+]+@[\da-z_\-\.]+\.[a-z]{2,5}$/i",$sValue)){ return true; } break;
		case 'login': if (preg_match("/^[\da-z\_\-]{".$iMin.','.$iMax."}$/i",$sValue)){ return true; } break;
		case 'md5': if (preg_match("/^[\da-z]{32}$/i",$sValue)){ return true; } break;
		case 'password': if (mb_strlen($sValue,'UTF-8')>=$iMin){ return true; } break;
		case 'text': if (mb_strlen($sValue,'UTF-8')>=$iMin and mb_strlen($sValue,'UTF-8')<=$iMax){ return true; } break;
		default: 
			return false;
	}
	return false;
}

function func_rus2translit($string) {
    $converter = array(
        '�' => 'a',   '�' => 'b',   '�' => 'v',
        '�' => 'g',   '�' => 'd',   '�' => 'e',
        '�' => 'e',   '�' => 'zh',  '�' => 'z',
        '�' => 'i',   '�' => 'y',   '�' => 'k',
        '�' => 'l',   '�' => 'm',   '�' => 'n',
        '�' => 'o',   '�' => 'p',   '�' => 'r',
        '�' => 's',   '�' => 't',   '�' => 'u',
        '�' => 'f',   '�' => 'h',   '�' => 'c',
        '�' => 'ch',  '�' => 'sh',  '�' => 'sch',
        '�' => '\'',  '�' => 'y',   '�' => '\'',
        '�' => 'e',   '�' => 'yu',  '�' => 'ya',
        
        '�' => 'A',   '�' => 'B',   '�' => 'V',
        '�' => 'G',   '�' => 'D',   '�' => 'E',
        '�' => 'E',   '�' => 'Zh',  '�' => 'Z',
        '�' => 'I',   '�' => 'Y',   '�' => 'K',
        '�' => 'L',   '�' => 'M',   '�' => 'N',
        '�' => 'O',   '�' => 'P',   '�' => 'R',
        '�' => 'S',   '�' => 'T',   '�' => 'U',
        '�' => 'F',   '�' => 'H',   '�' => 'C',
        '�' => 'Ch',  '�' => 'Sh',  '�' => 'Sch',
        '�' => '\'',  '�' => 'Y',   '�' => '\'',
        '�' => 'E',   '�' => 'Yu',  '�' => 'Ya',
    );
    return strtr($string, $converter);
}

function func_str2url($str) {
    // ��������� � ��������
    $str = func_rus2translit($str);
    // � ������ �������
    $str = strtolower($str);
    // ������� ��� �������� ��� �� "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // ������� ��������� � �������� '-'
    $str = trim($str, "-");
    return $str;
}


function header_json(){
	header('Content-type: application/json');
}

function _replaceStmt($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}
?>