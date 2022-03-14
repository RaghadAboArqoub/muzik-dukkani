@extends('layout')
@section('content')
<div class="container " style="padding:100px; width:900px;">
    <h2>Update Category</h2>
    <form action="{{route('update-product', ['id' => $products->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="product_name" value="{{$products->product_name}}">
            <span class="text-danger">@error('product_name'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Product Description</label>
            <textarea class="form-control" name="description" placeholder=""
                rows="3">{{$products->description}}</textarea>
            <span class="text-danger">@error('description'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label class="form-label">Product image</label>
            <input type="file" placeholder="{{$products->image}}" class="form-control" name="image" />
            <span class="text-danger">@error('image'){{ $message }} @enderror</span>

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
            <input type="checkbox" name="status" value="{{$products->status}}">
            <label>Visible </label>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Update Product</button>
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