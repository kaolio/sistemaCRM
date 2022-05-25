@extends('adminlte::page')
@section('content')
</br>
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
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
</div>
@endsection