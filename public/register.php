<?php
include('../config/db.php');
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("SELECT * FROM user_data WHERE userEmail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        $message = "Email already exists!";
    } else {
        $stmt = $conn->prepare("INSERT INTO user_data (userName, userEmail, userPassword) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['username'] = $name;
            header("Location: index.php");
        } else {
            $message = "❌ Error: " . $stmt->error;
        }
    }
    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <div class="form-container">
    <h2>User Registration</h2>

    <?php if (!empty($message)): ?>
      <span id="mailExistance" style="color: red;"><?php echo $message; ?></span>
    <?php endif; ?>

    <form action="register.php" method="POST">
      <label>Name:</label>
      <input type="text" name="name" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>
