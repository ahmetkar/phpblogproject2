$(function(){	

$("ul#haberg li#hbr").hide();

$("ul#haberg li#bs").mouseover(function(){

var index = $(this).index()+1;
$("ul#haberg li:eq("+index+")").fadeIn(100);

});

$("ul#haberg li#hbr").mouseleave(function(){
	$(this).fadeOut(100);
});


});