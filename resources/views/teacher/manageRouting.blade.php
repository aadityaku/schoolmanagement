@extends('teacher/master')

@section('content')
<div class="row">
    <div class="col-9">
        <h2 class="text-warning text-center">Manage Our Routing</h2>
    </div>
    <div class="col-3">
        <form action="" method="POST">
            <input type="search" class="form-control" placeholder="Serach here students">
            <input type="submit" class="btn btn-success" hidden>
        </form>
    </div>
</div>

            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Period</th>
                    <th>TIme</th>
                    <th>Subject</th>
                    <th>Teacher Rol</th>
                    <th>Class Name</th>
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($routings as $r)
                        <tr>
                            <td>{{ $r->period}}</td>
                            <td>{{ $r->time}}</td>
                            <td>{{ $r->subject->subjectname}}</td>
                            <td>{{ $r->teacherrol}}</td>
                            <td>{{$r->classname->classname}}</td>
                            <td>
                                <a href="" class="btn btn-danger">X</a>
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-warning">View</a>
                            </td>

                            
                        </tr>

                    @endforeach
                </tr>
            </table>
   
@endsection