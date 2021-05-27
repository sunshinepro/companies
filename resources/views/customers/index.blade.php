@extends('layouts.app')
@section('content')
<div class="card-body">
    <h2>Table of customers</h2>
  <div class="card-body">
    <form class="form-inline" action="{{ route('customers.index') }}" method="GET">
      <select name="company_id" id="" class="form-control">
        <option value="" selected disabled>Select company you want to filter:</option>
        @foreach ($companies as $company)
        <option value="{{ $company->id }}" @if($company->id == app('request')->input('company_id'))
          selected="selected"
          @endif>{{ $company->name }}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-primary">Filter</button>
      <a class="btn btn-success" href={{ route('customers.index') }}>Show all</a>
    </form>
  </div>

  @if($errors->any())
  <div class="alert alert-danger">
    <p><b>{{$errors->first()}}</b></p>
  </div>
  @endif

  <table class="table">
    <tr>
      <th>Customer</th>
      <th>Phone</th>
      <th>E-mail</th>
      <th>Company</th>
      <th>Comment</th>
      <th>Actions</th>
    </tr>
    @foreach ($customers as $customer)
    <tr>
      <td>{{ $customer->surname }} {{ $customer->name }}</td>
      <td>{{ $customer->phone }}</td>
      <td>{{ $customer->email }}</td>
      <td>{{ $customer->company->name}}</td>
      <td>{!! $customer->comment !!}</td>
      <td>
        <form action={{ route('customers.destroy', $customer->id) }} method="POST">
          <a class="btn btn-success" href={{ route('customers.edit', $customer->id) }}>Edit</a>
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
    <a href="{{ route('customers.create') }}" class="btn btn-success">Add new customer</a>
  </div>
</div>
@endsection


{{-- <a class="btn btn-outline-primary" href={{ route('companies.show', $company->id) }}>Details</a> --}}