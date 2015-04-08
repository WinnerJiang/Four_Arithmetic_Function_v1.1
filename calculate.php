<?php

$operation=$_POST['operation'];
$FirstNum = $_POST['firstNum'];
$SecondNum = $_POST['secondNum'];
$Result = 0;


if($operation=="add"){
	$Result = addFunction($FirstNum,$SecondNum);
	echo json_encode($Result);	
}


function addFunction($a,$b){
	print_r($a,$b);
	$result =0;
	$result = $a + $b;
	return $result;
};

?>