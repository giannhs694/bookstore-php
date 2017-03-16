<?php
$host='localhost';
$db='bookstoredb';
$user='root';
$password='123456';

$conn = new mysqli($host, $user, $password, $db);
if($conn->connect_errno){
    echo "Failed to connect to MySQL: (" . 
    $conn->connect_errno . ") " . $conn->connect_error;
}else{
    echo "Connected succesfully to Database";
    
}

//mysqli_close($conn);


?>
