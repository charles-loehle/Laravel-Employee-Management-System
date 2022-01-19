@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user fa-fw">&nbsp; Department</i></li>
				</ol>
			</nav>

			@if (Session::has('message'))
				<div class="alert alert-success" role="alert">
						{{ Session::get('message') }}
				</div>
			@endif
				
			<form action="{{ route('departments.store') }}" method="post">
				@csrf
				<h1 class="h3 mb-3">Create a New Department</h1>
				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input 
						type="text" 
						name="name" 
						class="form-control @error('name') is-invalid @enderror"
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
						class="form-control @error('description') is-invalid @enderror" 
						name="description" 
						rows="3"
					></textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<button 
					type="submit" 
					class="btn btn-primary"
				>
					Submit
				</button>
			</form>
		</div>
	</div>
</div>
@endsection
