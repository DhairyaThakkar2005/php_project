<?php
// Start the session (if you need it)
session_start();

// Include the database connection
include "conn.php"; // Same as before, your DB connection logic

// Get POST data from the payment form
$property_id = isset($_POST['property_id']) ? (int)$_POST['property_id'] : 0;
$user_id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
$amount = isset($_POST['amount']) ? (float)$_POST['amount'] : 0;

if ($property_id === 0 || $user_id === 0 || $amount === 0) {
    die('Missing required information.');
}

// Simulate payment processing (integrate with real payment gateway like Stripe, PayPal, etc. here)
// For now, let's assume payment is successful.

// Insert the booking into the database
$query = "INSERT INTO payment (tenant_id, property_id,amount,payment_date,payment_method,card_number,expiry_date,cvv,upi_id, payment_status) VALUES (?, ?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$property_id, $user_id, $amount, 'paid']); // 'paid' could be status for the booking

// Optionally, send an email or show a confirmation message

echo 'Payment successful! Your booking has been confirmed.';
?>
