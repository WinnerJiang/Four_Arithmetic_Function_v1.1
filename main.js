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

		//Ajax request to calculate.php
		operation = "add";
		//get variables
		firstNumVal = $("#firstNum").val();
		secondNumVal = $("#secondNum").val();

		$.ajax({
			type:"POST",
			url:"calculate.php",
			data:{operation:operation,firstNum:firstNumVal,secondNum:secondNumVal},
			dataType:"json",
			success:function(data){
				$.addFunctionCallback(data);
			}  //notice! cannot directly use $.addFunctionCallback(data); y????
		});

	});


		$.addFunctionCallback = function(response){
			alert("hello addFunctionCallback!");
			//alert(response);
			console.log(response);

			//set result
			$("#result").html(response);


		};
});

