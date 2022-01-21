@extends('admin.layouts.master')

@section('content')
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				@if (Session::has('message'))
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
				@endif

				<form action="{{ route('notices.update', [$notice->id]) }}" method="post" class="mt-4">
					@csrf
					@method('PATCH')
					<h1 class="h3 mb-3">Edit Notice</h1>
					<div class="mb-3">
						<label class="form-label">Title</label>
						<input
							type="text" 
							name="title"
							class="form-control @error('title') is-invalid @enderror" 
							value="{{ $notice->title }}""
						>
						@error('title')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="mb-3">
						<label for="name" class="form-label">Description</label>
						<textarea 
							type="text" 
							name="description"
							class="form-control @error('description') is-invalid @enderror" 
						>{{ $notice->description }}</textarea>
						@error('description')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>

					<div class="mb-3">
						<label class="form-label" for="">From date</label>
						<input 
							name="date" 
							id="datepicker" 
							class="form-control @error('date') is-invalid @enderror" 
							value="{{ $notice->date }}"
						>
							@error('date')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>

					<div class="mb-3">
						<label class="form-label">Created by</label>
						<input
							type="text" 
							name="name"
							class="form-control @error('name') is-invalid @enderror" 
							value="{{ $notice->name }}"
						>
						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					@if (isset(auth()->user()->role->permission['name']['notice']['can-edit']))
						<button type="submit" class="btn btn-primary">Submit</button>
					@endif

				</form>
			</div>
		</div>
	</div>
@endsection