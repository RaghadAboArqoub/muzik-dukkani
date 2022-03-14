@extends('layout')
@section('content')

<br>
<br>
<h2 class="text-primary text-center">Product</h2>
<table class="table">
    <thead class="thead-light">
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            
            <th scope="col">Status</th>
        </tr>
    </thead>
    @foreach($products as $row)
    <tr class="text-center">
        <td>{{$row->id}}</td>
        <td>{{$row->product_name}}</td>
        <td>{{$row->description}}</td>
        
        <td>{{$row->status}}</td>
    </tr>
    @endforeach
    <tbody>

    </tbody>
</table>
@endsection