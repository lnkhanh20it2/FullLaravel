@extends('layouts.admin')

@Section('title','Add Product')
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
<form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
  <!-- token -->
  @csrf
  <div class="row">
    <div class="col-md-9">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input Name">
      </div>
      <div class="form-group">
        <label for="">Description</label>
        <textarea name="description"  class="form-control" id="content" placeholder="Input description"></textarea>
      </div>
      <div class="form-group">
        <div class="input-group">
          <label for="">Image List  <a href="#modal-files" data-toggle="modal" class="btn btn-default">Select</a></label>
        <input type="hidden" class="form-control" name="image_list" id="image_list" placeholder="Image">
      </div>
        <div class="row" id="image_show_list">
          
        </div>
      </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
        <label for="">Category</label>
        <select name="category_id" class="form-control" >
          <option value="">--SELECT ONE--</option>
          @foreach ($cats as $cat)
          <option value="{{$cat->id}}">{{$cat->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control" name="price"  placeholder="Input price">
      </div>
      <div class="form-group">
        <label for="">Sell price</label>
        <input type="text" class="form-control" name="sell_price"  placeholder="Input sell price">
      </div>
      <div class="form-group">
        <label for="">Image</label>
        <div class="input-group">
          <input type="text" class="form-control" name="image" id="image" placeholder="Image">
          <span class="input-group-btn">
          <a href="#modal-file" data-toggle="modal" class="btn btn-default">Select</a>
          </span>
        </div>
        <img src="" alt="" id="show_img" style="width: 100%; margin-top: 10px;">
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
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Save Data</button>
</form>

@stop()
@section('css')
  <link rel="stylesheet" href="{{url('public/siteadmin')}}/plugins/summernote/summernote-bs4.min.css">
@stop()
@section('js')
<div class="modal fade" id="modal-file">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <iframe src="{{url('public/file/dialog.php')}}?field_id=image" style="width:100%;height:500px;overflow-y:auto;border:none"></iframe>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-files">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <iframe src="{{url('public/file/dialog.php')}}?field_id=image_list" style="width:100%;height:500px;overflow-y:auto;border:none"></iframe>
      </div>
    </div>
  </div>
</div>

<script src="{{url('public/siteadmin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#content').summernote({
      height:250
    });
  })
</script>
<script type="text/javascript">
  $('#modal-file').on('hide.bs.modal',function(){
    var _img = $('input#image').val();
    $('img#show_img').attr('src',_img);
  })
  $('#modal-files').on('hide.bs.modal',function(){
    var _imgs = $('input#image_list').val();
    var img_list = $.parseJSON(_imgs);
    var _html = '';
    for (let i = 0; i < img_list.length; i++) {
      _html += '<div class="col-md-3 thumbnail">'; 
      _html +=   '<img src="'+img_list[i]+'" alt="" style="width: 100%; margin-top: 10px;">';
      _html +=   '</div>';  
    }

    $('#image_show_list').html(_html);
  })
</script>
@stop()