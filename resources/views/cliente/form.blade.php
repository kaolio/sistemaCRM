
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
    <div class="card-body">
  <div class="row">
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="form-group">
            <label for="nombre">Nombre del cliente</label>
        <input type="text" name="Nombre" id="nombre" class="form-control" value="{{$cliente->nombreCliente}}" required onkeyup="validarNombre()" placeholder="Nombre" tabindex="1">
        
        </div>
    </div>

    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <label for="apellido">VATID</label>
            <input type="text" id="vat" name="vat" value="{{$cliente->vat}}" required onkeyup="validarVat()" class="form-control" tabindex="2">
            
        </div>
    </div>
    </div>
    </div>
  </div> 
  <div class="card">
      <div class="card-body">
    <div class="row">

      <div class="col-xs-8 col-sm-8 col-md-8">
          <div class="form-group">
              <label for="calle">Direccion</label>
              <input type="text" name="calle" id="street" value="{{$cliente->calle}}" required onkeyup="validarCalle()" class="form-control" placeholder="Calle"tabindex="1">
              {!! $errors->first('calle','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
          </div>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2">
          <div class="form-group">
              <label for="num">Numero</label>
              <input type="text" name="Num" id="numero" value="{{$cliente->numero}}" required onkeyup="validarNumero()" class="form-control" tabindex="2">
          </div>
      </div>

      <div class="col-xs-2 col-sm-2 col-md-2">
          <div class="form-group">
              <label for="apt">Apt</label>
              <input type="text" name="apt" value="{{$cliente->apt}}" id="Ap" required onkeyup="validarApt()" class="form-control"tabindex="3">
          </div>
      </div>
    </div>
      </div>
   </div>
<div class="card">
    <div class="card-body">
    <div class="row">

      <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
              <label for="CodigoP">Codigo Postal</label>
              <input type="number" name="codP" id="Postal" value="{{$cliente->codigoPostal}}" required onkeyup="validarCodigoPostal()" class="form-control" tabindex="1">
          </div>
      </div>

      <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
              <label for="PAK">PAK</label>
              <input type="text" name="pak" id="pak" value="{{$cliente->pak}}" class="form-control" tabindex="2" required onkeyup="validarPak()">
          </div>
      </div>

      <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
              <label for="apt">Nombre de la ciudad</label>
              <input type="text" name="city" id="nameCity" value="{{$cliente->nombreCiudad}}" class="form-control"tabindex="3" required onkeyup="validarCiudad()">
          </div>
      </div>
    </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <label for="pais">Pais</label>
            <input type="text" name="pais"  id="country" value="{{$cliente->pais}}" class="form-control" required onkeyup="validarPais()">
        </div>
        </div>
    </div>
    </div>
</div>
<div class="card">
<div class="card-body">
<label> Idioma UI del cliente</label>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group" style="display: flex;">
            <label for="UI">Idioma </label>
            <select name="language" class="form-control" required value="{{$cliente->idioma}}">
                <option selected disabled value="">Seleccione el idioma</option>
                  @if ($cliente->idioma == $cliente->idioma)
                    <option value="{{$cliente->idioma}}" selected>{{$cliente->idioma}}</option>                      
                  @else
                    <option value="{{$cliente->idioma}}">{{$cliente->idioma}}</option>      
                  @endif
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
</div>
<div class="container">
    <h4>Detalles</h4>
          <td><button type="button" name="remove" id="" class="btn btn-danger btn_remove" style="border-radius: 50%;">X</button></td>
          <td class="btn-block"><button type="button" name="add" id="add1" class="btn add-btn btn-info" style="border-radius: 50%;"><i class="fa fa-plus"></i> </button></td>

<div class="card">
    <div class="card-body">
        <div class="row" id="dynamic_field">
    <div class="col-xs-4 col-sm-4 col-md-4">
      <div class="form-group">
        <label for="Type">Tipo </label>
        <select name="tipo" class="form-control" required value="{{$cliente->tipo}}">
            <option selected disabled value="">Seleccione el tipo</option>
                  @if ($cliente->tipo == $cliente->tipo)
                    <option value="{{$cliente->tipo}}" selected>{{$cliente->tipo}}</option>                      
                  @else
                    <option value="{{$cliente->tipo}}">{{$cliente->tipo}}</option>      
                  @endif
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
              <input type="text" name="value" id="value" value="{{$cliente->valor}}" class="form-control"tabindex="3" required onkeyup="validarValor()">
          </div>
      </div>

      <div class="col-xs-4 col-sm-4 col-md-4">
          <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="na" id="nameN" value="{{$cliente->nombre}}" class="form-control"tabindex="3">
          </div>
      </div>
      </div>
    </div>
 </div>
</div>
    <div class="card">
        <div class="card-body">
          <div class="form-group">
          <label style="font-size: 16px;">Nota</label>
            <input type="text" style="height: 5em"name="info" value="{{$cliente->nota}}" class="btn-block">
           </div>
        </div>
     </div>

     <div class="form-group">
        <button type="submit" class="btn btn-lg btn-dark">Actualizar</button>
        <a href="{{url('/clientes')}}" class="btn btn-lg btn-secondary float-right">Regresar a clientes</a>
  </div>



