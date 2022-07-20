<html lang="es">

<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="Tjczq4oHHAsa9A3OVW1mQsoczUVfUBDLSMbBi8w1">

    
    <style>
  
        .menor{
          color: red;
          font-size: medium;
        }    
        .error{
            color:#cf1111;
            font-size: medium;
        }
</style>
    
    <title>
                CRM Data Solution            </title>

    

    
            <link rel="stylesheet" href="http://localhost:8000/vendor/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="http://localhost:8000/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">

        
        
        <link rel="stylesheet" href="http://localhost:8000/vendor/adminlte/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    
    
    
            
    
    
</head>

<body class="login-page" >

    
        <div class="login-box">

        
        <div class="login-logo">
            <a href="http://localhost:8000/home">
                <img src="http://localhost:8000/vendor/adminlte/dist/img/AdminLTELogo.png" height="50">
                <b>CRM</b>&nbsp;CLIENTE
            </a>
        </div>

        
        <div class="card ">

            
                            <div class="card-header bg-gradient-info">
                    <h3 class="card-title float-none text-center">
                        Iniciar Sesion                    </h3>
                </div>
            
            
            <div class="card-body login-card-body ">   
        <div class="input-group mb-3">
            <input type="text" name="numero" id="numero" class="form-control "
                   value="" placeholder="Numero de Telefono" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone fa-lg text-info"></span>
                </div>
            </div>

                    </div>

        
        <div class="input-group mb-3">
            <input type="password" name="password" id="password" class="form-control "
                   placeholder="Contraseña">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock fa-lg text-info"></span>
                </div>
            </div>

                    </div>
            <span id="error"></span>
            <br>
        
        <div class="row justify-content-center">
            <div class="col-5">
<button onclick="enviar()" class="btn btn-block btn-flat btn-primary">
                    <span class="fas fa-sign-in-alt"></span>
                    Ingresar
                </button>
            </div>
                
        </div>

            </div>

            
            
        </div>

    </div>

    
            <script src="http://localhost:8000/vendor/jquery/jquery.min.js"></script>
        <script src="http://localhost:8000/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://localhost:8000/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        
        
        <script src="http://localhost:8000/vendor/adminlte/dist/js/adminlte.min.js"></script>
    
    
    
    <script>
        function enviar(){
            var num = $("#numero").val();
            var pass = $("#password").val();
        $.ajax({
            url: "/login/cliente",
            type: "POST",
            data: {
              "_token": "{{ csrf_token() }}",
              numero : num,
              password: pass,
            },
            cache: false,
            dataType: 'json',
            success: function (dataResult) {
                if (dataResult.data != false) {
                    window.location =dataResult.data;
                }else{
                    $("#error").html("<span  class='error'><h5 class='menor'>El numero o contraseña ingresada es incorrecto</h5></span>"); 
                }
            }
        });

        }
    </script>
            
</body>


</html>