@extends('admin/master')
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card bg-success">
                <div class="card-body">
                    <h2>Total Student</h2>
                    <h2>{{ $totalStudent}}</h2>
                    <a href="{{ route('student.index') }}" class="btn stretched-link bg-dark text-white float-end">View all</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-warning">
                <div class="card-body">
                    <h2>Total Teacher</h2>
                    <h2>{{$totalTeacher}}</h2>
                    <a href="{{ route('teacher.index') }}" class="btn stretched-link bg-dark text-white float-end">View all</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-info">
                <div class="card-body">
                    <h2>Total Staff</h2>
                    <h2>{{ $totalStaff}}</h2>
                    <a href="{{ route('staff.index') }}" class="btn stretched-link bg-dark text-white float-end">View all</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card bg-danger">
                <div class="card-body">
                    <h2>New Addmissions</h2>
                    <h2>{{ $totalnewaddmission}}</h2>
                    <a href="{{ route('student.newaddmission') }}" class="btn  stretched-link bg-dark text-white float-end">View all</a>
                </div>
            </div>
        </div>
    </div>
@endsection