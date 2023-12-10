<!doctype html>
<html lang="en">
  <head>
    <title>Customer data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @include('layouts.header')

    <div class="container">
        <a href="{{route('customer.create')}}">
            <button type="button" name="" id="" class="btn btn-primary float-right">Add</button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Staus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>@if($customer->gender=="M")Male
                            @elseif($customer->gender=="F")Female
                            @elseif($customer->gender=="O")Other
                            @endif
                        </td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->dob}}</td>
                        <td>{{$customer->state}}</td>
                        <td>{{$customer->country}}</td>
                        <td>
                            @if($customer->status=="1")
                            
                               <a href=""> <span class="badge badge-success">Active</span></a>

                            @else 
                            
                                <a href=""><span class="badge badge-danger">Inactive</span></a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{url('/customer/delete/')}}/{{$customer->customer_id}}">Delete</a>

                            {{-- <a class="btn btn-danger" href="{{route('customer.delete',['id'=>$customer->customer_id])}}/{{$customer->customer_id}}">Delete</a> --}}

                            <a class="btn btn-primary" href="{{route('customer.edit',['id'=>$customer->customer_id])}}">Edit</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </body>
</html>