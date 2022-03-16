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
        <h6 class="card-title">Edit the admin</h6>
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
						<li class="breadcrumb-item active" aria-current="page">Edit admin
            </li>
					</ol>
				</nav>
        <form method="post" action="{{route('admins.update',$admins->id)}}" enctype="multipart/form-data" class="forms-sample">
          @csrf
          @method('put')
          <div class="form-group">
            <label for="exampleInputUsername1">name</label>
            <input type="text" value="{{ $admins->name }}" name="name" class="form-control" id="exampleInputUsername1" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">email</label>
            <input type="email" value="{{ $admins->email }}" name="email" class="form-control" id="exampleInputUsername1" placeholder="email">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">New Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputUsername1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Confirm The New Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputUsername1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  

	  </div>
  @stop