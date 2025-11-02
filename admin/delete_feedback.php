<?php
include('../config/db_connect.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM feedbacks WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}
$conn->close();
?>
