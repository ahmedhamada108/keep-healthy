@extends('layouts.app')
    @section('content')
    <div class="page-wrapper">
			<div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Manage contact_us</h4>
          </div>
        </div>
        <nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('contact_us.index') }}">contact_us Managament</a></li>
						<li class="breadcrumb-item active" aria-current="page">contact_us Records
            </li>
					</ol>
				</nav>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
          <div class="card-body">
              <h6 class="card-title">Manage contact_us</h6>
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
                 <a href="{{ route('contact_us.create') }}">
                  <button type="button" style="float: right;" class="btn btn-primary">
                      Add
                  </button>
                </a>
                <br><br>
{{--            Start the table --}}
                  <table id="dataTableExample" class="table">
                      <thead>
                      <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($contact_us as $email)
                          <tr id="contact_us{{ $email->id }}">
                              <td> {{ $email->first_name }} </td>
                              <td> {{ $email->last_name }} </td>
                              <td> {{ $email->email }} </td>
                              <td class="btn-group">
                                  <!-- Button trigger modal -->
                                  <a href="{{route('contact_us.edit',$email->id) }}" class="btn btn-primary">
                                      Edit
                                  </a>
                                  <form method="post" action="{{ route('contact_us.destroy',$email->id) }}">
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