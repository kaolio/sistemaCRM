@extends('adminlte::page')
@section('content')
</br>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

<style>
    
   .table-responsive{
     font-size: 14px;
   }
   
  </style>
<div class="card">
    
    <div class="card-body">

        
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Atencion Urgente</p>
                    </div>
                    <div class="icon">
                        <span class="iconify" data-icon="ion:warning-outline"></span>
                    </div>
                    <a href="#" class="small-box-footer">
                        "Mas detalles"
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Trabajos Completos</p>
                    </div>
                    <div class="icon">
                        <span class="iconify" data-icon="ion:checkmark-sharp"></span>
                    </div>
                    <a href="#" class="small-box-footer">
                        "Mas detalles"
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Trabajos Pendientes</p>
                    </div>
                    <div class="icon">
                        <span class="iconify" data-icon="ion:time-outline"></span>
                    </div>
                    <a href="#" class="small-box-footer">
                        "Mas detalles"
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>150</h3>
                        <p>Trabajos Pagados</p>
                    </div>
                    <div class="icon">
                        <span class="iconify" data-icon="ion:cash-outline"></span>
                    </div>
                    <a href="#" class="small-box-footer">
                        "Mas detalles"
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!--Tabla-->
        <div class="row">
            <div class="col-9">
                            <div class="card"> 
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="tabla-pacientes">
                                            <thead class="table-primary table-striped table-bordered text-white" >
                                            <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                                                <tr>
                                                    <th class="column2 text-center" style="width: 100px">Usuario</th>
                                                    <th class="column2 text-center" style="width: 100px">Fecha</th>
                                                    <th class="column3 text-center"style="width: 80px">NºOrden</th>
                                                    <th class="column4 text-center">Comentarios</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="datosDashboard" class="table-bordered">
  
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
    <!--Fin Tabla-->
</div>
<script>
  /*  $(document).ready(function() {

        var url = "{{URL('datosDashboard')}}";
        //console.log(url)
        $.ajax({
            url: "/home/datosDashboard",
            type: "POST",
            data:{ 
                "_token": "{{ csrf_token() }}",
                "nombre": ,
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                console.log(dataResult);
                var resultData = dataResult.data;
                var bodyData = '';
                

                $.each(resultData,function(index,row){
                    datosDashboard+="<tr>"
                    datosDashboard+="<td>"+row.creado+"</td><td>"+row.created_at+"</td><td>"+row.id_trabajos+"<td>"+row.nota+"<td>"+"</td>";
                    datosDashboard+="</tr>";
                    
                })
                $("#datosDashboard").append(datosDashboard);
            }
        });

});*/
</script>

@endsection