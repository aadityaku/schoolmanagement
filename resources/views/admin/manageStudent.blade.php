@extends('admin/master')

@section('content')
<div class="row">
    @foreach ($class as $c)
        <div class="col-4 mt-2">
            <div class="card bg-info">
                <div class="card-body">
                    <h1 class="text-white">Class :<span class="text-dark">{{$c->classname}}</span></h2>
                    <h3 class="text-white">Class Teacher :<span class="text-dark ">{{$c->classteacher->teachername}}</span></h3>
                    @php $count=0; @endphp
            @foreach ($student as $s)
                       @if($s->clases_id == $c->id)
                           @php $count +=1; @endphp
                       @endif
                    @endforeach
                    <h3 class="text-white">Total Student :<span class="text-dark"> {{$count}}</span></h3>
                    <a href="{{ route('student.viewstudent',['clases_id'=>$c->id]) }}" class="btn btn-success stretched-link float-end ">View All</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
   
@endsection