<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is Student Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a href="" class="navbar-brand">School | Student</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('student.logout') }}" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row border-top-3">
            <div class="col-lg-2 gx-0 ">
               <div class="list-group list-group-flush">
                    
                    <a href="" class="list-group-item list-group-item-action border-0 bg-dark fs-5 py-3 text-white">Dashboard</a>
                    <a href="{{ route("stud.homework") }}" class="list-group-item list-group-item-action border-0 bg-dark fs-5 py-3 text-white">Today home Work</a>
                    <a href="" class="list-group-item list-group-item-action border-0 bg-dark fs-5 py-3 text-white">Manage Result</a>
                    <a href="" class="list-group-item list-group-item-action border-0 bg-dark fs-5 py-3 text-white">Manage question set</a>
                    
               </div>
            </div>
            <div class="col-lg-10 mt-3 gx-4">
                @section('content')
                    
                @show
            </div>
        </div>
    </div>
    @section('js')
        
    @show
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>