/*	
	send parameter from html to php through Ajax
*/


$(document).ready(function(){

	alert("hello jQuery!");
	var operation ="";
	var response="";
	var firstNumVal = "";
	var secondNumVal ="";


	//send add function para
	$("#addButton").click(function(){
		alert("hello addButton!");
		operation = "add";
		//get variables
		firstNumVal = $("#firstNum").val();
		secondNumVal = $("#secondNum").val();
		//Ajax request to calculate.php		
		$.callCalculateRequest(operation,firstNumVal,secondNumVal);
	});

	$("#subButton").click(function(){
		alert("hello addButton!");
		operation = "sub";
		//get variables
		firstNumVal = $("#firstNum").val();
		secondNumVal = $("#secondNum").val();
		//Ajax request to calculate.php		
		$.callCalculateRequest(operation,firstNumVal,secondNumVal);
	});

    
    $.callCalculateRequest = function(oper,first,second){
    	$.ajax({
			type:"POST",
			url:"calculate.php",
			data:{operation:oper,firstNum:first,secondNum:second},
			dataType:"json",
			success:function(data){
				$.FunctionCallback(data);
			}  //notice! cannot directly use $.addFunctionCallback(data); y????
		});
    };

	$.FunctionCallback = function(response){
			alert("hello addFunctionCallback!");
			//alert(response);
			console.log(response);

			//set result
			$("#result").html(response.result);
			$("#record").html(response.sessionid);

	};
});

