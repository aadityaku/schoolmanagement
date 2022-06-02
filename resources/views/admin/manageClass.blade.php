@extends('admin/master')

@section('content')
          <h2 class="text-warning text-center">Manage Class</h2>
            
            <a href="#insert" data-bs-toggle="modal" class="btn btn-success float-end mb-2">Insert Class</a>
            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Id</th>
                    <th>Class Name</th>
                    <th>Class Teacher</th>
                    <th>New AddmissionFee</th>
                    <th>Re AddmissionFee</th>
                    <th>monthly Fee</th>
                    <th>Seats Avialable</th>
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($clases as $c)
                        <tr>
                            <td>{{ $c->id}}</td>
                            <td>{{ $c->classname}}</td>
                            <td>{{ $c->classteacher->teachername}}</td>
                            <td>{{ $c->newadmissionfee}}</td>
                            <td>{{ $c->readdmissionfee}}</td>
                            <td>{{ $c->monthlyfee}}</td>
                            <td>{{ $c->seat}}</td>
                            
                            <td>
                                <a href="" class="btn btn-danger">X</a>
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="{{ route('class.viewrouting',['id'=>$c->id]) }}" class="btn btn-warning">View Routing</a>
                            </td>

                            
                        </tr>

                    @endforeach
                </tr>
            </table>
    <div class="modal fade" id="insert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('clases.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Class Name</label>
                            <input type="text" name="classname" value="{{ old('classname') }}" class="form-control @error('classname') is-valid @enderror">
                            @error('classname')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">New Addmission Fee</label>
                            <input type="text" name="newadmissionfee" value="{{ old('newadmissionfee') }}" class="form-control @error('newadmissionfee') is-valid @enderror">
                            @error('newadmissionfee')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Re Addmission Fee</label>
                            <input type="text" name="readdmissionfee" value="{{ old('readdmissionfee') }}" class="form-control @error('readdmissionfee') is-valid @enderror">
                            @error('readdmissionfee')
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
                            <label for="">Age period</label>
                            <input type="text" name="age" value="{{ old('age') }}" class="form-control @error('age') is-valid @enderror">
                            @error('age')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Time Period</label>
                            <input type="text" name="time" value="{{ old('time') }}" class="form-control @error('time') is-valid @enderror">
                            @error('time')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Seats Avialable</label>
                            <input type="text" name="seat" value="{{ old('seat') }}" class="form-control @error('seat') is-valid @enderror">
                            @error('seat')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">About Class description</label>
                            <textarea name="description" rows="5" class="form-control @error('description') is-valid @enderror">{{ old('description') }}</textarea>
                            @error('description')
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
                            <label for="">Class Teacher</label>
                            <select name="teacher_id" class="form-select">
                                @foreach ($teachers as $item)
                                    <option value="{{ $item->id }}">{{ $item->teachername}}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
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