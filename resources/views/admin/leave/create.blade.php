@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
			<div class="col-md-10">
				<nav arial-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item" aria-current="page">Request Leave</li>
					</ol>
				</nav>

				@if (Session::has('message'))
					<div class="alert alert-success">
						{{ Session::get('message') }}
					</div>
				@endif

				<form action="{{ route('leaves.store') }}" method="post" >
					@csrf
					<div class="row justify-content-center">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">Request Leave</div>
									<div class="card-body">
										<div class="mb-3">
											<label class="form-label">From date</label>
											<input 
												type="text" 
												name="from" 
												class="form-control @error('from') is-invalid @enderror"
												required=""
												id="datepicker"
											>
											@error('from')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">To date</label>
											<input 
												type="text" 
												name="to" class="form-control @error('to') is-invalid @enderror" 
												required=""
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
											<label class="form-label" for="">Description</label>
											<textarea name="description" class="form-control" required=""></textarea>
										</div>
										<button class="btn btn-primary" type="submit">Submit</button>
									</div>
							</div>
						</div>
					</div>
				</form>

				<table class="table mt-5">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Date from</th>
							<th scope="col">Date To</th>
							<th scope="col">Description</th>
							<th scope="col">type</th>
							<th scope="col">Reply</th>
							<th scope="col">Status</th>
							<th scope="col">Edit</th>
							<th scope="col">Delete</th>h>
						</tr>
					</thead>
					<tbody>
						@foreach ($leaves as $leave)
							<tr>
								<th scope="row">1</th>
								<td>{{ $leave->from }}</td>
								<td>{{ $leave->to }}</td>
								<td>{{ $leave->description }}</td>
								<td>{{ $leave->type }}</td>
								<td>{{ $leave->message }}</td>
								<td>
									@if ($leave->status == 0)
										<span class="alert alert-danger">pending</span>
									@else
										<span class="alert alert-success">approved</span>
									@endif
								</td>
								<td>
									<a href="{{ route('leaves.edit', [$leave->id]) }}">
										<i class="fas fa-edit"></i>
									</a>
								</td>
								<td>
									<a href="#" data-toggle="modal" data-target="#exampleModal{{$leave->id}}">
										<i class="fas fa-trash"></i>
									</a>
									<!-- Modal -->
									<div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<form action="{{route('leaves.destroy',[$leave->id])}}" method="post">
											@csrf
											@method('DELETE')
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
													
														Do you want to delete?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-danger">Delete</button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<!--Modal end-->
								</td>
							</tr>
						@endforeach

					</tbody>
				</table>
			</div>
    </div>
</div>
@endsection
