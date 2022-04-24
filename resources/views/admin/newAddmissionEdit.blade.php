@extends('admin/master')
@section('content')
    <div class="row">
        <div class="col-lg-5 mt-3 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('student.approveAddmission',['id'=>$id->id]) }}" method="post">
                        
                        @csrf
                        <div class="mb-3">
                            <label for="">Roll No</label>
                            <input type="text" name="roll" class="form-control" value="{{$id->roll}}">
                            @error('roll')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                       <div class="mb-3">
                           <input type="submit" class="btn btn-success w-100" value="Approve">
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection