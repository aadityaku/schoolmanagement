@extends('admin/master')

@section('content')
<div class="row">
    <div class="col-9">
        <h2 class="text-warning text-center">Manage Students</h2>
    </div>
    <div class="col-3">
        <form action="" method="get" autocomplete="off" class="navbar-form navbar-left">
           
                <input type="text" class="form-control" id="searchstudent"  placeholder="Search">
               
            
        </form>
      
    </div>
</div>

            <table class="table">
                <thead>
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
                </thead>
               <tbody id="managestudent">
                @foreach ($students as $s)
                <tr>
                    <td>{{ $s->roll}}</td>
                    <td>{{ $s->studentname}}</td>
                    <td>{{ $s->fathername}}</td>
                    <td>{{ $s->dob}}</td>
                    <td>{{ $s->age}}</td>
                    <td >{{ $s->clases_id}}</td>
                    <td>{{ $s->gender}}</td>
                    <td>{{ $s->contact}}</td>
                    <td>{{ $s->address}}</td>
                    <td>
                        <a href="" class="btn btn-danger">X</a>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-warning">View</a>
                    </td>

                    
                </tr>

            @endforeach
     
               </tbody>
           
            </table>
   @section('js')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script>
    
       $(document).ready(function(){
           $('#searchstudent').on('keyup',function(){
              var idmanagestudent=this.value;
              $('#managestudent').html('');
             
              $.ajax({
                url: "{{ url('/admin/class/student/fetch-student')}}/{{ Request::segment(4)}}",
                type:"POST",
                data:{
                    student_id:idmanagestudent,
                    _token:'{{ csrf_token()}}'
                },
                dataType:'json',
                success:function(res){
                    $('#managestudent').html('');
                    
                    $.each(res.students,function(key,value){
                    
                      $('#managestudent').append('<tr>'
                        + '<td>' + value.roll + '</td>'
                        + '<td>' + value.studentname + '</td>'
                        + '<td>' + value.fathername + '</td>'
                        + '<td>' + value.dob + '</td>'
                        + '<td>' + value.age + '</td>'
                        + '<td>' + value.clases_id + '</td>'
                        + '<td>' + value.gender + '</td>'
                        + '<td>' + value.contact + '</td>'
                        + '<td>' + value.address + '</td>'
                        +'</tr>'
                        );
                    });
                }
              })
           });
       });
   </script>
   @endsection
@endsection