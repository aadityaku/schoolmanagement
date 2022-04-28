@extends('homepages/base')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('select.login') }}" method="post">
                            @csrf
                            <h3 class="mb-3">Slect any your account Type </h3>
                            
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
                                        <input type="submit" value="Login" class="btn btn-success w-100">
                                    </div>
                                  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

