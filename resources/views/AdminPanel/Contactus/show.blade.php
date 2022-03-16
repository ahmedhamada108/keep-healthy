@extends('layouts.app')
    @section('content')
    <div class="page-wrapper">
			<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Manage contact_us</h4>
          </div>
        </div>

    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Edit the email</h6>
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
						<li class="breadcrumb-item"><a href="{{ route('contact_us.index') }}">contact_us Managament</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit email
            </li>
					</ol>
				</nav>
        
          <div class="form-group">
            <label for="exampleInputUsername1">First Name: </label>
            <input type="text" readonly value="{{ $contact_us->first_name }}" class="form-control" id="exampleInputUsername1" >
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Last Name: </label>
            <input type="text" readonly value="{{ $contact_us->last_name }}" class="form-control" id="exampleInputUsername1">
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Email: </label>
            <input type="text" readonly value="{{ $contact_us->email }}" class="form-control" id="exampleInputUsername1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">The Message: </label>
            <textarea class="form-control" readonly id="exampleFormControlTextarea1" rows="5">{{ $contact_us->content }}</textarea>
          </div>
          
        <a href="{{route('contact_us.index')}}">
          <button type="button" class="btn btn-primary mr-2">Back to the messages</button>
        </a>
      </div>
    </div>
  

	  </div>
  @stop