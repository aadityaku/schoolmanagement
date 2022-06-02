@extends('homepages/extra')
@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card card-lg">
                {{-- <div class="card-header text-center">Enter </div> --}}
                <div class="card-body">
                    <form action="{{ route('online.payment') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="roll" id="floatingInput" placeholder="Roll number">
                            <label for="floatingInput">Roll number</label>
                            @error('roll')
                            <p class="small text-danger">{{$message}}</p>
                        @enderror
                          </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="dob" id="floatingInput" placeholder="Roll number">
                            <label for="floatingInput">Student date of birth</label>
                            @error('dob')
                            <p class="small text-danger">{{$message}}</p>
                        @enderror
                          </div>
                          
                          <div class="mb-3">
                           <label for="">Enter your class</label>
                           <select name="clases_id" class="form-select">
                               <option value="">--Select--</option>
                               @foreach ($clases as $item)
                                   <option value="{{$item->id}}">{{$item->classname}}</option>
                               @endforeach
                           </select>
                            @error('clases_id')
                            <p class="small text-danger">{{$message}}</p>
                        @enderror
                          </div>
                    <div class="mb-3">
                        <input type="submit" value="See Payment" class="btn btn-success w-100 rounded-pill">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($payment)
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>month</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                @foreach ($payment as $pay)
                    <tr>
                        <td>{{ $pay->id}}</td>
                        <td>{{ $pay->student->studentname}}</td>
                        <td>{{ $pay->due_date}}</td>
                        <td>{{ $pay->fee}}</td>
                        <td>
                          @if($pay->status == "due")
                          <form action="{{ route('makePayment') }}" method="POST">
                            <input type="hidden" value="{{ $pay->student->roll}}" name="roll" class="form-control">
                             <input type="hidden" value="{{ $pay->id}}" name="pay_id" class="form-control">
                             @csrf
                            <input type="submit" class="btn btn-success" value="Pay">
                        </form>
                            @else
                            <a href="" class="btn btn-warning disabled">Paid</a>  
                          @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endif
</div>
@endsection
