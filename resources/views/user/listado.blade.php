@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet">
@endsection

@section('content')
	<!--begin::Card-->
	<div class="card card-custom gutter-b">
		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">USUARIOS
				</h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Button-->
				<a href="{{ url('User/nuevo') }}" class="btn btn-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md">
						<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
							height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<circle fill="#000000" cx="9" cy="15" r="6" />
								<path
									d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
									fill="#000000" opacity="0.3" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>Nuevo</a>
				<!--end::Button-->
			</div>
		</div>
		
		<div class="card-body">
			<!--begin: Datatable-->
			<div class="table-responsive m-t-40">
				<table class="table table-bordered table-hover table-striped" id="tabla_usuarios">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Email</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($usuarios as $u)
							<tr>
								<th>{{ $u->id }}</th>
								<th>{{ $u->name }}</th>
								<th>{{ $u->email }}</th>
								<th></th>
							</tr>
						@empty
							<h3 class="text-danger">NO EXISTEN RAZAS</h3>
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
    	$(document).ready(function() {
    	    $('#tabla_usuarios').DataTable({
				iDisplayLength: 10,
				processing: true,
				serverSide: true,
				ajax: "{{ url('User/ajax_listado') }}",
				"order": [[ 0, "desc" ]],
				columns: [
					{data: 'id', name: 'id'},
					{data: 'name', name: 'name'},
					{data: 'ci', name: 'ci'},
					{data: 'email', name: 'email'},
					{data: 'perfil', name: 'perfil'},
					{data: 'celulares', name: 'celulares'},
					{data: 'action'},
				],
                language: {
                    url: '{{ asset('datatableEs.json') }}'
                }
            });
    	} );

		function edita(id)
		{
			window.location.href = "{{ url('User/edita') }}/"+id;
		}

		function cuotas(id)
		{
			window.location.href = "{{ url('User/pagos') }}/"+id;
		}


		function elimina(id, nombre)
        {
            Swal.fire({
                title: "Quieres eliminar "+nombre,
                text: "Ya no podras recuperarlo!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, borrar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {

                    window.location.href = "{{ url('User/elimina') }}/"+id;

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