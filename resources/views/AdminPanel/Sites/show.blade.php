@extends('layouts.app')
    @section('content')
    <div class="page-wrapper">
			<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Manage sites</h4>
          </div>
        </div>

    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Edit the site</h6>
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
						<li class="breadcrumb-item"><a href="{{ route('sites.index') }}">sites Managament</a></li>
						<li class="breadcrumb-item active" aria-current="page">Edit site
            </li>
					</ol>
				</nav>
        <form method="post" action="{{route('sites.update',$sites->id)}}" enctype="multipart/form-data" class="forms-sample">
          @csrf
          @method('put')
          <div class="form-group">
            <label for="exampleInputUsername1">title</label>
            <input type="text" value="{{ $sites->title }}" name="title" class="form-control" id="exampleInputUsername1" placeholder="title">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea name="content" class="form-control" id="exampleInputEmail1" placeholder="Content">{{ $sites->content }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">Site URL</label>
            <input type="text" value="{{ $sites->site_url }}" name="site_url" class="form-control" id="exampleInputUsername1" placeholder="title">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" name='image_path' class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <img src="/images/{{$sites->image_path}}" class="form-group" id='exampleInputPassword1' style="width: 100px;" alt="">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  

	  </div>
  @stop