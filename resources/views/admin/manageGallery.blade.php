@extends('admin/master')

@section('content')
          <h2 class="text-warning text-center">Manage Class</h2>
            
            <a href="#insert" data-bs-toggle="modal" class="btn btn-success float-end mb-2">Insert Gallerys</a>
            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Id</th>
                    <th>Category</th>
                    <th>image</th>
                   
                    
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($gallery as $c)
                        <tr>
                            <td>{{ $c->id}}</td>
                            <td>{{ $c->subject_id}}</td>
                            <td><img src="{{ asset("gallery/".$c->image)}}" alt="" style="object-fit:cover"></td>
                          
                          
                            
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
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="">Category</label>
                           <select name="subject_id" class="form-select" value="{{old('subject_id') }}">
                               @foreach ($subjects as $item)
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
                            <label for="">Description</label>
                            <textarea name="description"  rows="5" class="form-control @error('image') is-valid @enderror">{{ old('description') }}</textarea>
                            @error('description')
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