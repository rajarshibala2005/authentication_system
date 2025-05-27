<?php
  include('../config/db.php');
  session_start();
  $message = "";

  if (isset($_POST["email"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT userPassword, userName FROM `user_data` WHERE userEmail = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $hashedpass = $row["userPassword"];
    $userName = $row["userName"];
    if (password_verify($password, $hashedpass)) {
      $_SESSION["username"] = $userName;
      header("Location: index.php");
    } else {
      $message = "Wrong email or password";
    }
  } else {
    $message = "User doesn't exist, create one account by clicking on register";

  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="login.php" method="POST">
      <label>Email:</label>
      <input type="email" name="email" required>
      
      <label>Password:</label>
      <input type="password" name="password" required>
      <?php if (!empty($message)): ?>
        <span style="color: red;"><?php echo $message; ?></span>
      <?php endif; ?>
      
      <input type="submit" value="Login">
    </form>
    <p>New User? <a href="register.php">Register now</a></p>
  </div>
</body>

</html>