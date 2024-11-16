<?php
session_start();
include "conn.php";

// Initialize image path variable
$imagePath = '';  

if (isset($_FILES['property_image']) && $_FILES['property_image']['error'] == 0) {
    $targetDir = "uploads/"; // Directory where images will be stored
    $targetFile = $targetDir . basename($_FILES["property_image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an image
    $check = getimagesize($_FILES["property_image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["property_image"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;  // Set image path for database
        } else {
            echo "Error uploading the image.";
        }
    } else {
        echo "File is not an image.";
    }
}

// Collect form data
$property_id = $_POST['property_id'];
$name = $_POST['name'];
$title = $_POST['title'];
$description = $_POST['description'];
$property_type = $_POST['property_type'];
$location = $_POST['location'];
$price = $_POST['price'];
$size = $_POST['size'];
$furnished_status = $_POST['furnished_status'];
$availability_status = $_POST['availability_status'];
$contact_info = $_POST['contact_info'];
$pets_allowed = $_POST['pets_allowed'];
$lease_terms = $_POST['lease_terms'];

// Prepare the SQL query to insert data into the property table (including image path)
$sql = "INSERT INTO property (property_id, owner_name, title, description, property_type, location, price, size, furnished_status, availability_status, contact_info, pets_allowed, lease_terms, image_path) 
        VALUES ('$property_id', '$name', '$title', '$description', '$property_type', '$location', '$price', '$size', '$furnished_status', '$availability_status', '$contact_info', '$pets_allowed', '$lease_terms', '$imagePath')";

if ($conn->query($sql) === TRUE) {
    header("Location: property-listings.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
