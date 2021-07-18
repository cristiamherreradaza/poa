@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')
	<!--begin::Card-->
	<div class="card card-custom gutter-b">

        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label text-primary">
                    Doctor: <span class="text-secondary">{{ $datosUsuario->name }}</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    CI: <span class="text-secondary">{{ $datosUsuario->ci }}</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <div class="table-responsive m-t-40">
                <table class="table table-bordered table-hover table-striped" id="tabla_usuarios">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gestion</th>
                            <th>Mes</th>
                            <th>Monto</th>
                            <th>Fecha Pago</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $p)
                        @php
                            if($p->estado == 'Debe'){
                                $estado = '<a href="#" class="btn btn-light-danger font-weight-bold mr-2">Debe</a>';
                            }else{
                                $estado = '<a href="#" class="btn btn-light-success font-weight-bold mr-2">Pagado</a>';
                            }
                        @endphp     
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->gestion }}</td>
                            <td>{{ $p->mes }}</td>
                            <td>{{ $p->monto }}</td>
                            <td>{{ $p->fecha_pago }}</td>
                            <td>{!! $estado !!}</td>
                            <td nowrap="nowrap">

                                <a href="#" class="btn btn-icon btn-success btn-sm mr-2" onclick="cambiaPago('{{ $p->id }}', 'Pagar')">
                                    <i class="fas fa-dollar-sign"></i>
                                </a>
        
                                <a href="#" class="btn btn-icon btn-danger btn-sm mr-2" onclick="cambiaPago('{{ $p->id }}', 'Eliminar')">
                                    <i class="fas fa-dollar-sign"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
									<!--end::Card-->
@stop

@section('js')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script type="text/javascript">
    	$(document).ready(function() {
    	    $('#tabla_usuarios').DataTable({
                language: {
                    url: '{{ asset('datatableEs.json') }}'
                },
                order: [[ 0, "desc" ]]
            });
    	} );

        function asiste(user_id, evento_id)
        {
            window.location.href = "{{ url('Evento/asiste') }}/"+user_id+"/"+evento_id;
        }

        function falta(user_id, evento_id)
        {
            window.location.href = "{{ url('Evento/falta') }}/"+user_id+"/"+evento_id;
        }

        function elimina(id, departamento, nombre)
        {
            Swal.fire({
                title: "Quieres eliminar "+nombre+" de "+departamento+"?",
                text: "Ya no podras recuperarlo!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, borrar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {

                    window.location.href = "{{ url('Sector/elimina') }}/"+id;

                    Swal.fire(
                        "Borrado!",
                        "El registro fue eliminado.",
                        "success"
                    )
                    // result.dismiss can be "cancel", "overlay",
                    // "close", and "timer"
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelado",
                        "La operacion fue cancelada",
                        "error"
                    )
                }
            });
        }

        function cambiaPago(id , estado)
        {
            window.location.href = "{{ url('User/cambiaPago') }}/"+id+"/"+estado;
        }
    </script>
@endsection