@extends('homepages/base')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            
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
    </div>
@endsection