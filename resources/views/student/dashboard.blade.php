@extends('student/master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    {{-- @if(Session::has('msg'))
                    {!! Session::get('msg') !!}
                    @endif --}}
                    @if(Session::has('success'))
                       
                             
                             <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Hello Student</strong>{{Session::get('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>

                        
                    @endif
                    <div class="card-body">This is dashboard</div>
                </div>
            </div>
        </div>
    </div>
@endsection