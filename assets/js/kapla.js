$(function(){


$("img#benzerresim").hover(function(){
	$("#kapla").show(100);
});

$("#kapla").mouseout(function(){
	$(this).hide(100);
});

});