"use strict";
$(document).ready(function () {
	
	$("#login").blur(function () {
		$.ajax({
			url: "system/ajax2.php",
			data: "login=" + $("#login").val(),
			success: function (result) {
				if (result == "занят") {
					alert("Логин " + $("#login").val() + " - З А Н Я Т !!!");
					$("#login").val("");	
				} 
			}
		});
	});
	
});