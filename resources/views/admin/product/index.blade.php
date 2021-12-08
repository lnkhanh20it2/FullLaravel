@extends('layouts.admin')

@section('title','Product List')

@Section('main')
<form action="" method="GET" class="form-inline" role="form">
    <div class="form-group">
        <input class="form-control" name="key" placeholder="Search by name" >
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
    <hr>
    @if (Session::has('error'))
    <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button>
            {{Session::get('error')}}    
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button>
            {{Session::get('success')}}
    </div>
    @endif
<table class="table table-hover text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price/Sell</th>
            <th>status</th>
            <th>Created Date</th>
            <th>Image</th>
            <th class="text-right">Action</th>
        </tr>
        <tbody>
            @foreach ($data as $model)
            <tr>
                <td>{{$model->id}}</td>
                <td>{{$model->name}}</td>
                <td>{{$model->cat->name}}</td>
                <td>{{$model->price}}/<span class="badge badge-success">{{$model->sell_price}}</span></td>
                <td>
                    @if($model->status == 0)
                        <span class="badge badge-danger">Private</span>
                    @else 
                        <span class="badge badge-success">Public</span>
                    @endif
                </td>
                <td>{{$model->created_at->format('m-d-Y')}}</td>
                <td><img src="{{url('public/uploads')}}/{{$model->image}}" alt="" width="60"></td>
                <td class="text-right">
                    <a href="{{route('product.show',$model->id)}}" class="btn btn-sm btn-warning">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{route('product.edit',$model->id)}}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="{{route('product.destroy',$model->id)}}" class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form action="" method="POST" id="form-delete">
        @csrf @method('DELETE')
    </form>
    <hr>    
    <div class="">
        {{$data->appends(request()->all())->links()}}
    </div>
@stop()
@section('js')
    <script>
        $('.btn-delete').click(function(ev){
            ev.preventDefault();
            var _href= $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('Bạn muốn chắc chắn muốn xóa ?')){
                $('form#form-delete').submit();
            }
        })
    </script>
@stop()
