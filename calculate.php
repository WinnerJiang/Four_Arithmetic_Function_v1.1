<?php
session_start();
//get user session id and record user's input of calculation


$operation=$_POST['operation'];
$FirstNum = $_POST['firstNum'];
$SecondNum = $_POST['secondNum'];
$Result = 0;


if($operation=="add"){
	$Result = addFunction($FirstNum,$SecondNum);
	echo json_encode($Result);	
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