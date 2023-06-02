$(function(){

$(".deg").hide();
$(".deg2").hide();

$(".tabview:not(:first)").hide();
$("ul#tabmenu li").click(function(){
var index = $(this).index();
$(".tabview").hide();
$(".tabview:eq("+index+")").show();

});

$("a.duzenle").click(function(){
$("#degisken").fadeToggle();
$(".deg").fadeToggle();

$("input.deg").keyup(function(){

var val = $(this).val();
var id = $("input#uyeid").val();
$.ajax({
  url: "/application/ajax/pduzenle.php",
  type: "post",
  data: {"val":val,"id":id},
  success: function(cevap){
    $("#degisken").html(cevap);
  }
});

});

});

$("a.duzenle2").click(function(){
$("#degisken2").fadeToggle();
$(".deg2").fadeToggle();
$("input.deg2").keyup(function(){

var val = $(this).val();
var id = $("input#uyeid").val();
$.ajax({
  url: "/application/ajax/pduzenle.php",
  type: "post",
  data: {"val2":val,"id":id},
  success: function(cevap){
    $("#degisken2").html(cevap);
  }
});

});
});



});
