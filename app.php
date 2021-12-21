<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods:GET,POST,OPTIONS');
header('Access-Control-Allow-Headers');
header('Content-Type:application/json');

$conn = mysqli_connect("localhost", "root", "", "diploma1.php") or die("Mysql not connected");

$data = json_decode(file_get_contents("php://input"), true);

$firstname = $data['firstname'];
$lastname = $data['lastname'];
$email = $data['email'];
$phone = $data['phone'];
$city = $data['city'];

$query = "INSERT INTO users SET firstname='$firstname',lastname='$lastname',
        email='$email',phone='$phone',city='$city' ";

$result = mysqli_query($conn, $query);

if ($result) {
    $arr=['msg'=>'Record Insert Successfully','status'=>200];
    echo json_encode($arr);
} else {
    $arr=['msg'=>'Record Not - Inserted','status'=>200];
    echo json_encode($arr);
}

?>