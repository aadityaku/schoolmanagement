<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-2">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">School Management</a>
            <ul class="navbar-nav">
                <li class="nav-item me-2"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item me-2"><a href="" class="nav-link">About </a></li>
                <li class="nav-item me-3"><a href="" class="btn btn-info btn-outline-dark">Online Payment</a></li>
                <li class="nav-item"><a href="{{ route('student') }}" class="btn btn-warning">Apply for Admission </a></li>
            </ul>
        </div>
    </nav>
    @section('content')
        
    @show
</body>
</html>