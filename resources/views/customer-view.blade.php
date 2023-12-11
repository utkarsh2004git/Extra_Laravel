<!doctype html>
<html lang="en">
  <head>
      <title>Customer data</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- sweetAlert js -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @include('layouts.header')
    <div align="center">
        <div id="alert">
            @if(session()->has('messagedeleted'))
                <div class="alert alert-danger ">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    {{session()->get('messagedeleted')}}
                </div>
            @elseif(session()->has('messageupdated'))
            <div class="alert alert-info " >
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{session()->get('messageupdated')}}
            </div>
            @elseif(session()->has('messagecreated'))
            <div class="alert alert-success ">
                <button type="button" class="close" data-dismiss="alert">X</button>
                {{session()->get('messagecreated')}}
            </div>
            @endif
        </div>
    </div>
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
                    <th>Created At</th>
                    <th>Created At</th>
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
                        <td>{{date("d-M-Y",strtotime($customer->dob))}}</td>
                        <td>{{$customer->state}}</td>
                        <td>{{$customer->country}}</td>
                        <td>
                            @if($customer->status=="1")
                            
                               <a href=""> <span class="badge badge-success">Active</span></a>

                            @else 
                            
                                <a href=""><span class="badge badge-danger">Inactive</span></a>
                            @endif
                        </td>
                        <td>{{$customer->created_at->diffForHumans()}}</td>
                        <td>{{$customer->updated_at->diffForHumans()}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{url('/customer/delete/')}}/{{$customer->customer_id}}" onclick="confirmation(event)">Delete</a>

                            {{-- <a class="btn btn-danger" href="{{route('customer.delete',['id'=>$customer->customer_id])}}/{{$customer->customer_id}}">Delete</a> --}}

                            <a class="btn btn-primary" href="{{route('customer.edit',['id'=>$customer->customer_id])}}">Edit</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>

        //Confirmation POP-UP

        function confirmation(ev){
            ev.preventDefault();
            let urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to delete this",
                text:"You won't be able to revert this process!",
                icon:"error",
                buttons :true,
                dangerMode:true,
            })
            .then((willCancel)=>
                {
                    if(willCancel){
                        window.location.href=urlToRedirect;
                    }
                }
            )
        } 
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    {{-- script for automatic remove pop up alert --}}
    <script>

        $('document').ready(function()
        {
            setTimeout(function() {
                $("div.alert").remove()
            },2000);
        });
    </script>
  </body>
</html>