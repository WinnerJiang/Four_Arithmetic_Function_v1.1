<?php
session_start();
setcookie("user");
$sessionid=session_id();
//eval $sessionid;

//get user session id and record user's input of calculation


$operation=$_POST['operation'];
$FirstNum = $_POST['firstNum'];
$SecondNum = $_POST['secondNum'];
$Result = 0;

if($operation=="add"){
	$Result = addFunction($FirstNum,$SecondNum);
	$response = array('result' => $Result,
					  'sessionid'=>$sessionid );
//	eval($response);
	echo json_encode($response);	
}

if($operation =="sub"){
	$Result = subFunction($FirstNum,$SecondNum);
	echo json_encode($Result);
}

function addFunction($a,$b){
	//print_r($a,$b);
	$result =0;
	$result = $a + $b;
	return $result;
};

function subFunction($a,$b){
	$result = $a - $b;
	return $result;
};

?>