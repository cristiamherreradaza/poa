@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- inicio modal  --}}

<!-- Modal-->
<div class="modal fade" id="modalPartida" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORMULARIO PARTIDA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('Partida/guarda') }}" method="POST" id="formulario-partidas">
                	@csrf
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                			    <label for="exampleInputPassword1">Nombre
                			    <span class="text-danger">*</span></label>
                			    <input type="hidden" class="form-control" id="tipo_id" name="tipo_id" />
                			    <input type="text" class="form-control" id="nombre" name="nombre" required />
                			</div>
                		</div>

                		<div class="col-md-6">
                			<div class="form-group">
                			    <label for="exampleInputPassword1">Depende
                			    <span class="text-danger">*</span></label>
                			    <input type="text" class="form-control" id="depende" name="depende" required />
                			</div>
                		</div>
                	</div>
					<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                			    <label for="exampleInputPassword1">Gestion
                			    <span class="text-danger">*</span></label>
                			    <input type="number" class="form-control" id="gestion" name="gestion" max="9999" required />
                			</div>
                		</div>

                		<div class="col-md-6">
                			<div class="form-group">
                			    <label for="exampleInputPassword1">Codigo
                			    <span class="text-danger">*</span></label>
                			    <input type="number" class="form-control" id="codigo" name="codigo" required />
                			</div>
                		</div>
                	</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success font-weight-bold" onclick="crear()">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{-- fin inicio modal  --}}

	<!--begin::Card-->
	<div class="card card-custom gutter-b">
		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">TIPOS INSUMOS
				</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Button-->
				<a href="#" class="btn btn-primary font-weight-bolder" onclick="nuevo()">
					<i class="fa fa-plus-square"></i> NUEVA PARTIDA
				</a>
				<!--end::Button-->
			</div>
		</div>
		
		<div class="card-body">
			<!--begin: Datatable-->
			<div class="table-responsive m-t-40">
				<table class="table table-bordered table-hover table-striped" id="tabla-insumos">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Depende</th>
							<th>Gestion</th>
							<th>Codigo</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($partidas as $p)
							<tr>
								<td>{{ $p->id }}</td>
								<td>{{ $p->nombre }}</td>
								<td>{{ $p->depende }}</td>
								<td>{{ $p->gestion }}</td>
								<td>{{ $p->codigo }}</td>
								<td>
									<button type="button" class="btn btn-icon btn-warning" onclick="edita('{{ $p->id }}', '{{ $p->nombre }}', '{{ $p->depende }}', '{{ $p->gestion }}', '{{ $p->codigo }}')">
										<i class="flaticon2-edit"></i>
									</button>
									<button type="button" class="btn btn-icon btn-danger" onclick="elimina('{{ $p->id }}', '{{ $p->nombre }}')">
										<i class="flaticon2-cross"></i>
									</button>
								</td>
							</tr>
						@empty
							<h3 class="text-danger">NO EXISTEN TIPOS</h3>
						@endforelse
					</tbody>
					<tbody>
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

    	$(function () {
    	    $('#tabla-insumos').DataTable({
    	        language: {
    	            url: '{{ asset('datatableEs.json') }}',
    	        },
				order: [[ 0, "desc" ]]
    	    });

    	});

    	function nuevo()
    	{
			// pone los inputs vacios
			$("#tipo_id").val('');
			$("#nombre").val('');
			$("#depende").val('');
			$("#gestion").val('');
			$("#codigo").val('');
			// abre el modal
    		$("#modalPartida").modal('show');
    	}

		function edita(id, nombre, depende, gestion, codigo)
    	{
			// colocamos valores en los inputs
			$("#tipo_id").val(id);
			$("#nombre").val(nombre);
			$("#depende").val(depende);
			$("#gestion").val(gestion);
			$("#codigo").val(codigo);

			// mostramos el modal
    		$("#modalPartida").modal('show');
    	}

    	function crear()
    	{
			// verificamos que el formulario este correcto
    		if($("#formulario-partidas")[0].checkValidity()){
				// enviamos el formulario
    			$("#formulario-partidas").submit();
				// mostramos la alerta
				Swal.fire("Excelente!", "Registro Guardado!", "success");
    		}else{
				// de lo contrario mostramos los errores
				// del formulario
    			$("#formulario-partidas")[0].reportValidity()
    		}

    	}

		function elimina(id, nombre)
        {
			// mostramos la pregunta en el alert
            Swal.fire({
                title: "Quieres eliminar "+nombre,
                text: "Ya no podras recuperarlo!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, borrar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then(function(result) {
				// si pulsa boton si
                if (result.value) {

                    window.location.href = "{{ url('Partida/elimina') }}/"+id;

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

    </script>
@endsection