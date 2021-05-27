@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Edit company:</div>
        <div class="card-body">
          <form action="{{ route('companies.update', $company->id) }}" method="POST">
            @csrf @method("PUT")
            <div class="form-group">

              <label>Name: </label>
              <input type="text" name="name" class="form-control" value="{{$company->name}}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Runs: </label>
              <input type="text" name="address" class="form-control" value="{{$company->address}}">
              @error('address')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
        @if (session('status_success'))
        <div class="alert alert-success">
          <p style="color: green"><b>{{ session('status_success') }}</b></p>
        </div>
        @elseif(session('status_error'))
        <div class="alert alert-danger">
          <p style="color: red"><b>{{ session('status_error') }}</b></p>
        </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection