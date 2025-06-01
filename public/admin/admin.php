-<?php
  session_start();
include('../../config/db.php');
  if (!isset($_SESSION['role']) || $_SESSION['role'] === "user") {
    header("Location: ../login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="form-container">
    <h2>Admin Panel</h2>
    <p>Manage registered users here.</p>
    <table border="1" cellspacing="1">
      <tr>
        <th>ID</th>
        <th>username</th>
        <th>useremail</th>
    </tr>
      <?php
        $result = $conn->query("SELECT UserID, userName, userEmail FROM `user_data`");
        while ($row = $result->fetch_assoc()):
      ?>
      <tr>
        <td><?= $row['UserID'] ?></td>
        <td><?= $row['userName'] ?></td>
        <td><?= $row['userEmail'] ?></td>
        <td>
          <a href="delete_admin.php?id=<?= $row['UserID'] ?>" onclick="return confirm('Are you sure')">Delete</a>
        </td>
      </tr>
      <?php
        endwhile;
      ?>
    </table>
    <form>
      <input type="submit" value="Logout">
    </form>
  </div>
</body>
</html>
