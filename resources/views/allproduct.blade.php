@extends('layout')
@section('content')

<div class="row justify-content-center " style="padding: 100px;">
    <h1>Product Page</h1>
    <div class="col-xl-10 col-md-6 ">


        <div class="card">

            <div class="card-body padding-30px">
           <a href='/add-product' class=" btn btn-primary">Add Product</a>
           <br>
<br>
     
                <table class="table table-bordered table-striped" style="padding: 35px;">
                    <thead>
                        <tr class="text-center">
                            <th> #</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>image</th>
                            <th>Action </th>

                        </tr>
                    </thead>
                    @foreach($products as $row)
                    <tr class="text-center">
                        <td>{{$row->id}}</td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->status}}</td>
                        <td width="70 px"> <img width="70px" height="70px" src="{{asset('/'.$row->image) }}" /> </td>
                        <td> <a href="edit-product/{{$row->id}}" class=" btn btn-primary">update </a>
                        <td><form action="{{route('products.destroy', ['id' => $row->id])}}" >
                                <button type="submit" class="btn btn-danger "
                                    onclick="return confirm('are you sure you want to delete this Product')">
                                    Delete
                                </button>
                            </form>

                        </td>

                        </td>
                    </tr>
                    @endforeach

                </table>


            </div>
        </div>
    </div>
</div>
@endsection