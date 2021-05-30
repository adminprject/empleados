@extends('templates.app')

@section('container')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-align-center">
					<h6 style="float:left;">Listado</h6>
					<a class="btn btn-primary" style="float: right;" href="{{ url('empleados/create') }}"><i class="fas fa-user-edit"></i></a>
				</div>
				@if(Session::has('success'))
					<div class="col-md">
						<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 0.8rem;">
						  	<strong>Exito!.</strong> {{ Session::get('success') }}
						</div>
					</div>
				@endif
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<td><i class="far fa-user"></i> Nombre</td>
								<td><i class="fas fa-envelope-open-text"></i> Email</td>
								<td><i class="fas fa-venus-mars"></i> Sexo</td>
								<td><i class="far fa-bookmark"></i> Area</td>
								<td><i class="far fa-envelope"></i> Boletin</td>
								<td>Modificar</td>
								<td>Eliminar</td>
							</tr>
						</thead>
						<tbody>
							@foreach($empleados as $emp)
								<tr>
									<td>{{ $emp->nombre }}</td>
									<td>{{ $emp->email }}</td>
									<td>
										@if($emp->sexo == 'M')
											Masculino
										@else
											Femenino
										@endif
									</td>
									<td>{{ $emp->Area->nombre }}</td>
									<td>
										@if($emp->boletin == 1)
											SI
										@else
											NO
										@endif
									</td>
									<td>
										<a class="btn btn-info" href="{{ url('empleados') }}/{{ $emp->id }}/edit">
											<i class="far fa-edit"></i>
										</a>
									</td>
									<td>
										<a class="delete btn btn-danger" data-id="{{ $emp->id }}" 
										href="javascript:void(0)">
											<i class="fas fa-trash-alt"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $empleados->links() }}
				</div>
			</div>
		</div>
	</div>
<script src="{{ url('plugins/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ url('plugins/jquery/bootbox.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$('.delete').click(function(e){
		e.preventDefault();
		var id = $(this).attr('data-id');

				bootbox.dialog({
					message: "¿Estás seguro de eliminar el registro?",
					title: "¡Atención!",
					buttons: {
						cancel: {
							label: "No",
							className: "btn-success",
							callback: function() {
								$('.bootbox').modal('hide');
							}
						},
						confirm: {
							label: "Eliminar",
							className: "btn-danger",
							callback: function() {
							$.ajaxSetup({
							    headers: {
							        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							    }
							});
							$.ajax({
								url    : 'empleados/delete/'+id,
				                type   : 'POST',
							})
						//Si todo ha ido bien...
						.done(function(response){
							bootbox.alert(response);
							parent.fadeOut('slow'); //Borra la fila afectada
							window.location.href = "empleados";
						})
						.fail(function(){
							bootbox.alert('Algo ha ido mal. No se ha podido completar la acción.');
						})
					}
				}
			}
		});
	});
});
</script>
@endsection
