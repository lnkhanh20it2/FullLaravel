@extends('layouts.admin')

@Section('title','Order List')

@Section('main')
<form action="" method="GET" class="form-inline" role="form">
    <div class="form-group">
        <input class="form-control" name="key" placeholder="Search by name" >
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
<table class="table table-hover text-center">
        <tr>
            <th>Order ID</th>
            <th>Name Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->order_id}}</td>
                <td>{{$order->pro->name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop()
