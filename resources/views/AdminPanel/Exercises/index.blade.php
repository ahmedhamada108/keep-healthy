@extends('layouts.app')
    @section('content')
    <div class="page-wrapper">
			<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Manage Exercises</h4>
          </div>
        </div>
        <nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('exercises.index') }}">Exercises Managament</a></li>
						<li class="breadcrumb-item active" aria-current="page">Exercises Records
            </li>
					</ol>
				</nav>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <h6 class="card-title">Manage Exercises</h6>
              @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
             @endif
              @if (session('error'))
                  <div class="alert alert-danger" role="alert">
                      {{ session('error') }}
                  </div>
          
                @endif
                <div class="table-responsive">
                 <a href="{{ route('exercises.create') }}">
                  <button type="button" style="float: right;" class="btn btn-primary">
                      Add
                  </button>
                </a>
                <br><br>
{{--            Start the table --}}
                  <table id="dataTableExample" class="table">
                      <thead>
                      <tr>
                          <th>exercises title</th>
                          <th>Image</th>
                          <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($exercises as $exercise)
                          <tr id="exercises{{ $exercise->id }}">
                              <td> {{ $exercise->title }} </td>
                              <td>
                                <img src="/images/exercises/{{$exercise->image_path}}" alt=""> 
                              </td>
                              <td class="btn-group">
                                  <!-- Button trigger modal -->
                                  <a href="{{route('exercises.edit',$exercise->id) }}" class="btn btn-primary">
                                      Edit
                                  </a>
                                  <form method="post" action="{{ route('exercises.destroy',$exercise->id) }}">
                                    @method('delete')
                                    @csrf
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
  {{--   Start Edit modal--}}
              </div>
          </div>
      </div>
  </div>
</div>  

  @stop