@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<?php 

$teacher_name = $_GET["receiver_name"];
$teacher_email = $_GET["receiver_email"];
$student_name = $_GET["sender_name"];
$student_email = $_GET["sender_email"];
$receive_email_topic = $_GET["subject"];
$receive_email_message = $_GET["message"];
$receive_email_room = $_GET["appointment_room"];
$receive_email_date = $_GET["appointment_date"];
$receive_email_status = $_GET["status"];
$email_token = $_GET["email_token"];
?>
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

  <form method="post" action="{{ route('lib.update', $email_token) }}">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
        @csrf
        @method('PUT')
          <label for="name">Teacher Name:</label>
          <input type="text" class="form-control" name="receiver_name" value="{{$teacher_name}}"/>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="price">Teacher e-mail:</label>
          <input type="email" class="form-control" name="receiver_email" value="{{$teacher_email}}"/>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="name">Your Name:</label>
          <input type="text" class="form-control" name="sender_name" value="{{$student_name}}"/>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="price">Your e-mail:</label>
          <input type="email" class="form-control" name="sender_email" value="{{$student_email}}"/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="quantity">Your Appointment Room:</label>
          <input type="text" class="form-control" name="appointment_room" value="{{$receive_email_room}}"/>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group input-append date form_datetime">
          <label for="quantity">Appointment Date:</label>
          <input type="datetime-local" class="form-control" name="appointment_date" value="{{$receive_email_date}}"/>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="price">Your Appointment Topic:</label>
      <input type="text" class="form-control" name="subject" value="{{$receive_email_topic}}"/>
    </div>
    <div class="form-group">
      <label for="price">Your Appointment Content:</label>
      <input type="text" class="form-control" name="message" value="{{$receive_email_message}}"/>
    </div>
    <div class="form-group">
      <label for="price">Your Appointment Status:</label>
      <input type="text" class="form-control" name="status" value="{{$receive_email_status}}"/>
    </div>
    <div class="form-group" style="display:none;">
      <label for="price">Token:</label>
      <input type="text" class="form-control" name="email_token" value="{{$email_token}}"/>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Update data</button>
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