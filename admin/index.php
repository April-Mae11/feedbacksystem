<?php
include '../config/db_connect.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
  header('Location: login.php');
  exit;
}

$query = "SELECT * FROM feedbacks ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
  die("Database query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #74ebd5, #acb6e5);
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

    .dashboard {
      display: flex;
      width: 100%;
    }

    .sidebar {
      background: #1f1f2e;
      color: white;
      width: 260px;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .sidebar nav a {
      display: block;
      color: #ccc;
      text-decoration: none;
      padding: 10px 15px;
      margin: 8px 0;
      border-radius: 6px;
      transition: 0.3s;
    }

    .sidebar nav a.active,
    .sidebar nav a:hover {
      background: #3b3b58;
      color: white;
    }

    .logout {
      background: #e74c3c;
      color: white;
      text-align: center;
      padding: 10px;
      border-radius: 6px;
      text-decoration: none;
      transition: 0.3s;
    }

    .logout:hover {
      background: #c0392b;
    }

    .main-content {
      flex: 1;
      padding: 30px;
      overflow-y: auto;
    }

    h1 {
      color: #333;
      font-size: 26px;
      margin-bottom: 20px;
    }

    .table-container {
      background: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 15px;
    }

    th, td {
      padding: 14px 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background: #6a89cc;
      color: white;
    }

    tr:hover {
      background-color: #f2f2f2;
    }

    .delete-btn {
      color: white;
      background: #e74c3c;
      padding: 8px 12px;
      border-radius: 6px;
      text-decoration: none;
      transition: 0.3s;
    }

    .delete-btn:hover {
      background: #c0392b;
    }

    .date-text {
      color: #555;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <aside class="sidebar">
      <div>
        <h2>Admin Panel</h2>
        <nav>
          <a href="index.php" class="active">📋 Feedback List</a>
          <a href="../submit_feedback.php">💬 Submit Feedback</a>
        </nav>
      </div>
      <a href="logout.php" class="logout">Logout</a>
    </aside>

    <main class="main-content">
      <h1>Feedback Management</h1>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Message</th>
              <th>Date Submitted</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td><?= htmlspecialchars($row['message']); ?></td>
                <td class="date-text">
                  <?= isset($row['created_at']) ? date("M d, Y - h:i A", strtotime($row['created_at'])) : '—'; ?>
                </td>
                <td><a href="delete_feedback.php?id=<?= $row['id']; ?>" class="delete-btn">Delete</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</body>
</html>
