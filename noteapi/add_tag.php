<?php
include "../backend/variables.php";
include "../backend/config.php";

session_start();
if (isset($_SESSION["login"])) {
} else {
  echo "<script>window.location.href='{$url}';</script>";
}

include "../auth/secure.php";

if (!isset($_POST["tname"])) {
  die("Access Denied !!");
}
$tname = exechtmlchars($_POST["tname"]);

if (!empty($tname)) {
  $stmt = $conn->prepare("SELECT * FROM tags WHERE tname=:tname");
  $stmt->bindParam(":tname", $tname);
  $stmt->execute();
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (!count($res)) {
    $stmt1 = $conn->prepare("INSERT INTO tags ( tname  ) VALUES (:tname)");
    $stmt1->bindParam(":tname", $tname);
    if ($stmt1->execute()) {
      echo 1; // added sucessfully
    } else {
      echo 0; // failed to add tag
    }
  } else {
    echo 2; // tag is already in use
  }
} else {
  echo 3; // empty
}
?>