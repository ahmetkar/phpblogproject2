$(function(){

$("a#katagoricek").click(function(){

var id = $("ul#katagorul li:last").attr("id");
var kid = $("ul#katagorul li:last").attr("class");
$.ajax({

	url: "/application/ajax/katagori.php",
	type: "post",
	data: {"gelenid":id,"kid":kid},
	success: function(cevap){

	$("ul#katagorul").append(cevap);

	}

});

});



});
