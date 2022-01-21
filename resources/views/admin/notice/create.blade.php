@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
			<div class="col-md-8">
				<nav arial-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">Notice</li>
					</ol>
				</nav>

				@if (Session::has('message'))
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
				@endif

				<form action="{{ route('notices.store') }}" method="post" >
					@csrf
					<div class="card">
						<div class="card-header">Create New Notice</div>

							<div class="card-body">
								<div class="mb-3">
									<label class="form-label">Title</label>
									<input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
									@error('title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label">Description</label>
									<textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
										@error('description')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label">From date</label>
									<input type="text" name="date" class="form-control @error('date') is-invalid @enderror" required="" id="datepicker">
									@error('date')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="mb-3">
									<label class="form-label">Created by</label>
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required="" value="{{ auth()->user()->name }}">
									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
					</div>
				</form>

			</div>
    </div>
</div>
@endsection
