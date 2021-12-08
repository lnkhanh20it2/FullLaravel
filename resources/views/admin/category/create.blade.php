@extends('layouts.admin')

@Section('title','Category Create')
@Section('main')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button>
        {{ session('status') }}
    </div>
@endif
<form method="POST" action="{{route('category.store')}}">
    <!-- token -->
    @csrf
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Input Name">
  </div>
  <div class="form-group">
  <label for="exampleInputStatus">Status</label>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Public
  </label>
    </div>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0">
  <label class="form-check-label" for="exampleRadios2">
    Private
  </label>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Prioty</label>
    <input type="text" class="form-control" name="prioty" id="prioty" placeholder="Input Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()