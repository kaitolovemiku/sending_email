@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(session()->get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('success') }}
        </div><br />
        @endif

        <br style="height:50px;">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Email Sender System - MFU</h6>
                    <div class="dropdown no-arrow">
                        <a href="/" class="btn btn-success white"> Create New Email</a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

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
                                <form action="{{ route('lib.destroy', $email->id) }}" method="POST">

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            <a class="fa fa-share-square white" style="color:aliceblue;" aria-hidden="true" href="{{ route('lib.show', $email->id) }}">
                                            </a>
                                        </button>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-secondary btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection