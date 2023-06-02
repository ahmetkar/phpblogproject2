$(function(){


$("ul.resimgaleri li:not(:first)").hide();


$("span#solicon").click(function(){

var index = $("ul.resimgaleri li:visible").prev().index();

$("ul.resimgaleri li:visible").fadeOut();
$("ul.resimgaleri li:eq("+index+")").fadeIn(100);


});


$("span#sagicon").click(function(){

var index = $("ul.resimgaleri li:visible").next().index();

$("ul.resimgaleri li:visible").fadeOut();
$("ul.resimgaleri li:eq("+index+")").fadeIn(100);

});


});