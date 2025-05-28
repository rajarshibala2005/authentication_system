<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="form-container">
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
      echo "<h2>Welcome " . $_SESSION['username'] . "</h2>";
      echo "<p>You are logged in.</p>";
    } else {
      header("Location: login.php");
      exit();
    }
     ?>
    <form action="logout.php" method="POST">
      <input type="submit" value="Logout">
    </form>
  </div>
</body>
</html>
