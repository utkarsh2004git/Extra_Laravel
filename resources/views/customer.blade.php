<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Registration Form</title>
</head>
<body>

<div class="container mt-5">
  <form action="{{url('/')}}/customer" method="post"> 
    @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="pass" id="password" placeholder="Enter your password" required>
    </div>

    <div class="form-group">
      <label for="state">State:</label>
      <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state" required>
    </div>

    <div class="form-group">
      <label for="country">Country:</label>
      <input type="text" class="form-control" name="country" id="country" placeholder="Enter your country" required>
    </div>

    <div class="form-group">
      <label for="gender">Gender:</label>
      <select class="form-control" name="gender" id="gender" required>
        <option value="M" name="M">Male</option>
        <option value="N" name="N">Female</option>
        <option value="O" name="O">Other</option>
      </select>
    </div>

    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" name="address" id="address" required>
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" name="dob" id="dob" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>



</body>
</html>
