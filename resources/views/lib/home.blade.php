@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 5.8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success"> Create New Product</a>
            </div>
        </div>
    </div>

    @if(session()->get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('success') }}
    </div><br />
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Subject</th>
            <th>Appointment Room</th>
            <th>Appointment Date</th>
            <th>Teacher Name</th>
            <th>Student Name</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($emails as $email)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $email->subject }}</td>
            <td>{{ $email->appointment_room }}</td>
            <td>{{ $email->appointment_date }}</td>
            <td>{{ $email->receiver_name }}</td>
            <td>{{ $email->sender_name }}</td>
            <td>{{ $email->status }}</td>
            <td>
                <form action="{{ route('lib.store') }}" method="POST">

                    <a class="btn btn-info" href="{{ route('lib.show',$lib->id) }}">Show</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection