@extends('layout')
@section('content')

<div class="container " style="padding:100px; width:900px;">
    <h2>Add Product</h2>
    <form action="{{route('add_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="product_name" placeholder="Enter product name">
            <span class="text-danger">@error('product_name'){{ $message }} @enderror</span>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Product Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
            <span class="text-danger">@error('description'){{ $message }} @enderror</span>
        </div>
    
        <div class="form-group">
            <label class="form-label">Product image</label>
            <input type="file" class="form-control" name="image" />
        </div>
        <div class="form-group">
            <label> Select Category:</label>
            <select type="text" class="form-control " id="" name="categories[]" multiple="multiple">
                @foreach( $categories as $row)
                <option value="{{$row->id}}"> {{$row->category_name}}</option>
                @endforeach
                <span class="text-danger">@error('categories'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <input type="checkbox" name="status" value="0">
            <label>Visible </label>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Add Product</button>
    </form>
</div>
@endsection
@section('scripts')
<script src="vendor/select2/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.categories').select2({
        placeholder: "select",
        allowClear: true
    });

});
</script>

@endsection