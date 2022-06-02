@extends('student/master')

@section('content')

<div class="row">
    <div class="col-8">
        @if($msg))
           <div class="card bg-danger py-0">
               <div class="card-body">
                    <h2 class="text-center"> {{$msg}}</h2>
               </div>
           </div>
        @endif
        <h2 class="text-warning text-center">Manage HomeWork</h2>
            
    </div>
   <div class="col-3">
       <form action="" method="post">
           @csrf
           <input type="search" class="form-control" placeholder="Search here Notice">
           <input type="submit" class="btn btn-success" hidden>
       </form>
   </div>
</div>
          
          
            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Id</th>
                    <th>Subject</th>
                    <th>Home Work</th>
                    <th>TeacherName</th>
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($homework as $sub)
                        <tr>
                            <td>{{ $sub->id}}</td>
                            <td>{{ $sub->subject->subjectname}}</td>
                            <td>{{ $sub->hw}}</td>
                            <td>{{ $sub->tea->teachername}}</td>
                             
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