<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <br>
    <p>{{ $data->today }}<p>
    <p>{{ $data->sender_name }}</p>
    <br>
    <p>Mae Fah Luang University</p>
    <p>333 Moo1, Thasud, Muang, Chiang Rai 57100</p>
    <br>
    <br><br>
    Dear <strong>{{ $data->sender_name }},</strong>

    <div class="row">
        <div class="col-sm-12">
            <p>I already read the message that you sent to me. Now I <strong>{{ $data->status }}</strong> the appointment about {{ $data->subject }}. 
           
            @if($data->status === "accept") 
            Please prepare your self before meeting on {{ $data->appointment_date }} at {{ $data->appointment_room}}.
            @endif
      
            If you require any further information, feel free to contact me at {{$data->receiver_email}}.</p>
        </div>

    </div>
    <br>
    Sincrely,
    <br>
    {{ $data->receiver_name }}
</body>

</html>