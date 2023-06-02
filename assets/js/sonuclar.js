$(function(){


$(".tab_view:not(:first)").hide();
$("ul#tabmenu li").click(function(){
var index = $(this).index();
$(".tab_view").hide();
$(".tab_view:eq("+index+")").show();

});


$("a#sonuclarcek").click(function(){

var id = $("ul.hul li:last").attr("id");
$.ajax({

	url: "/application/ajax/hsonuc.php",
	type: "post",
	data: {"gelenid":id},
	success: function(cevap){

	$("ul.hul").append(cevap);

	}

});

});

$("a#rsonuclarcek").click(function(){

var id = $("ul.rul li:last").attr("id");
$.ajax({

	url: "/application/ajax/rsonuc.php",
	type: "post",
	data: {"gelenid":id},
	success: function(cevap){

	$("ul.rul").append(cevap);

	}

});

});

$("a#vsonuclarcek").click(function(){

var id = $("ul.vul li:last").attr("id");
$.ajax({

	url: "/application/ajax/vsonuc.php",
	type: "post",
	data: {"gelenid":id},
	success: function(cevap){

	$("ul.vul").append(cevap);

	}

});

});


});
