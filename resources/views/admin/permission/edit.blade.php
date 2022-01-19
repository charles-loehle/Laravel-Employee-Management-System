@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">
						Permission
					</li>
				</ol>
			</nav>

			@if (Session::has('message'))
				<div class="alert alert-success" role="alert">
						{{ Session::get('message') }}
				</div>
			@endif
				
			<form action="{{ route('permissions.update', [$permission->id]) }}" method="post">
				@csrf
				@method('PATCH')
				<div class="card">
					<div class="card-header">
						Permission
					</div>

					<div class="card-body">
						<h3>{{ $permission->role->name }}</h3>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Permission</th>
									<th scope="col">can add</th>
									<th scope="col">can edit</th>
									<th scope="col">can delete</th>
									<th scope="col">can view</th>
									<th scope="col">can list</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td scope="row">Department</td>
									<td>
										<input 
											type="checkbox" 
											name="name[department][can-add]"
											@if (isset($permission['name']['department']['can-add']))
												checked
											@endif 
											value="1"
										>
									</td>
									<td>
										<input 
											type="checkbox" 
											name="name[department][can-edit]"
											@if (isset($permission['name']['department']['can-edit']))
												checked
											@endif  
											value="1"
										>
									</td>
									<td>
										<input 
											type="checkbox" 
											name="name[department][can-delete]"
											@if (isset($permission['name']['department']['can-delete']))
												checked
											@endif  
											value="1">
									</td>
									<td>
										<input 
											type="checkbox" 
											name="name[department][can-view]"
											@if (isset($permission['name']['department']['can-view']))
												checked
											@endif  
											value="1">
									</td>
									<td>
										<input type="checkbox" name="name[department][can-list]" value="1"
										@if (isset($permission['name']['department']['can-list']))
											checked
										@endif 
									>
									</td>
								</tr>

								<tr>
									<td scope="row">Role</td>
									<td>
										<input type="checkbox" name="name[role][can-add]" value="1"
										@if (isset($permission['name']['role']['can-add']))
											checked
										@endif 
										>
									</td>
									<td>
										<input type="checkbox" name="name[role][can-edit]" value="1"
										@if (isset($permission['name']['role']['can-edit']))
											checked
										@endif 	
									>
									</td>
									<td>
										<input type="checkbox" name="name[role][can-delete]" value="1"
										@if (isset($permission['name']['role']['can-delete']))
											checked
										@endif 	
									>
									</td>
									<td>
										<input type="checkbox" name="name[role][can-view]" value="1"
										@if (isset($permission['name']['role']['can-view']))
											checked
										@endif 	
									>
									</td>
									<td>
										<input type="checkbox" name="name[role][can-list]" value="1"
										@if (isset($permission['name']['role']['can-list']))
											checked
										@endif 	
									>
									</td>
								</tr>

								<tr>
									<td scope="row">Permissions</td>
									<td>
										<input type="checkbox" name="name[permission][can-add]" value="1"
										@if (isset($permission['name']['permission']['can-add']))
											checked
										@endif 	
									>
									</td>
									<td>
										<input type="checkbox" name="name[permission][can-edit]" value="1"
										@if (isset($permission['name']['permission']['can-edit']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[permission][can-delete]" value="1"
										@if (isset($permission['name']['permission']['can-delete']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[permission][can-view]" value="1"
										@if (isset($permission['name']['permission']['can-view']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[permission][can-list]" value="1"
										@if (isset($permission['name']['permission']['can-list']))
											checked
										@endif 		
									>
									</td>
								</tr>

								<tr>
									<td scope="row">User</td>
									<td>
										<input type="checkbox" name="name[user][can-add]" value="1"
										@if (isset($permission['name']['user']['can-add']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[user][can-edit]" value="1"
										@if (isset($permission['name']['user']['can-edit']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[user][can-delete]" value="1"
										@if (isset($permission['name']['user']['can-delete']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[user][can-view]" value="1"
										@if (isset($permission['name']['user']['can-view']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[user][can-list]" value="1"
										@if (isset($permission['name']['user']['can-list']))
											checked
										@endif 		
									>
									</td>
								</tr>

								<tr>
									<td scope="row">Notice</td>
									<td>
										<input type="checkbox" name="name[notice][can-add]" value="1"
										@if (isset($permission['name']['notice']['can-add']))
											checked
										@endif 	
									>
									</td>
									<td>
										<input type="checkbox" name="name[notice][can-edit]" value="1"
										@if (isset($permission['name']['notice']['can-edit']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[notice][can-delete]" value="1"
										@if (isset($permission['name']['notice']['can-delete']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[notice][can-view]" value="1"
										@if (isset($permission['name']['notice']['can-view']))
											checked
										@endif 		
									>
									</td>
									<td>
										<input type="checkbox" name="name[notice][can-list]" value="1"
										@if (isset($permission['name']['notice']['can-list']))
											checked
										@endif 		
									>
									</td>
								</tr>

								<tr>
									<td>Approve Leave</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<input type="checkbox" name="name[leave][can-list]" value="1"
										@if (isset($permission['name']['notice']['can-list']))
											checked
										@endif 
									>
									</td>
								</tr>

								<tr>
									<td>Mail</td>
									<td>
										<input type="checkbox" name="name[leave][can-add]" value="1"
										@if (isset($permission['name']['mail']['can-add']))
											checked
										@endif 	
									>
									</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>

							</tbody>
						</table>
						@if (isset(auth()->user()->role->permission['name']['permission']['can-edit']))
							<button type="submit" class="btn btn-primary">Submit</button>
						@endif

						<a class="ml-3" href="{{ route('permissions.index') }}">Back</a>
					</div>		
			</form>
		</div>
	</div>
</div>
@endsection
