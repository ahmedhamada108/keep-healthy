@extends('layouts.app')
    @section('content')
    <div class="page-wrapper">
			<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Manage vitamins</h4>
          </div>
        </div>

    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Edit the vitamin</h6>
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
						<li class="breadcrumb-item"><a href="{{ route('vitamins.index') }}">vitamins Managament</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit vitamin
            </li>
					</ol>
				</nav>
        <form method="post" action="{{route('vitamins.update',$vitamins->id)}}" enctype="multipart/form-data" class="forms-sample">
          @csrf
          @method('put')
          <div class="form-group">
            <label for="exampleInputUsername1">title</label>
            <input type="text" value="{{ $vitamins->title }}" name="title" class="form-control" id="exampleInputUsername1" placeholder="title">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea name="content" class="form-control" id="exampleInputEmail1" placeholder="Content">{{ $vitamins->content }}</textarea>
          </div>
          <div class="form-group">
            <img src="/images/{{$vitamins->image_path}}" class="form-group" id='exampleInputPassword1' style="width: 100px;" alt="">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  

	  </div>
  @stop