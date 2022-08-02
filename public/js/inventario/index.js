document.oncontextmenu = function(){return false}
  
            function mayus(e) {
              $("#stateRow").html("<span  class='bien'><h5 ></h5></span>");
                e.value = e.value.toUpperCase();
            }

  function buscarFinal(datos,select,cantidad){
    var res = datos * select;
    console.log(res);
    return res;
  }

  function buscarInicio(final,select){
    var res = parseFloat(final)-parseFloat(select);
    return res;
    console.log(res);
  }

  //REDIRECT PAGINATOR
 

  function factor(filas,select) {
    var count = 0;
    var res = filas;
    while (res > 0) {
      res = filas - select;
      filas = res;
      count = count+1;
    }
    return count;
  }
  //VISTA GENERAL INVENTARIO
  

  //
    $(document).on('change keyup', '.required', function(e){
    let Disabled = true;
      $(".required").each(function() {
        let value = this.value
        if ((value)&&(value.trim() !=''))
            {
              Disabled = false
            }else{
              Disabled = true
              return false
            }
      });
    
    if(Disabled){
          $('#btnBuscar').prop("disabled", true);
        }else{
          $('#btnBuscar').prop("disabled", false);
        }
  });
    