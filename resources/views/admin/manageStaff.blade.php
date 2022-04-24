@extends('admin/master')

@section('content')
          <h2 class="text-warning text-center">Manage Staff</h2>
            
            <a href="#insert" data-bs-toggle="modal" class="btn btn-success float-end mb-2">Add Staff</a>
            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Id</th>
                    <th>Staff Name</th>
                    <th>Job Role</th>
                    <th>Monthly Fee</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Worktime</th>
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($staffs as $s)
                        <tr>
                            <td>{{ $s->id}}</td>
                            <td>{{ $s->staffname}}</td>
                            <td>{{ $s->job}}</td>
                            <td>{{ $s->monthlyfee}}</td>
                            <td>{{ $s->contact}}</td>
                            <td>{{ $s->address}}</td>
                            <td>{{ $s->gender}}</td>
                            <td>{{ $s->worktime}}</td>
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
                    <form action="{{ route('staff.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Staff Name</label>
                            <input type="text" name="staffname" value="{{ old('staffname') }}" class="form-control @error('staffname') is-valid @enderror">
                            @error('staffname')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Job Type</label>
                            <input type="text" name="job" value="{{ old('job') }}" class="form-control @error('job') is-valid @enderror">
                            @error('job')
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
                            <label for="">Contact</label>
                            <input type="text" name="contact" value="{{ old('contact') }}" class="form-control @error('contact') is-valid @enderror">
                            @error('contact')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Worktime</label>
                           <input type="text" name="worktime" value="{{ old('worktime') }}" class="form-control @error('worktime') is-valid @enderror">
                            @error('worktime')
                                <p class="small text-danger">{{ $message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Gender</label>
                           <select name="gender" class="form-select">
                               <option value="">--select--</option>
                               <option value="M">Male</option>
                               <option value="F">Female</option>
                               <option value="O">Other</option>
                           </select>
                            @error('gender')
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