$(function(){

$("a#rg").mouseover(function(){
$("img#fteleman").prev("#kaplama").show();
});
$("div#kaplama").mouseout(function(){
$("img#fteleman").prev("#kaplama").hide();	
});

$("a#vg").mouseover(function(){

$("img#vdeleman").prev("#kaplama").show();

});
$("div#kaplama").mouseout(function(){
$("img#vdeleman").prev("#kaplama").hide();	
});



});