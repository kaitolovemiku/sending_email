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
          <input id="receiver_name" type="text" class="form-control" name="receiver_name" />
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="price">Teacher e-mail:</label>
          <input type="email" class="form-control" name="receiver_email" />
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
          <label for="quantity">Appointment Room:</label>
          <input type="text" class="form-control" name="appointment_room" />
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="form-group">
          <label for="quantity">Appointment Date:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon2"><i class="fa fa-calendar"></i></div>
            </div>
            <input autocomplete="none" name="appointment_date" type="datetime" class="form-control form_datetime" placeholder="12/02/2019 11:12">
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="price">Appointment Topic:</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a id="one" class="dropdown-item">Advisor Meeting</a>
            <a id="two" class="dropdown-item">Couse work</a>
            <a id="three" class="dropdown-item">Sennior Project</a>
            <a id="four" class="dropdown-item">Scholarship</a>
            <a id="five" class="dropdown-item">Meeing</a>
            <a id="six" class="dropdown-item">Training-Learning</a>
            <a id="seven" class="dropdown-item">Couse Register</a>
            <a id="eigh" class="dropdown-item">Student Activity</a>
            <a id="nine" class="dropdown-item">Teacher Assistance</a>
          </div>
        </div>
        <input id="subject" name="subject" type="text" class="form-control" placeholder="Adviser Meeting" aria-label="Adviser Meeting" aria-describedby="btnGroupAddon2">
      </div>
      <div class="form-group">
        <label for="price">Note:</label>
        <input type="text" class="form-control" name="message" placeholder="I got very low Score. So I want to drop Basic Computer."/>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Request Appointment</button>
    </div>
  </form>

</div>
<script type="text/javascript">
  $(".form_datetime").datetimepicker({
    autoclose: true,
    todayBtn: true,
    startDate: new Date(),
  });
  $("#one").click(function() {
    $("#subject").val("Advisor Meeting");
  });
  $("#two").click(function() {
    $("#subject").val("Couse work");
  });
  $("#three").click(function() {
    $("#subject").val("Sennior Project");
  });
  $("#four").click(function() {
    $("#subject").val("Scholarship");
  });
  $("#five").click(function() {
    $("#subject").val("Meeing");
  });
  $("#six").click(function() {
    $("#subject").val("Training-Learning");
  });
  $("#seven").click(function() {
    $("#subject").val("Couse Register");
  });
  $("#eigh").click(function() {
    $("#subject").val("Student Activity");
  });
  $("#nine").click(function() {
    $("#subject").val("Teacher Assistance");
  });
</script>
@endsection