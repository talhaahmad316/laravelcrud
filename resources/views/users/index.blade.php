@extends('layout.master')
@section('content')
<style>
  .table-hover tbody tr:hover { cursor: pointer; }
</style>

<h1 class="text-center">Users Table</h1>
<div class="container mt-4">
    <div class="card p-3">
      {{-- Insert,Uopdatd and Delete msg --}}
      @if($messege=Session::get('success'))
       <div class="alert alert-success alert-block">
        <strong>{{$messege}}</strong>
       </div>
       @endif
              {{-- --------------------------- --}}
      <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contect</th>
                <th scope="col">Created AT</th>
                <th scope="col">Updated AT</th>
                <th scope="col" style="padding-left: 30px;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $item)
              <tr>
                <th scope="row">{{ $item['id'] }}</th>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['number'] }}</td>
                <td>{{ $item['created_at'] }}</td>
                <td>{{ $item['updated_at'] }}</td>
                <td>
                  <div class="btn-group" role="group">
                  <a class="btn btn-info mr-2" href="{{ route('users.edit',$item->id) }}" role="button">Edit</a>

                        {{-- Delete Button --}}
                  <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" role="button">Delete</button>
                  </form>
                </td>
              </div>
              </tr>
              @endforeach
              
            </tbody>
          </table>
    </div>
</div>
    
@stop