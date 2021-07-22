@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- inicio modal  --}}

<!-- Modal-->
<div class="modal fade" id="modalPrograma" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORMULARIO PARTIDA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('Programa/guarda') }}" method="POST" id="formulario-partidas">
                	@csrf
                	<div class="row">
                		<div class="col-md-6">
                			<div class="form-group">
                			    <label for="exampleInputPassword1">Numero
                			    <span class="text-danger">*</span></label>
                			    <input type="hidden" class="form-control" id="programa_id" name="programa_id" />
                			    <input type="text" class="form-control" id="numero" name="numero" pattern="[0-9]{3}" title="El numero debe tener solo 3 digitos" required />
                			</div>
                		</div>

                		<div class="col-md-6">
                			<div class="form-group">
                			    <label for="exampleInputPassword1">Nombre
                			    <span class="text-danger">*</span></label>
                			    <input type="text" class="form-control" id="nombre" name="nombre" required />
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
				<h3 class="card-label">TIPOS DE PROGRAMAS
				</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Button-->
				<a href="#" class="btn btn-primary font-weight-bolder" onclick="nuevo()">
					<i class="fa fa-plus-square"></i> NUEVO PROGRAMA
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
							<th>Numero</th>
							<th>Nombre</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($programas as $p)
							<tr>
								<td>{{ $p->id }}</td>
								<td>{{ $p->numero }}</td>
								<td>{{ $p->nombre }}</td>
								<td>
									<button type="button" class="btn btn-icon btn-warning" onclick="edita('{{ $p->id }}', '{{ $p->nombre }}', '{{ $p->numero }}')">
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
			$("#programa_id").val('');
			$("#nombre").val('');
			$("#numero").val('');
			// abre el modal
    		$("#modalPrograma").modal('show');
    	}

		function edita(id, nombre, numero)
    	{
			// colocamos valores en los inputs
			$("#programa_id").val(id);
			$("#nombre").val(nombre);
			$("#numero").val(numero);

			// mostramos el modal
    		$("#modalPrograma").modal('show');
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

                    window.location.href = "{{ url('Programa/elimina') }}/"+id;

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