@extends('admin/master')

@section('content')
<div class="row">
    <div class="col-6">
        <h2 class="text-warning text-center">Manage Routing</h2>
    </div>
    <div class="col-3">
        <form action="" method="POST">
            <input type="search" class="form-control" placeholder="Serach here students">
            <input type="submit" class="btn btn-success" hidden>
        </form>
    </div>
    <div class="col-3">
        <a href="#insert" data-bs-toggle="modal" class="btn btn-success float-end">Add Routing</a>
    </div>
</div>

            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Period</th>
                    <th>TIme</th>
                    <th>Subject</th>
                    <th>Teacher Rol</th>
                    <th>Teacher name</th>
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($routings as $r)
                        <tr>
                            <td>{{ $r->period}}</td>
                            <td>{{ $r->time}}</td>
                            <td>{{ $r->subject->subjectname}}</td>
                            <td>{{ $r->teacherrol}}</td>
                            <td>{{ $r->teacher->teachername}}</td>
                           
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
                   <form action="{{ route('routings.store',['clases_id'=>$clases_id]) }}" method="POST">
                       @csrf
                       <div class="mb-3">
                           <label for="">Peroids</label>
                           <input type="text" name="period" value="{{ old('period') }}" class="form-control @error('period') is-valid @enderror">
                           @error('period')
                               <p class="small text-danger">{{$message}}</p>
                           @enderror
                       </div>
                       <div class="mb-3">
                           <label for="">Time Period</label>
                           <input type="text" name="time" value="{{ old('time') }}" class="form-control @error('period') is-valid @enderror">
                           @error('time')
                               <p class="small text-danger">{{$message}}</p>
                           @enderror
                       </div>
                       <div class="mb-3">
                           <label for="">Teacher Roll</label>
                          <select name="teacherrol" class="form-control">
                              <option value="classteacher">ClassTeacher</option>
                              <option value="subjectteacher">SubjectTeacher</option>
                          </select>
                           @error('teacherrol')
                               <p class="small text-danger">{{$message}}</p>
                           @enderror
                       </div>
                       <div class="mb-3">
                           <label for="">Subject</label>
                          <select name="subject_id" class="form-select">
                              <option value="">--select--</option>
                              @foreach ($subjects as $item)
                                  <option value="{{ $item->id}}">{{$item->subjectname}}</option>
                              @endforeach
                          </select>
                           @error('subject_id')
                               <p class="small text-danger">{{$message}}</p>
                           @enderror
                       </div>
                       <input type="text" value="{{$clases_id}}" name="clases_id" hidden>

                       <div class="mb-3">
                           <input type="submit" class="btn btn-success w-100">
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection