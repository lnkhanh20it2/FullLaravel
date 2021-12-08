@extends('layouts.admin')

@Section('title','Show Product')
@Section('main')
<?php
  $images= json_decode($model->image_list);
?>
  <div class="box-body">
    <div class="row">
      <div class="col-md-5">
        <img src="{{url('public/uploads')}}/{{$model->image}}" alt=""  style="width: 100%; margin-top: 10px;">
        @if(is_array($images))
        <hr>
        <div class="row">
          @foreach($images as $img)
            <div class="col-md-4">
               <img src="{{$img}}" alt=""  style="width: 100%; margin-top: 10px;">
            </div>

          @endforeach
        </div>
        @endif
      </div>
      <div class="col-md-7">
        <h3>{{$model->name}}</h3>
      </div>
    </div>
  </div>
@stop()