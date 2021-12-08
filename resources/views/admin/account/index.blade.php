@extends('layouts.admin')

@Section('title','Account List')

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
            <th>Gmail</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date Create</th>
            <th class="text-right">Action</th>
        </tr>
        <tbody>
            @foreach ($data as $account)
            <tr>
                <td>{{$account->id}}</td>
                <td>{{$account->name}}</td>
                <td>{{$account->email}}</td>
                <td>{{$account->phone}}</td>
                <td>{{$account->address}}</td>
                <td>{{$account->created_at->format('m-d-Y')}}</td>
                <td class="text-right">
                    
                    <a href="{{route('user.edit',$account->id)}}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a href="{{route('user.destroy',$account->id)}}" class="btn btn-sm btn-danger btn-delete">
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
