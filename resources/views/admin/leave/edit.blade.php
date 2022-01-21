@extends('admin.layouts.master')

@section('content')
	<div class="container mt-5">
    <nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active" aria-current="page">Request Leave	
				</li>
			</ol>
		</nav>
			@if (Session::has('message'))
				<div class="alert alert-success">
					{{ Session::get('message') }}
				</div>
			@endif

			<form action="{{ route('leaves.update', [$leave->id]) }}" method="post">
				@csrf
				@method('PATCH')
				<h1 class="h3 mb-3">Edit Leave Request</h1>
				<div class="mb-3">
					<label for="name" class="form-label">From date</label>
					<input 
						type="text" 
						name="from"
						class="form-control @error('from') is-invalid @enderror" 
						value="{{ $leave->from }}"
						id="datepicker"
					>
					@error('from')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="name" class="form-label">To date</label>
					<input 
						type="text" 
						name="to"
						class="form-control @error('to') is-invalid @enderror" 
						value="{{ $leave->to }}"
						id="datepicker1"
					>
					@error('to')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="mb-3">
					<label class="form-label" for="">Type of leave</label>
					<select name="type" id="" class="form-control">
						<option value="annualleave">Annual leave</option>
						<option value="sickleave">Sick leave</option>
						<option value="parental">Parental leave</option>
						<option value="other">Other</option>
					</select>
				</div>

				<div class="mb-3">
					<label for="description" class="form-label">Description</label>
					<textarea 
						class="form-control  @error('description') is-invalid @enderror" 
						name="description"
					>{{ $leave->description }}</textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
	</div>
@endsection