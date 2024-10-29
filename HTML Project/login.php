<?php
$Email = $_POST['email'];
$Password = $_POST['Password'];

$conn = mysqli_connect("localhost", "root", "system", "housing_rental");

$stmt = $conn->prepare("SELECT password FROM user WHERE email_id = ?");
$stmt->bind_param("s", $Email); // 's' specifies the variable type => 'string'
$stmt->execute();
$result = $stmt->get_result();

// Check if a user was found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    // Compare the input password with the stored password
    if ($Password === $storedPassword) { // Use this if passwords are not hashed
        echo "Login Successfully";
        
    } else {
        echo "Invalid password";
    }
} else {
    echo "No user found";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
