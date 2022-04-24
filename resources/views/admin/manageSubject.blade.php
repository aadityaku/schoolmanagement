@extends('admin/master')

@section('content')
<a href="#insert" class="btn btn-success float-end" data-bs-toggle="modal">Add Subject</a>
<div class="row">
    <div class="col-8">
        <h2 class="text-warning text-center">Manage Subject</h2>
            
    </div>
   <div class="col-3">
       <form action="" method="post">
           @csrf
           <input type="search" class="form-control" placeholder="Search here Subject">
           <input type="submit" class="btn btn-success" hidden>
       </form>
   </div>
</div>
          
          
            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Id</th>
                    <th>Subject Name</th>
                    <th>Class</th>
                    <th>Book And Accesories</th>
                  
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($subjects as $sub)
                        <tr>
                            <td>{{ $sub->id}}</td>
                            <td>{{ $sub->subjectname}}</td>
                            <td>{{ $sub->class}}</td>
                           <td>{{ $sub->discountbookrate}}  <span class="text-danger ms-2"><del>{{$sub->bookrate}}</del></span></td>
                           
                            <td>
                                <a href="" class="btn btn-danger">X</a>
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-warning">View</a>
                            </td>

                            
                        </tr>

                    @endforeach
                </tr>
            </table>
    <div class="modal fade" id="insert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('subject.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Subject Name</label>
                            <input type="text" name="subjectname" class="form-control @error('subjectname') is-valid @enderror">
                            @error('subjectname')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Class name</label>
                            <input type="text" name="class" class="form-control @error('class') is-valid @enderror">
                            @error('class')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Book Rate</label>
                            <input type="text" name="bookrate" class="form-control @error('bookrate') is-valid @enderror">
                            @error('bookrate')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Discount Book Rate</label>
                            <input type="text" name="discountbookrate" class="form-control @error('discountbookrate') is-valid @enderror">
                            @error('discountbookrate')
                                <p class="small text-danger">{{$message}}</p>
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
@endsection