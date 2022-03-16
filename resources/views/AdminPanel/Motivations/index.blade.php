@extends('layouts.app')
    @section('content')
    <div class="page-wrapper">
			<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Manage motivations</h4>
          </div>
        </div>
        <nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('motivations.index') }}">motivations Managament</a></li>
						<li class="breadcrumb-item active" aria-current="page">motivations Records
            </li>
					</ol>
				</nav>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <h6 class="card-title">Manage motivations</h6>
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
                 <a href="{{ route('motivations.create') }}">
                  <button type="button" style="float: right;" class="btn btn-primary">
                      Add
                  </button>
                </a>
                <br><br>
{{--            Start the table --}}
                  <table id="dataTableExample" class="table">
                      <thead>
                      <tr>
                          <th>motivations ID</th>
                          <th>name</th>
                          <th>job</th>
                          <th>image</th>
                          <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($motivations as $motivation)
                          <tr id="motivations{{ $motivation->id }}">
                              <td> # {{ $motivation->id }} </td>
                              <td> {{ $motivation->name }} </td>
                              <td> {{ $motivation->job }} </td>
                              <td>
                                <img src="/images/motivations/{{$motivation->image_path}}" alt=""> 
                              </td>
                              <td class="btn-group">
                                  <!-- Button trigger modal -->
                                  <a href="{{route('motivations.edit',$motivation->id) }}" class="btn btn-primary">
                                      Edit
                                  </a>
                                  <form method="post" action="{{ route('motivations.destroy',$motivation->id) }}">
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