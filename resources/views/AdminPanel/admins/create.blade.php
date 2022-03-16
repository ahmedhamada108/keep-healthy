@extends('layouts.app')
    @section('content')
    <div class="page-wrapper">
			<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Manage admins</h4>
          </div>
        </div>

    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Create new admin</h6>
        @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
        <nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admins.index') }}">admins Managament</a></li>
						<li class="breadcrumb-item active" aria-current="page">Create new admin
            </li>
					</ol>
				</nav>
        <form method="POST" action="{{route('admins.store')}}" enctype="multipart/form-data" class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">name</label>
            <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">email</label>
            <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="exampleInputUsername1" placeholder="email">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputUsername1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputUsername1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  

	  </div>
  @stop