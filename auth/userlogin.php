<?php
include "../backend/config.php";
session_start();

if (!isset($_POST["username"], $_POST["password"])) {
  die("Access Denied !");
}

$username = exechtmlchars($_POST["username"]);
$password = $_POST["password"];

if (!empty($username && $password)) {
  $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":username", $username);
  $stmt->execute();
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($res)) {
    $row = $res[0];
    if (password_verify($password, $row["pass"])) {
      setcookie("uid", $row["id"], time() + 60 * 60 * 24 * 30, "/");
      setcookie("login", true, time() + 60 * 60 * 24 * 30, "/");
      $_SESSION["login"] = true;
      $_SESSION["uid"] = $row["id"];
      $_SESSION["name"] = $row["fname"];
      echo 1;
    } else {
      echo 0;
    }
  } else {
    echo 0;
  }
} else {
  echo 2;
}
?>