<?php
/**
 * функция доступа к GET POST параметрам 
 * 
 * @param  string $sName
 * @param  mixed  $default
 * @param  string $sType
 * @return mixed
 */
function getRequest($sName,$default=null,$sType=null) {
	/**
	 * Выбираем в каком из суперглобальных искать указанный ключ
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
 * функция доступа к GET POST параметрам, которая значение принудительно приводит к строке
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
 * Определяет был ли передан указанный параметр методом POST
 *
 * @param  string $sName
 * @return bool
 */
function isPost($sName) {
	return (getRequest($sName,null,'post')!==null);
}

/**
 * Заменяет стандартную header('Location: *');
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
 * генерирует случайную последовательность символов
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
 * Шифрование
 *
 * @param unknown_type $sData
 * @return unknown
 */
function func_encrypt($sData) {
	return md5($sData);
}

/**
 * Проверяет на корректность значение соглавно правилу
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
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );
    return strtr($string, $converter);
}

function func_str2url($str) {
    // переводим в транслит
    $str = func_rus2translit($str);
    // в нижний регистр
    $str = strtolower($str);
    // заменям все ненужное нам на "-"
    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
    // удаляем начальные и конечные '-'
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