@extends('layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="col">

    @if ($errors->any())
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    @if(session()->get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('success') }}
    </div><br />
    @endif

    <form method="post" action="{{ route('lib.store') }}">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    @csrf
                    <label for="name">Teacher Name:</label>
                    <input type="text" class="form-control" name="receiver_name" value="<?php $teacher_name = $_GET['teacher_name']?>{{$teacher_name}}"/>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="price">Teacher e-mail:</label>
                    <input type="email" class="form-control" name="receiver_email" value="<?php $teacher_email = $_GET['teacher_email']?>{{$teacher_email}}"/>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" class="form-control" name="sender_name" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="price">Your e-mail:</label>
                    <input type="email" class="form-control" name="sender_email" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="quantity">Your Appointment Room:</label>
                    <input type="text" class="form-control" name="appointment_room" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group input-append date form_datetime">
                    <label for="quantity">Appointment Date:</label>
                    <input type="datetime-local" class="form-control" name="appointment_date" placeholder="14/02/2019" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="price">Your Appointment Topic:</label>
            <input type="text" class="form-control" name="subject" />
        </div>
        <div class="form-group">
            <label for="price">Your Appointment Content:</label>
            <input type="text" class="form-control" name="message" />
        </div>
        <button type="submit" class="btn btn-primary btn-block">Send e-mail</button>
    </form>
</div>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "bottom-left"
    });
</script>
@endsection