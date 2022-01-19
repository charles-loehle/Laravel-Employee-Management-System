@extends('admin.layouts.master')

@section('content')
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-10">
				@if (Session::has('message'))
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
				@endif

				<form action="{{ route('roles.update', [$role->id]) }}" method="post">
					@csrf
					@method('PATCH')
					<h1 class="h3 mb-3">Edit Role</h1>

					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input 
							type="text" 
							name="name"
							class="form-control @error('name') is-invalid @enderror" 
							value="{{ $role->name }}"
						>
						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="mb-3">
						<label for="description" class="form-label">Description</label>
						<textarea 
							class="form-control  @error('description') is-invalid @enderror" name="description"
						>{{ $role->description }}</textarea>
						@error('description')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					@if (isset(auth()->user()->role->permission['name']['role']['can-edit']))
						<button type="submit" class="btn btn-primary">Submit</button>
					@endif
				</form>
			</div>
		</div>
	</div>
@endsection