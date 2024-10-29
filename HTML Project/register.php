<?php
$Name = $_POST['name'];
$Email = $_POST['email'];
$Phone_no = $_POST['phone'];
$Password = $_POST['Password'];
$Confirm_Password = $_POST['confirm-password'];

// Establish connection
$conn = mysqli_connect("localhost", "root", "system", "housing_rental");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if passwords match
if ($Password !== $Confirm_Password) {
    echo "Passwords do not match";
    exit;
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO user (name, email_id, phone_no, password, confirm_password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $Name, $Email, $Phone_no, $Password, $Confirm_Password);

// Execute the statement
if ($stmt->execute()) {
    echo "Registration Successful";
} else {
    echo "Registration failed: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>


