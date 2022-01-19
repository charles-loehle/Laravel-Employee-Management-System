@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
            Edit employee   
        </li>
        </ol>
    </nav>
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif

    <form action="{{ route('users.update', [$user->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
				@method('PATCH')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">General Information</div>
                    <div class="card-body">
                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control @error('name') is-valid @enderror" required="" 
                                value="{{ $user->name }}"
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- Address --}}
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                        </div>
                        {{-- mobile --}}
                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="number" name="mobile_number" class="form-control" value="{{ $user->mobile_number }}">
                        </div>
                        {{-- Department --}}
                        <div class="mb-3">
                            <label class="form-label">Department</label>
                            <select 
                                name="department_id" 
                                class="form-control" 
                                required=""
                            >
                                @foreach (App\Models\Department::all() as $department)
                                    <option value="{{ $department->id }}">
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- designation --}}
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control @error('designation') is-valid @enderror" required="" value="{{ $user->designation }}">
                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- start date --}}
                        <div class="mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_from" class="form-control" placeholder="dd-mm-yyyy" required="" id="datepicker" value="{{ $user->start_from }}">
                            @error('start_from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- image --}}
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-valid @enderror" accept="image/*">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Login Information
                    </div>
                    <div class="card-body">
                        {{-- email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-valid @enderror" required="" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{-- password --}}
                        <div class="mb-3">
                            <label class="form-label">New Password (optional)</label>
                            <input type="password" name="password" class="form-control" required="">
                        </div>
                        {{-- role --}}
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role_id"required="" class="form-control" >
                                @foreach (App\Models\Role::all() as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="mb-3">
                    @if (isset(auth()->user()->role->permission['name']['user']['can-edit']))
                        <button class="btn btn-primary" type="submit">Submit</button>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
