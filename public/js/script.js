var modalConfirm = function(callback){
       $(".btn-edit").on("click", function(){
        $value = $(this).val();
        $("#modal").modal('show');
    });
  
    $("#modal-btn-y").on("click", function(){
      callback(true);
      $("#modal").modal('hide');
    });
    
    $("#modal-btn-n").on("click", function(){
      callback(false);
      $("#modal").modal('hide');
    });
  };
  
  modalConfirm(function(confirm){
    if(confirm){
      $(location).attr('href', "/produtos/remove/"+$value);
    }
  });