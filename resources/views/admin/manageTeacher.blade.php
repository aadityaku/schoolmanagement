@extends('admin/master')

@section('content')
          <h2 class="text-warning text-center">Manage Teacher</h2>
            
            <a href="#insert" data-bs-toggle="modal" class="btn btn-success float-end mb-2">Add Teacher</a>
            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Id</th>
                    <th>Teacher Name</th>
                    <th>Subject</th>
                    <th>Contact</th>
                    <th>Education</th>
                    <th>Date Of Birth</th>
                    <th>Monthly fee</th>
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($teachers as $t)
                        <tr>
                            <td>{{ $t->id}}</td>
                            <td>{{ $t->teachername}}</td>
                            <td>{{ $t->subject_id}}</td>
                            <td>{{ $t->contact}}</td>
                            <td>{{ $t->education}}</td>
                            <td>{{ $t->dob}}</td>
                            <td>{{ $t->monthlyfee}}</td>
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
                    <form action="{{ route('teacher.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Teacher Name</label>
                            <input type="text" name="teachername" value="{{ old('teachername') }}" class="form-control @error('teachername') is-valid @enderror">
                            @error('teachername')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Resume</label>
                            <input type="file" name="resume" value="{{ old('resume') }}" class="form-control @error('resume') is-valid @enderror">
                            @error('resume')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Education</label>
                            <input type="text" name="education" value="{{ old('education') }}" class="form-control @error('education') is-valid @enderror">
                            @error('education')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Monthly Fee</label>
                            <input type="text" name="monthlyfee" value="{{ old('monthlyfee') }}" class="form-control @error('monthlyfee') is-valid @enderror">
                            @error('monthlyfee')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Subject</label>
                            <select name="subject_id" class="form-select">
                                @foreach ($subjects as $item)
                                    <option value="{{ $item->id }}">{{ $item->subjectname}}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                           <textarea name="address" rows="5" class="form-control @error('address') is-valid @enderror">{{ old('address') }}</textarea>
                           @error('address')
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