$(function(){


$("span#down").click(function(){

$(this).hide();
$("span#up").show();

$(".uyepanel").fadeIn();

});

$("span#up").click(function(){

$(this).hide();
$("span#down").show();

$(".uyepanel").fadeOut();

});

$("span.deneme").click(function(){
	$(".girisyapan").show();
	$(".girisyapmayan").hide();
});

$("input[name=ara]").keyup(function(){

$(".hizlisonuc").show();

var veri = $("input[name=ara]").val();

if(veri==""){
	$(".hizlisonuc").hide();
}

$.ajax({
	url: "/application/ajax/sonuccek.php",
	type: "post",
	data: {"veri":veri},
	success:function(cevap){
	$(".hizlisonuc ul").html(cevap);

	}

});

});


});

$("img#uyeprofil").error(function(){

$("img#uyeprofil").attr("src","/assets/resim/avatarnone.jpg");

$(window).scroll(function(){

if($(window).scrollTop()==70){

	$(".uyepanel").css({"position":"fixed","top":"0","left":0});

}

});


});
