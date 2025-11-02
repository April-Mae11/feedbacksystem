<?php
include('config/db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $sql = "INSERT INTO feedbacks (name, email, message) VALUES ('$name', '$email', '$message')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Feedback submitted successfully!'); window.location.href='submit_feedback.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>
