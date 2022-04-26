@extends('admin/master')

@section('content')
<div class="row">
    <div class="col-4 mx-auto">
        <h2 class="text-warning text-center">Manage Attendece</h2>
    </div>
   
</div>
<div class="row mt-3">
    <div class="col-4 mx-auto">
        <form action="" method="post" class="d-flex">
            <input type="text" class="form-control" placeholder="Input here Student roll">
            <input type="submit" class="btn btn-success">
        </form>
    </div>
</div>

            <table class="table mt-3">
                <thead>
                    <tr class="bg-secondary text-white rounded">
                        <th>Roll</th>
                        <th>Student Name</th>
                       
                        <th>Standard</th>
                        <th>Gender</th>
                       
                        <th>Action</th>
    
                    </tr>
                </thead>
               <tbody id="managestudent">
                @foreach ($attendances as $s)
                <tr>
                    <td>{{ $s->student->roll}}</td>
                    <td>{{ $s->student->studentname}}</td>
                    
                    <td>{{ $s->attendance->classname}}St</td>
                    <td>{{ $s->student->gender}}</td>
                    
                    <td>
                        @if($s->status == "persent")
                        <a href="" class="btn btn-success disabled">Persent</a>
                        
                        @else
                            <a href="" class="btn btn-danger">Absent</a>
                        @endif
                    </td>

                    
                </tr>

            @endforeach
    {{$dates}}
    {{-- {{$date}} --}}
               </tbody>
         
            </table>
   
@endsection