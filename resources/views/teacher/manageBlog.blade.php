@extends('admin/master')

@section('content')
          <h2 class="text-warning text-center">Manage Class</h2>
            
            <a href="#insert" data-bs-toggle="modal" class="btn btn-success float-end mb-2">Insert Class</a>
            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Id</th>
                    <th>Title</th>
                    <th>author</th>
                    <th>views</th>
                    <th>Category</th>
                    
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($blogs as $c)
                        <tr>
                            <td>{{ $c->id}}</td>
                            <td>{{ $c->title}}</td>
                            <td>{{ $c->author}}</td>
                            <td>{{ $c->views}}</td>
                            <td>{{ $c->subject_id}}</td>
                          
                            
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
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-valid @enderror">
                            @error('title')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Author</label>
                            <input type="text" name="author" value="{{ old('author') }}" class="form-control @error('author') is-valid @enderror">
                            @error('author')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Category</label>
                           <select name="subject_id" class="form-select" value="{{old('subject_id') }}">
                               @foreach ($students as $item)
                                   <option value="{{$item->id}}">{{$item->subjectname}}</option>
                               @endforeach
                           </select>
                            @error('subject_id')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" value="{{ old('image') }}" class="form-control @error('image') is-valid @enderror">
                            @error('image')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
@endsection