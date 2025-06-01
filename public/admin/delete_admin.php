<?php
  session_start();
  include('../config/db.php');

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $stmt = $conn->prepare("DELETE FROM `user_data` WHERE UserID = ?");
    $stmt = $stmt->bind_param("s", $id);
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record" . $stmt->error;
    }
}
?>