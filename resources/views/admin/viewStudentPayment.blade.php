@extends('admin/master')

@section('content')
<div class="row">
    <div class="col-9">
        <h2 class="text-warning text-center">Manage Payment</h2>
    </div>
    <div class="col-3">
        <form action="" method="POST">
            <input type="search" class="form-control" placeholder="Serach here students">
            <input type="submit" class="btn btn-success" hidden>
        </form>
    </div>
</div>

            <table class="table">
                <tr class="bg-secondary text-white rounded">
                    <th>Roll</th>
                    <th>Name</th>
                    <th>Due Date</th>
                    <th>Fees Due</th>
                    <th>Class</th>
                   
                    <th>Action</th>

                </tr>
                <tr>
                    @foreach ($payment as $p)
                        <tr>
                            <td>{{ $p->student->roll}}</td>
                            <td>{{ $p->student->studentname}}</td>
                            <td>{{ $p->due_date}}</td>
                            <td>{{ $p->fee}}</td>
                            <td>{{ $p->clases_id}}</td>
                           
                            <td>
                                @if($p->status == "due")
                                    <a href="" class="btn btn-success">Pay</a>
                                @endif
                            </td>

                            
                        </tr>

                    @endforeach
                </tr>
            </table>
   
@endsection