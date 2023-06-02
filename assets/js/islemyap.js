$(function(){




  $("input#islem").click(function(){

  $("#bilgi").show();

$("#islemform").ajaxForm({
  target: '#bilgi'
}).submit();

$("input#islem").fadeOut();
$("input#islem2").fadeOut();

});

$("input#islem2").click(function(){

  $("#bilgi").show();

$("#islemform2").ajaxForm({
  target: '#bilgi'
}).submit();

$("input#islem").fadeOut();
$("input#islem2").fadeOut();

});



$("input#yorumyap").click(function(){

  $("#ybilgi").show();

$("#yorumform").ajaxForm({
  target: '#ybilgi'
}).submit();



});


});