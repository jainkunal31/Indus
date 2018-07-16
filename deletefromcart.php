<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = 'kunal@123';
$dbname='kunal';

$conn = new mysqli($host,$user,$password,$dbname);
if ($conn->connect_errno) {
    printf("Connection failed: %s\n", $conn->connect_error);
    die();
}



if(isset($_GET['n']) && !empty($_GET['n'])) {





$itemno = $_GET['n'];
$sql = "DELETE FROM orders where serial_no=$itemno";


if (mysqli_query($conn,$sql) === TRUE) {
   header('location: order.php?status=success');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);

?>