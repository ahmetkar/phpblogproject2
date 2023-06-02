	
$(function(){

var uzunluk = $("ul#galeri li").length;

if(uzunluk>6){

$("ul#galeri li:gt(5)").hide();


$("li#gsag").show();
}else {

$("li#gsag").hide();
$("li#gsol").hide();

}



$("li#gsol").click(function(){
$("ul#galeri li:lt(2)").show(100);
$("ul#galeri li:eq(6)").hide();
$("ul#galeri li:eq(7)").hide();
});

$("li#gsag").click(function(){

$("ul#galeri li:lt(8)").show(100);
$("ul#galeri li:lt(2)").hide();
});

var uzunluk2 = $("ul#galeri2 li").length;

if(uzunluk2>6){

$("ul#galeri2 li:gt(5)").hide();


$("li#gsag2").show();
}else {

$("li#gsag2").hide();
$("li#gsol2").hide();

}



$("li#gsol2").click(function(){
$("ul#galeri2 li:lt(2)").show(100);
$("ul#galeri2 li:eq(6)").hide();
$("ul#galeri2 li:eq(7)").hide();
});

$("li#gsag2").click(function(){

$("ul#galeri2 li:lt(8)").show(100);
$("ul#galeri2 li:lt(2)").hide();
});


$("a.galericek").click(function(){

var gid = $("ul.galeri li:last").attr("id");

$.ajax({
	url: "/application/ajax/rgalericek.php",
	type: "post",
	data: {"gelenid":gid},
	success: function(cevap){

	$("ul.galeri").append(cevap);

	}
});


});

$("a.vcek").click(function(){

var gid = $("ul.vgaleri li:last").attr("id");

$.ajax({
	url: "/application/ajax/vgalericek.php",
	type: "post",
	data: {"gelenid":gid},
	success: function(cevap){

	$("ul.vgaleri").append(cevap);
	}
});


});



});
