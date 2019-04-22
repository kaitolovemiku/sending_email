<?php
use function GuzzleHttp\json_encode;

//action.php
$connect = mysqli_connect('localhost', 'root', '1234', 'sys');

$input = filter_input_array(INPUT_POST);

$sender_name = mysqli_real_escape_string($connect, $input["sender_name"]);
$sender_email = mysqli_real_escape_string($connect, $input["sender_email"]);
$receiver_name = mysqli_real_escape_string($connect, $input["receiver_name"]);
$receiver_email = mysqli_real_escape_string($connect, $input["receiver_email"]);
$subject = mysqli_real_escape_string($connect, $input["subject"]);
$message = mysqli_real_escape_string($connect, $input["message"]);
$appointment_date = mysqli_real_escape_string($connect, $input["appointment_date"]);
$appointment_room = mysqli_real_escape_string($connect, $input["appointment_room"]);
$status = mysqli_real_escape_string($connect, $input["status"]);
if($input["action"] === 'edit')
{
    $query = "
    UPDATE libs SET sender_name = '".$sender_name."',
    sender_email = '".$sender_email."',
    receiver_name = '".$receiver_name."',
    receiver_email = '".$receiver_email."',
    subject = '".$subject."',
    message = '".$message."',
    appointment_date = '".$appointment_date."',
    appointment_room = '".$appointment_room."',
    status = '".$status."',
    ";

    mysqli_query($connect, $query);
}
if($input["action"] === 'delete')
{
    $query = "DELETE FROM libs WHERE id = '".$input["id"]."'";
    mysqli_query($connect, $query);
}

echo json_encode($input);
?>