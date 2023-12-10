<!DOCTYPE html>
<html lang="en">

<head>
    <title>registration page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <form action="{{'/'}}register" method="post">
        @csrf

        <div class="container">
            <h1 class="text-center ">Registration</h1>
            <x-input type="text" name='name' label="Name : " /> 
            <x-input type="email" name='email' label="Email : " /> 
            <x-input type="password" name='pass' label="Password : " /> 


            <button class="btn btn-primary">
                Submit
            </button>

        </div>

    </form>

</body>

</html>