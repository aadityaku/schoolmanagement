@extends('teacher/master')

@section('content')
<a href="#insert" class="btn btn-success float-end" data-bs-toggle="modal">Add Homework</a>
<div class="row">
    <div class="col-8">
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
                    <th>Class  name</th>
                    <th>Home Work</th>
                    
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($homework as $sub)
                        <tr>
                            <td>{{ $sub->id}}</td>
                            <td>{{ $sub->class->classname}}</td>
                            <td>{{ $sub->hw}}</td>
                             
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
                    <form action="{{ route('homework.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Home Work </label>
                            <input type="text" name="hw" class="form-control @error('hw') is-valid @enderror">
                            @error('hw')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                         <div class="mb-3">
                             <label for="">Class Name</label>
                            <select name="clases_id" class="form-select">
                                <option value="">---select---</option>
                                @foreach ($clases as $item)
                                    <option value="{{$item->id}}">{{$item->classname}}</option>
                                @endforeach
                            </select>
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