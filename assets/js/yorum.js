$(function(){

$("a.digerleri").click(function(){
var gelenid = $("ul.yorumlar li:last").attr("id");
var yaziid = $("ul.yorumlar li:last").attr("class");

$.ajax({

	url: "/application/ajax/yorumcek.php",
	type: "post",
	data: {"gelenid":gelenid,"yaziid":yaziid},
	success: function(cevap){

	$("ul.yorumlar").append(cevap);

	}

});


});

$("a.rdigerleri").click(function(){
var gelenid = $("ul.yorumlar li:last").attr("id");
var yaziid = $("ul.yorumlar li:last").attr("class");

$.ajax({

	url: "/application/ajax/rgyorum.php",
	type: "post",
	data: {"gelenid":gelenid,"yaziid":yaziid},
	success: function(cevap){

	$("ul.yorumlar").append(cevap);

	}

});


});

$("a.vdigerleri").click(function(){
var gelenid = $("ul.yorumlar li:last").attr("id");
var yaziid = $("ul.yorumlar li:last").attr("class");

$.ajax({

	url: "/application/ajax/vgyorum.php",
	type: "post",
	data: {"gelenid":gelenid,"yaziid":yaziid},
	success: function(cevap){

	$("ul.yorumlar").append(cevap);

	}

});


});

});
