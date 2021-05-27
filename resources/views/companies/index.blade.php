@extends('layouts.app')
@section('content')
<div class="card-body">
    <h2>Table of companies</h2>
  @if($errors->any())
  <div class="alert alert-danger">
    <p><b>{{$errors->first()}}</b></p>
  </div>
  @endif

  <table class="table">
    <tr>
      <th>Name</th>
      <th>Address</th>
      <th>Actions</th>
    </tr>
    @foreach ($companies as $company)
    <tr>
      <td>{{ $company->name }}</td>
      <td>{{ $company->address }}</td> 
      <td>
        <form action={{ route('companies.destroy', $company->id) }} method="POST">
          <a class="btn btn-success" href={{ route('companies.edit', $company->id) }}>Edit</a>
          @csrf @method('delete')
          <input type="submit" class="btn btn-danger" value="Delete" />
        </form>
      </td>

    </tr>
    @endforeach
  </table>
  @if (session('status_success'))
  <div class="alert alert-success">
    <p style="color: green"><b>{{ session('status_success') }}</b></p>
  </div>
  @elseif(session('status_error'))
  <div class="alert alert-danger">
    <p style="color: red"><b>{{ session('status_error') }}</b></p>
  </div>
  @endif
  <div>
    <a href="{{ route('companies.create') }}" class="btn btn-success">Add new company</a>
  </div>
</div>
@endsection