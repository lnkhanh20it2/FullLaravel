@extends('layouts.admin')

@Section('title','Account Create')
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
<form method="POST" action="{{route('user.store')}}">
    <!-- token -->
    @csrf
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name"  placeholder="Input Name">
  </div>
  <div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" name="email" placeholder="Input Email">
  </div>
  <div class="form-group">
    <label for="">Phone</label>
    <input type="text" class="form-control" name="phone"  placeholder="Input Phone">
  </div>
  <div class="form-group">
    <label for="">Address</label>
    <input type="text" class="form-control" name="address"  placeholder="Input Address">
  </div>
  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password"  placeholder="Input Password">
  </div>
  <div class="form-group">
    <label for="">Conform Password</label>
    <input type="password" class="form-control" name="conform_password"  placeholder="Input Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()