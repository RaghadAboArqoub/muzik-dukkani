@extends('layout')
@section('content')

<div class="container " style="padding:100px; width:900px;">
    <h2>Update Category</h2>
    <form action="{{route('update', ['id' => $categories->id])}}" method="POST"enctype="multipart/form-data">
        @csrf
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

        <div class="form-group" style="width: fit-content; margin: 15px;">
            <label>Category Name</label>
            <input type="text" class="form-control" value="{{$categories->category_name}}" name="category_name" placeholder="Enter category name">
            <span class="text-danger">@error('category_name'){{ $message }} @enderror</span>
        </div>
        <div class="form-group " style="margin: 15px;">
            <input type="checkbox" name="category_visible" value="1">
            <label>Status </label>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Update Category</button>
    </form>
</div>
@endsection