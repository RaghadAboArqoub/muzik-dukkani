@extends('layout')
@section('content')

<div class="container " style="padding:100px; width:900px;">
    <h2>Add Category</h2>
    <form action="{{route('addCategory')}}" method="POST" style="padding: 30px;" enctype="multipart/form-data">
        @csrf
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

        <div class="form-group" style="width: fit-content; margin: 15px;">
            <label>Category Name</label>
            <input type="text" class="form-control" name="category_name" placeholder="Enter category name">
            <span class="text-danger">@error('category_name'){{ $message }} @enderror</span>
        </div>
        <div class="form-group " style="margin: 15px;">
            <input type="checkbox" name="category_visible" value="1">
            <label>Status </label>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Add Category</button>
    </form>
</div>
@endsection