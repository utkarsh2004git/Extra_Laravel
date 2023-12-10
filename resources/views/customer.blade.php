<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Registration Form</title>
</head>
<body>
      @include('layouts.header')
<h1 class="text-primary text-center">{{$title}}</h1>
<div class="container mt-5">
  <form action="{{$url}} " method="post"> 
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" value="{{$customer->name}}" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" value="{{$customer->email}}" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="pass" id="password" placeholder="Enter your password" >
    </div>

    <div class="form-group">
      <label for="state">State:</label>
      <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state" value="{{$customer->state}}" required>
    </div>

    <div class="form-group">
      <label for="country">Country:</label>
      <input type="text" class="form-control" name="country" id="country" placeholder="Enter your country" value="{{$customer->country}}" required>
    </div>

    <div class="form-group">
      <label for="gender">Gender:</label>
      <select class="form-control" name="gender" id="gender"  required>
        <option value="M" name="M" {{$customer->gender=="M"?"selected":""}}>Male</option>
        <option value="F" name="F" {{$customer->gender=="F"?"selected":""}}>Female</option>
        <option value="O" name="O" {{$customer->gender=="O"?"selected":""}}>Other</option>
      </select>

      {{-- <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="male" value="M" 
        {{$customer->gender=="M"?"checked":""}}>
        
        <label for="male" class="form-check-label">Male</label>
      </div>

      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="female" value="F"
        {{$customer->gender=="F"?"checked":""}}>
        <label for="female" class="form-check-label">Female</label>
      </div>

      <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="other" value="O"
        {{$customer->gender=="O"?"checked":""}}>
        <label for="other" class="form-check-label">Other</label>
      </div> --}}


    </div>

    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" name="address" id="address" value="{{$customer->address}}" required>
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" name="dob" id="dob" value="{{$customer->dob}}" required>
    </div>

    <button type="submit" class="btn btn-primary text-center">Submit</button>
  </form>
</div>
</body>
</html>
