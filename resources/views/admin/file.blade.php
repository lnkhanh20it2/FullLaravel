@extends('layouts.admin')
@Section('main')
    <iframe src="{{url('public/file/dialog.php')}}" style="width:100%;height:500px;overflow-y:auto;border:none"></iframe>
@stop()