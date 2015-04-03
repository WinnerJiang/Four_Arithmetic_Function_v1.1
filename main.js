/*	
	send parameter from html to php through Ajax
*/


$(document).ready(function(){

	alert("hello jQuery!");
	var operation ="";
	var response="";

	//send add function para
	$("#addButton").click(function(){
		alert("hello addButton!");

		//Ajax request to calculate.php
		operation = "add";

		$.ajax({
			type:"POST",
			url:"calculate.php",
			data:{operation:operation,firstNum:"222",secondNum:"33"},
			dataType:"json",
			success:function(data){
				$.addFunctionCallback(data);
			}  //notice! cannot directly use $.addFunctionCallback(data);
		});

		$.addFunctionCallback = function(response){
			alert("hello addFunctionCallback!");
			alert(response);

		};
	});



});

