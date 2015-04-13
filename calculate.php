<?php
session_start();
setcookie("user");
$sessionid=session_id();


//get user session id and record user's input of calculation
//file named by sessionId
$fileExtensionType = ".txt";
$recordFileName = $sessionid.$fileExtensionType;
$recordFile =fopen($recordFileName, "w");


$operation=$_POST['operation'];
$FirstNum = $_POST['firstNum'];
$SecondNum = $_POST['secondNum'];
$Result = 0;

if($operation=="add"){
	$Result = addFunction($FirstNum,$SecondNum);
	//var_dump($sessionid);
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