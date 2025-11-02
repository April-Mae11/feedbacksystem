<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submit Feedback</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Feedback Form</h2>
    <form action="insert_feedback.php" method="POST">
      <label>Name</label>
      <input type="text" name="name" required>

      <label>Email</label>
      <input type="email" name="email" required>

      <label>Message</label>
      <textarea name="message" rows="5" required></textarea>

      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
