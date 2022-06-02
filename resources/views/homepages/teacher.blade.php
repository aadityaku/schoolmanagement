@extends('homepages/base')
@section('t')
active  
@endsection
@section('content')
    

    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                        <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
                        <div class="d-inline-flex text-white">
                            <p class="m-0"><a class="text-white" href="">Home</a></p>
                            <p class="m-0 px-2">/</p>
                            <p class="m-0">Our Teachers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('select.login') }}" method="post">
                                @csrf
                                <h3 class="mb-3">Select your account Type </h3>
                                
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="userType" id="flexRadioDefault1"  value="3" checked >
                                        <label class="form-check-label ms-2" for="flexRadioDefault1">
                                         Student
                                        </label>
                                      </div>
                                      <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="userType" id="flexRadioDefault2" value="1">
                                        <label class="form-check-label ms-2" for="flexRadioDefault2">
                                         Teacher
                                        </label>
                                      </div>
                                      <div class="form-check mb-3">
                                        <input class="form-check-input" type="radio" name="userType" id="flexRadioDefault2" value="2">
                                        <label class="form-check-label ms-2" for="flexRadioDefault2">
                                         Staff
                                        </label>
                                      </div>
                                        <div class="mb-3">
                                            <label for="">Email/Username</label>
                                            <input type="text" name="email"class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Password</label>
                                            <input type="password" name="password"class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" value="Login" class="btn btn-primary w-100">
                                        </div>
                                      <a href="" >Forget password ? </a>
                                      <a href="" class="float-end">Register?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Header End -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Our Teachers</span></p>
                <h1 class="mb-4">Meet Our Teachers</h1>
            </div>
            <div class="row">
                @foreach ($teachers as $item)
                    
               
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{ asset('teacher/'.$item->image) }}" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="{{ $item->insta }}"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="{{ $item->fblink }}"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="{{ $item->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>{{$item->teachername}}</h4>
                    <i>{{ $item->subject->subjectname}}</i>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container p-0">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Testimonial</span></p>
                <h1 class="mb-4">What Parents Say!</h1>
            </div>

            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/testimonial-1.jpg" style="width: 70px; height: 70px;" alt="Image">
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    @endsection