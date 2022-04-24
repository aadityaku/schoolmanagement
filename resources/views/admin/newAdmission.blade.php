@extends('admin/master')

@section('content')
<div class="row">
    <div class="col-9">
        <h2 class="text-warning text-center">Manage Students</h2>
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
                    <th>Roll</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Dob</th>
                    <th>Age</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($newStudents as $s)
                        <tr>
                            <td>{{ $s->roll}}</td>
                            <td>{{ $s->studentname}}</td>
                            <td>{{ $s->fathername}}</td>
                            <td>{{ $s->dob}}</td>
                            <td>{{ $s->age}}</td>
                            <td>{{ $s->clases_id}}</td>
                            <td>{{ $s->gender}}</td>
                            <td>{{ $s->contact}}</td>
                            <td>{{ $s->address}}</td>
                            <td>
                                <a href="" class="btn btn-danger">X</a>
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="{{ route('student.approveAddmissionedit',['id'=>$s->id]) }}" class="btn btn-warning">Approve</a>
                            </td>

                            
                        </tr>

                    @endforeach
                </tr>
            </table>
   
@endsection