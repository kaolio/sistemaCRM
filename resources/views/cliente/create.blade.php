@extends('adminlte::page')
@section('content')


<body>
 <div class="card">
     <div class="card-header">

     </div>
     <div class="card-body">
        <h2>Añadir nuevo cliente</h2>
        <div class="container-fluid">
            <form action="{{url('/cliente/nuevo')}}" method="POST">
              @csrf
              @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                      @endforeach
                  </ul>      
                </div>
                @endif  
              <div class="card">
                <div class="row">
                  <div class="col-xs-10 col-sm-10 col-md-10">
                      <div class="form-group">
                          <label for="nombre" style="justify-content-center;">Nombre del cliente</label>
                      <input type="text" name="Nombre" id="nombre" class="form-control" placeholder="Nombre" tabindex="1">
                      
                      </div>
                  </div>
              
                  <div class="col-xs-2 col-sm-2 col-md-2">
                      <div class="form-group">
                          <label for="apellido">VATID</label>
                          <input type="text" id="vat" name="vat"  class="form-control" tabindex="2">
                          
                      </div>
                  </div>
                  </div>
                </div> 
                <div class="card">
                  <div class="row">
              
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <label for="calle">Direccion</label>
                            <input type="text" name="calle" id="street"  class="form-control" placeholder="Calle"tabindex="1">
                            {!! $errors->first('calle','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                        </div>
                    </div>
              
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="num">Numero</label>
                            <input type="text" name="Num" id="numero"  class="form-control" tabindex="2">
                        </div>
                    </div>
              
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="apt">Apt</label>
                            <input type="text" name="apt" id="Ap"  class="form-control"tabindex="3">
                        </div>
                    </div>
                  </div>
                 </div>
              <div class="card">
                  <div class="row">
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="CodigoP">Codigo Postal</label>
                            <input type="number" name="codP" id="Postal"  class="form-control" tabindex="1">
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="PAK">PAK</label>
                            <input type="text" name="pak" id="pak"  class="form-control" tabindex="2">
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="apt">Nombre de la ciudad</label>
                            <input type="text" name="city" id="nameCity"  class="form-control"tabindex="3">
                        </div>
                    </div>
                  </div>
              </div>
              <div class="card">
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                       <div class="form-group">
                          <label for="pais">Pais</label>
                          <input type="text" name="pais"  id="country" class="form-control">
                      </div>
                      </div>
                  </div>
              </div>
              <div class="card">
              <label> Idioma UI del cliente</label>
                  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group" style="display: flex;">
                          <label for="UI">Idioma </label>
                          <select name="language" class="form-control">
                              <option value="0">Seleccione el idioma</option>
                              <option value="Español">Español</option>
                              <option value="Ingles">Ingles</option>
                              <option value="Frances">Frances</option>
                              <option value="Chino">Chino</option>
                          </select>
                      </div>
                      </div>
                  </div>
              </div>
              <div class="container">
                  <h4>Detalles</h4>
                        <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove" style="border-radius: 50%;">X</button></td>
                        <td class="btn-block"><button type="button" name="add" id="add1" class="btn add-btn btn-info" style="border-radius: 50%;"><i class="fa fa-plus"></i> </button></td>
              
              <div class="card">
              <div class="row" id="dynamic_field">
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                      <label for="Type">Tipo </label>
                      <select name="tipo" class="form-control">
                          <option value="0">Seleccione el tipo</option>
                          <option value="Email">Email</option>
                          <option value="Telefono">Telefono</option>
                          <option value="Celular">Celular</option>
                          <option value="Skype">Skype</option>
                          <option value="Fax">Fax</option>
                        </select>
                      </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group" >
                            <label for="valor">Valor</label>
                            <input type="text" name="value" id="value"  class="form-control"tabindex="3">
                        </div>
                    </div>
              
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="na" id="nameN"  class="form-control"tabindex="3">
                        </div>
                    </div>
                    </div>
               </div>
              </div>
                  <div class="card">
                        <div class="form-group">
                        <label style="font-size: 16px;">Nota</label>
                          <input type="text" style="height: 5em"name="info"  class="btn-block">
                         </div>
                   </div>
              
                   <div class="form-group">
                <a href="" class="btn btn-warning my-2 my-sm-0">Resetear</a>
                <button class="btn btn-success" type="submit">Guardar y Crear el trabajo</button>
                <button class="btn btn-success my-2 my-sm-0" type="submit" value="Guardar Datos">Guardar</button>
                </div> 
                   
                    </form>
                </div>
            
      
                 
      
     </div>
     <div class="card-footer">
         Footer
     </div>
 </div>  
</body>

@endsection