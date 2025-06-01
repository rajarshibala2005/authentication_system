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
    if (!isset($_SESSION['username'])) {
      header("Location: login.php");
      exit();
    }

    if ($_SESSION['role'] === 'admin') {
      header("Location: admin/admin.php");
      exit();
    } else {
      echo "<h2>Welcome " . $_SESSION['username'] . "</h2>";
      echo "<p>You are logged in.</p>";
      echo $_SESSION['role'];
      echo $_SESSION['username'];
    }
     ?>
    <form action="logout.php" method="POST">
      <input type="submit" value="Logout">
    </form>
  </div>
</body>
</html>
