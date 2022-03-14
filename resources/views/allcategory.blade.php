@extends('layout')

@section('content')

<div class="row justify-content-center " style="padding: 100px;">
    <h1>Category Page</h1>
    <div class="col-xl-10 col-md-6 ">


        <div class="card">

            <div class="card-body padding-30px">

                <a href='/add-category' class="btn btn-primary padding-35px text-center">Add Category</a>
                <br>
                <br>
                <table class="table table-bordered table-striped" style="padding: 35px;">
                    <thead>
                        <tr class="text-center">
                            <th> #</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    @foreach($categories as $row)
                    <tr class="text-center">
                        <td>{{$row->id}}</td>
                        <td>{{$row->category_name}}</td>
                        <td>{{$row->category_visible}}</td>
                        <td> <a href="edit-category/{{$row->id}}" class=" btn btn-primary">update </a></td>
                            <td><form action="{{route('categories.destroy', ['id' => $row->id])}}" >
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('are you sure you want to delete this Category')">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach

                </table>


            </div>
        </div>
    </div>
</div>


@endsection