@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add new customer:</div>
        <div class="card-body">
          <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Name: </label>
              <input type="text" name="name" class="form-control">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Surname: </label>
              <input type="text" name="surname" class="form-control">
              @error('surname')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Phone: </label>
              <input type="number" name="phone" class="form-control">
              @error('phone')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label>E-mail: </label>
                <input type="email" name="email" class="form-control">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <div class="form-group">
              <label>Company: </label>
              <select name="company_id" id="" class="form-control">
                <option value="" selected disabled>Select company</option>
                @foreach ($companies as $company)
                <option value="{{$company->id}}">{{ $company->name }}</option>
                @endforeach
              </select>
              @error('company_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
                <label>Comment: </label>
                <textarea id="mce" name="comment" class="form-control"></textarea>
                @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">Add</button>
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









 {{-- <div class="form-group">
    <label>Wins: </label>
    <input type="number" name="wins" class="form-control">
    @error('wins')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label>Description: </label>
    <textarea id="mce" name="about" class="form-control"></textarea>
    @error('about')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div> --}}