<?php

$aRegisterEvent = array();

function Event_AddEvent($sEventName,$sEventFunction,$sModuleName) {
    return Event_AddEventPreg("/^{$sEventName}$/i",$sEventFunction,$sModuleName);
}

function Event_AddEventPreg() {
	global $aRegisterEvent, $page;
	
    $iCountArgs=func_num_args();
    if ($iCountArgs<2) {
        throw new Exception("Incorrect number of arguments when adding events");
    }
    $aEvent=array();
    /**
     * Последний параметр может быть массивом - содержать имя метода и имя евента(именованный евент)
     * Если указан только метод, то имя будет равным названию метода
     */
    $aNames=(array)func_get_arg($iCountArgs-2);
	
	$aEvent['method']=$aNames[0];
	$aArgs = func_get_args();
    if (!preg_match('/^Module/',end($aArgs))) {
        $aEvent['module']="Module".ucfirst(end($aArgs));
    }
	
    $aEvent['name']=$aEvent['method'];
    
    $aEvent['preg']=func_get_arg(0);
    $aEvent['params_preg']=array();
    for ($i=1;$i<$iCountArgs-2;$i++) {
        $aEvent['params_preg'][]=func_get_arg($i);
    }
    $aRegisterEvent[]=$aEvent;
	
	return $aRegisterEvent;
}

function Event_RunEvents() {
	global $aRegisterEvent, $page;
	
	
	$sCurrentEvent = str_replace("/".$page."/",  "", $_SERVER['REQUEST_URI']);
	$aCurrentEvent = explode("/",$sCurrentEvent);

	foreach($aCurrentEvent as $key=>$s){
		if($key!=0 and $s==""){
			unset($aCurrentEvent[$key]);
		}
	}
	$aCurrentEvent = array_values($aCurrentEvent);
	
	
    foreach ($aRegisterEvent as $aEvent) {
		
		if("Module".ucfirst($page) != $aEvent['module']){
			continue;
		}

		if (preg_match($aEvent['preg'],$aCurrentEvent[0],$aMatch)) {
			
			if($aCurrentEvent[0]=='' and count($aCurrentEvent)>1 and $aCurrentEvent[1]!=$page){
				Event_PageNotFound();
				exit;
			}
            $aParamsEventMatch['event']=$aMatch;
            $aParamsEventMatch['params']=array();
            foreach ($aEvent['params_preg'] as $iKey => $sParamPreg) {
			
                if (preg_match($sParamPreg,$aCurrentEvent[$iKey+1],$aMatch)) {
                    $aParamsEventMatch['params'][$iKey]=$aMatch;
                } else {				
                    continue 2;
                }
            }
			
            $sCurrentEventName=$aEvent['name'];			
            $result=call_user_func_array($aEvent['method'],array());
            return $result;
        }
    }
    //return Event_EventNotFound();
}

function Event_EventNotFound(){
	echo 'Event not found';
	exit;
}

function Event_PageNotFound($iErrorCode=null){
	global $config;
	if(!preg_match('/^(\d)+$/', $iErrorCode)){
		$iErrorCode = 404;
	}
	header("Location: ".$config['path_root_web']."/error/".$iErrorCode);
}

?>