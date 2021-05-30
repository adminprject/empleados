@extends('templates.app')

@section('container')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-align-center">
					<h4 style="float:left;">Formulario de Registro</h4>
					<a class="btn btn-danger" style="float: right;" href="{{ url('empleados') }}"><i class="fas fa-arrow-circle-left"></i></a>
				</div>
				<div class="card-body">
					<div class="alert alert-primary" role="alert">
						Los campos con asteriscos (*) son obligatorios
					</div>
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<form method="post" action="{{ url('empleados') }}">
					@csrf
						<div class="container">
							<div class="mb-3 row">
						    	<label for="nombre" class="col-sm-2 col-form-label">
						    		Nombre Completo *
						    	</label>
							    <div class="col-sm-10">
							      	<input type="text" name="nombre" class="form-control" required>
							    </div>
						    </div>
						    <div class="mb-3 row" style="margin-top: 1rem;">
						    	<label for="email" class="col-sm-2 col-form-label">
						    		Email *
						    	</label>
							    <div class="col-sm-10">
							      	<input type="email" name="email" class="form-control" required>
							    </div>
							</div>
						    <div class="mb-3 row" style="margin-top: 1rem;">
						    	<label for="sexo" class="col-sm-2 col-form-label">
						    		Sexo *
						    	</label>
						    	<div class="col-sm-10">
							      	<div class="form-check">
									  	<input class="form-check-input" type="radio" name="sexo" id="sexo1" value="M" required>
									  	<label class="form-check-label" for="sexo1">
									    	Masculino
									  	</label>
									</div>
									<div class="form-check">
									  	<input class="form-check-input" type="radio" name="sexo" id="sexo2" value="F" required>
									  	<label class="form-check-label" for="sexo2">
									    	Femenino
									  	</label>
									</div>
								</div>
						    </div>
						    <div class="mb-3 row" style="margin-top: 1rem;">
							    <label for="email" class="col-sm-2 col-form-label">
							    	Area *
							    </label>
								<div class="col-sm-10">
								    <select name="area_id" required class="form-control">
								      	@foreach($areas as $area)
								      		<option value="{{ $area->id }}">{{ $area->nombre }}</option>
								      	@endforeach
								    </select>
								</div>
							</div>
							<div class="mb-3 row" style="margin-top: 1rem;">
						    	<label for="descripcion" class="col-sm-2 col-form-label">
						    		Descripcion *
						    	</label>
							    <div class="col-sm-10">
							      	<textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
							    </div>
							</div>
							<div class="mb-3 row" style="margin-top: 1rem;">
						    	<label for="boletin" class="col-sm-2 col-form-label">
						    		
						    	</label>
						    	<div class="col-sm-10">
							      	<div class="form-check">
									  	<input class="form-check-input" type="checkbox" name="boletin" id="boletin" value="1">
									  	<label class="form-check-label" for="boletin">
									    	Deseo recibir Boletin Informativo
									  	</label>
									</div>
								</div>
						    </div>
						    <div class="mb-3 row" style="margin-top: 1rem;">
						    	<label for="rol_id" class="col-sm-2 col-form-label">
						    		Roles *
						    	</label>
						    	<div class="col-sm-10">
						    		@foreach($roles as $rol)
							      	<div class="form-check">
									  	<input class="form-check-input" type="checkbox" name="rol_id[]" id="rol_id" value="{{ $rol->id }}">
									  	<label class="form-check-label" for="boletin">
									    	{{ $rol->nombre }}
									  	</label>
									</div>
									@endforeach
								</div>
						    </div>
						    <div class="mb-3 row" style="margin-top: 1rem;">
						    	<a class="btn btn-danger" style="width: 10rem;" href="{{ url('empleados') }}">Cancelar</a> 
						    	<input class="btn btn-success" style="width: 10rem; margin-left: 1rem;" type="submit" value="Guardar">
						    </div>
					    </div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>	
@endsection