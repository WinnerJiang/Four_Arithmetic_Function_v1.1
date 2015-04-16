<?php
error_reporting(0);
session_start();
setcookie('name','PHPSESSID',time()+300);

$sessionid=session_id();
write('6===='.$sessionid);

// echo 'document.write($sessionid)';

//get user session id and record user's input of calculation
//file named by sessionId
//$fileExtensionType = ".txt";
//$recordFileName = $sessionid.$fileExtensionType;
//$recordFile =fopen($recordFileName, "w");
//
// $_SESSION['calculatRecord']="";
$operation=$_POST['operation'];
$FirstNum = $_POST['firstNum'];
$SecondNum = $_POST['secondNum'];
$Result = 0;

if($operation=="add"){
	$Result = addFunction($FirstNum,$SecondNum);
	$recordCal = $FirstNum.'+'.$SecondNum.'='.$Result."\r\n";
	$_SESSION['calculatRecord']=$_SESSION['calculatRecord'].$recordCal;
	$response = array('result' => $Result,
					  'record'=> $_SESSION['calculatRecord']);
	echo json_encode($response);	
}

if($operation =="sub"){
	$Result = subFunction($FirstNum,$SecondNum);
	$recordCal = $FirstNum.'-'.$SecondNum.'='.$Result."\r\n";
	$_SESSION['calculatRecord']=$_SESSION['calculatRecord'].$recordCal;
	$response = array('result' => $Result,
					  'record'=> $_SESSION['calculatRecord']);
	echo json_encode($response);
}

if($operation =="multi"){
	$Result = multiFunction($FirstNum,$SecondNum);
	$recordCal = $FirstNum.'*'.$SecondNum.'='.$Result."\r\n";
	$_SESSION['calculatRecord']=$_SESSION['calculatRecord'].$recordCal;
	$response = array('result' => $Result,
					  'record'=> $_SESSION['calculatRecord']);
	echo json_encode($response);
}

if($operation =="div"){
	$Result = divFunction($FirstNum,$SecondNum);
	$recordCal = $FirstNum.'/'.$SecondNum.'='.$Result."\r\n";
	$_SESSION['calculatRecord']=$_SESSION['calculatRecord'].$recordCal;
	write($recordCal);
	$response = array('result' => $Result,
					  'record'=> $_SESSION['calculatRecord']);
	echo json_encode($response);
}

function addFunction($a,$b){
	$result =0;
	$result = $a + $b;
	return $result;
};

function subFunction($a,$b){
	$result =0;
	$result = $a - $b;
	return $result;
};

function multiFunction($a,$b){
	$result =0;
	$result = $a * $b;
	return $result;
};

function divFunction($a,$b){
	$result =0;
	$result = $a / $b;
	return $result;
};

//logger for test from internet
/*
	* write files function
	* @param string $filename 
	* @param string $text 要写入的文本字符串
	* @param string $openmod 文本写入模式（'w':覆盖重写，'a':文本追加）
	* @return boolean
*/

function write_file($filename,$text,$openmod = 'w'){
	if(@$fp = fopen($filename, $openmod)){
		flock($fp, 2);
		fwrite($fp, $text);
		fclose($fp);
		return true;
	}
	else{
		return false;
	}
}

/*
 * 写对象（包括 数字、字符串、数组）
* 本地调试用
* @param string $text 要写入的文本字符串
* @param string $type 文本写入类型（'w':覆盖重写，'a':文本追加）
*/
function write($text,$type = 'a'){
	if(!is_dir('C:/xampp/htdocs')){
		return false;
	}
	$filename = 'C:/Users/user/workspace/Four_Arithmetic_Function_v1.1/write.txt';
	$text = "\r\n++++++++++++++++++++++++++++++++++++++++++\r\n"
		.date('Y-m-d H:i:s')."\r\n"
		//.print_r($linenum)
		.print_r($text,true);//($text,true);
	write_file($filename,$text,$type);
}

/*
* 页面输出调试
*/
function wjb($obj,$die = 1){
	print_r($obj);
	$die && die();
}

?>