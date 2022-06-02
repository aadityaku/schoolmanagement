<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cws School</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-success">Cws School</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="{{ route('home.index') }}" class="nav-item nav-link @section('h') @show  fs-4 ms-2">Home</a>
                    <a href="{{ route('home.about') }}" class="nav-item nav-link @section('a') @show  fs-4 ms-2  ">About</a>
                    <a href="{{ route('home.clases') }}" class="nav-item nav-link @section('c') @show fs-4 ms-2">Classes</a>
                    <a href="{{ route("home.teacher") }}" class="nav-item nav-link  @section('t') @show  fs-4 ms-2">Teachers</a>
                    <a href="{{ route('home.gallery') }}" class="nav-item nav-link  @section('g') @show fs-4 ms-2">Gallery</a>

                        <a href="{{ route('home.blog') }}" class="nav-link nav-item @section('pages') @show  fs-4 ms-2">Blogs</a>
                        
                    <a href="{{route('online.payment') }}" class="nav-item nav-link @section('c') @show fs-4 ms-2">Payment</a>
                </div>
                <a href="#insert" data-bs-toggle="modal" class="btn btn-primary px-4 fs-4 rounded">Join Class</a>
            </div>
        </nav>
    </div>
    <div class="modal fade" id="insert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('student') }}" method="POST">
                            
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="studentname" class="form-control @error('studentname') is-valid @enderror" value="{{ old('studentname') }}">
                            @error('studentname')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control @error('dob') is-valid @enderror" value="{{ old('dob') }}">
                            @error('dob')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Age</label>
                            <input type="text" name="age" class="form-control @error('age') is-valid @enderror" value="{{ old('age') }}">
                            @error('age')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Father Name</label>
                            <input type="text" name="fathername" class="form-control @error('fathername') is-valid @enderror" value="{{ old('fathername') }}">
                            @error('fathername')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Gender</label>
                            <select name="gender" class="form-select @error('gender') is-valid @enderror ">
                                <option value="">--select--</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                                <option value="O">Others</option>
                            </select>
                            @error('gender')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Education</label>
                            <input type="text" name="education" class="form-control @error('education') is-valid @enderror" value="{{ old('education') }}">
                            @error('education')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                           <textarea name="address" rows="5" class="form-control">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Distance home to school</label>
                           <input type="text" name="distance" value="{{ old('distance') }}" class="form-control @error('distance') is-valid @enderror">
                            @error('distance')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                           <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-valid @enderror">
                            @error('email')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                           <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-valid @enderror">
                            @error('password')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Addmission For</label>
                            <select name="clases_id" class="form-select">
                                @foreach ($clases as $item)
                                    <option value="{{ $item->id }}">{{ $item->classname}}</option>
                                @endforeach
                            </select>
                            @error('clases_id')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Contact Student/Parent</label>
                           <input type="text" name="contact" value="{{ old('contact') }}" class="form-control @error('contact') is-valid @enderror">
                            @error('contact')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success w-100">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('content')
        
    @show
    

    <!-- Back to Top -->
    


    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
 

    
   