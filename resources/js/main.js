$('form#register').submit(function(e) {
   e.preventDefault();
   var info=$(this).serealise()
   
   $.ajax({
       url:'/register',
       type:'POST',
       data:info,
       success:function(res){
           console.log(res);
       }, 
       error:function(res){
           console.log(res);
       }
   })
});