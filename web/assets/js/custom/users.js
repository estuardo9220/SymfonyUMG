$(document).ready(function(){
    
  var ias = jQuery.ias({
      container: '.box-users',
      item: '.user-item',
      pagination: '.pagination',
      next: '.pagination .next_link',
      triggerPageThreshold: 5
      
  });
  
  ias.extension(new IASTriggerExtension({
      text: 'ver mas',
      offset: 3
  }));
  
  
 ias.extension(new IASSpinnerExtension({
 src: URL+'/../assets/images/ajax-loader.gif'
 }));
    
    ias.extension(new IASNoneLeftExtension({
      
      text: 'no hay mas usuarios'
  }));
  
  
  
  ias.on('ready', function(event){
      followButtons();
  });
  
  
  ias.on('rendered', function(event){
      followButtons();
  });
  
});


function followButtons(){
      $(".btn-follow").unbind("click").click(function(){
          $.ajax({
              url: URL+'/follow',
              type: 'POST',
              data: {followed: $(this).attr("data-followed")},
              success: function(response){
                 console.log(response);
              }
              
          });
          
      });
  }

