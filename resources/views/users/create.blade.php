@extends('layout.master')

@section('content')
<div class="container mt-4">
<div class="card p-4">
  <h1 class="text-center">Insert Data</h1>
<form method="POST" action="{{route('users.store')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
      value="{{ old('name') }}
      ">
     
      @if($errors->has('name'))
      <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif

    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp
      value="{{ old('email') }}
      ">

      @if($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
      @endif

    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Contect Number</label>
      <input type="tel" name="number" class="form-control" id="exampleInputPassword1"
      value="{{ old('contect') }}"
      >

      @if($errors->has('number'))
      <span class="text-danger">{{ $errors->first('number') }}</span>
      @endif

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@stop