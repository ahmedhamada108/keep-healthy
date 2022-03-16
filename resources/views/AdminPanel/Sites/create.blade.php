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
        <h6 class="card-title">Create new site</h6>
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
						<li class="breadcrumb-item active" aria-current="page">Create new site
            </li>
					</ol>
				</nav>
        <form method="POST" action="{{route('sites.store')}}" enctype="multipart/form-data" class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">title</label>
            <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="exampleInputUsername1" placeholder="title">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea name="content" class="form-control" id="exampleInputEmail1" placeholder="Content">{{ old('content') }}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputUsername1">site URL</label>
            <input type="text"value="{{ old('site_url') }}" name="site_url" class="form-control" id="exampleInputUsername1" placeholder="title">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" name='image_path' class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  

	  </div>
  @stop