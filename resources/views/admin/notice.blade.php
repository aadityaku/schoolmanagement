@extends('admin/master')

@section('content')
<a href="#insert" class="btn btn-success float-end" data-bs-toggle="modal">Add Subject</a>
<div class="row">
    <div class="col-8">
        <h2 class="text-warning text-center">Manage Notice</h2>
            
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
                    <th>Notice name</th>
                   
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($notice as $sub)
                        <tr>
                            <td>{{ $sub->id}}</td>
                            <td>{{ $sub->news}}</td>
                           
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
                    <form action="{{ route('notice.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">News / Notice</label>
                            <input type="text" name="news" class="form-control @error('news') is-valid @enderror">
                            @error('news')
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