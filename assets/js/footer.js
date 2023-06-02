$(function(){


var uzunluk = $("ul#goruntule li").length;

if(uzunluk>4){

$("ul#goruntule li:gt(3)").hide();


$("li#next").show();
}



$("li#prev").click(function(){
$("ul#goruntule li:lt(4)").show(100);
$("ul#goruntule li:gt(3)").hide();
});

$("li#next").click(function(){

$("ul#goruntule li:gt(3)").show(100);
$("ul#goruntule li:lt(4)").hide();
});


$(".gazte a").attr("href","#");

});