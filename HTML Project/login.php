<?php
$UserId = $_POST['UserId'];
$Password = $_POST['Password'];

$conn = mysqli_connect("localhost", "root", "system", "testdb");
//$insert = mysqli_query($conn, "INSERT INTO test (userid, password) VALUES ('dhairya','123')");
$res=mysqli_query($conn, "SELECT password FROM test");
    if ($Password=$res) {
        echo "Login successfully";
    } else {
        echo "Invalid password";
    }
$conn->close();
?>
