@extends('layouts.app')

@section('metadatos')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('css')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">REGISTRO DEL PROYECTO</h3>
            </div>
            <!--begin::Form-->
            
            <form action="{{ url('User/guarda') }}" method="POST" id="formularioPersona">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- <button type="button" class="btn btn-block btn-primary">DATOS GENERALES</button>     --}}
                            <button type="button" class="btn btn-outline-primary">DATOS GENERALES</button>            
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">METAS</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">RESPONSABLES</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">CLASIFICACION</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">LOCALIZACION</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">OBJETIVOS</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">RESUMEN TECNICO</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">ANEXOS</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-block btn-primary">FASE / ETAPA</button>
                        </div>

                    </div>
                    <br />

                    <div id="bloque-carga">

                        <div class="row">

                            <div class="col-md-8">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">
                                                NOMBRE DEL PROYECTO, PROGRAMA Y OPERACION INSTITUCIONAL
                                                <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">TIPO OPERACION
                                                <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="ci" name="ci" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">PONDERACION
                                                <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" required />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">CODIGO SISIN
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" required />
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">FECHA INICIAL DEL PROYECTO
                                                <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">FECHA FINAL PROYECTO
                                                <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required />
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">PROGRAMA
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">PROYECTO
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">ACTIVIDAD
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" required />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                            
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">PROGRAMA
                                            <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email" required />
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success mr-2 btn-block"
                                onclick="guarda()">Guardar</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('User/listado') }}" class="btn btn-secondary btn-block">Volver</a>
                        </div>
                    </div>

                </div>

            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>

</div>

@stop

@section('js')
<script type="text/javascript">
    $.ajaxSetup({
            // definimos cabecera donde estarra el token y poder hacer nuestras operaciones de put,post...
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function guarda()
        {
            if ($("#formularioPersona")[0].checkValidity()) {

                $("#formularioPersona").submit();
                Swal.fire("Excelente!", "Se guardo el distrito!", "success");

            }else{
                $("#formularioPersona")[0].reportValidity();
            }
        }

        function canbiaDepartamento()
        {
            let departamento = $("#departamento").val();

            $.ajax({
                url: "{{ url('User/ajaxDistrito') }}",
                data: {departamento: departamento},
                type: 'POST',
                success: function(data) {
                    $("#ajaxDistritos").html(data);
                    // $("#listadoProductosAjax").html(data);
                }
            });

        }

</script>
@endsection