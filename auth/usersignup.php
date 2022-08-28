<?php

include "../backend/config.php";

$name = exechtmlchars($_POST["name"]);
$email = exechtmlchars($_POST["email"]);
$username = exechtmlchars($_POST["username"]);
$password = exechtmlchars($_POST["password"]);
$date = exechtmlchars($_POST["datecreated"]);
$pwd = password_hash("{$password}", PASSWORD_BCRYPT);

$stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
$stmt->bindParam(":username", $username);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!count($res)) {
  if (!empty($name && $email && $pwd && $username && $date)) {
    $stmt1 = $conn->prepare(
      "INSERT INTO users (fname , username, email , pass, createdat  ) VALUES (:fname , :username ,:email ,  :pass , :createdat)"
    );
    $stmt1->bindParam(":fname", $name);
    $stmt1->bindParam(":username", $username);
    $stmt1->bindParam(":email", $email);
    $stmt1->bindParam(":pass", $pwd);
    $stmt1->bindParam(":createdat", $date);
    if ($stmt1->execute()) {
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