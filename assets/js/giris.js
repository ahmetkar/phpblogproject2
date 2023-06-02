 $(function(){

   $("input#girisyap").click(function(){

   $("#girisbilgi").show();
   
   $("#girisform").ajaxForm({

   target: '#girisbilgi' 

   }).submit(); 


   }); 

  });