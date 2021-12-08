@extends('layouts.admin')

@Section('title','Edit Category')
@Section('main')
<form method="POST" action="{{route('category.update',$category->id)}}" role="form">
    <!-- token -->
    @csrf  @method('PUT')
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" value="{{$category->name}}" name="name" id="name" placeholder="Input Name">
  </div>
  <div class="form-group">
  <label for="exampleInputStatus">Status</label>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="status"  value="1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Public
  </label>
    </div>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="status" value="0">
  <label class="form-check-label" for="exampleRadios2">
    Private
  </label>
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Prioty</label>
    <input type="text" class="form-control" value="{{$category->prioty}}"name="prioty" id="prioty" placeholder="Input Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()