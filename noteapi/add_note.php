<?php
include "../backend/config.php";
include "../backend/variables.php";

session_start();
if (isset($_SESSION["login"]) && isset($_COOKIE["login"])) {
} else {
  echo "<script>window.location.href='{$url}';</script>";
}

include "../auth/secure.php";

if (!isset($_POST["title"])) {
  die("Access Denied !!");
}

function validateSwitch($number)
{
  switch ($number) {
    case 1:
      return true;
    case 0:
      return true;
    default:
      return false;
  }
}

$author = $_SESSION["uid"];
$title = exechtmlchars($_POST["title"]);
$status = exechtmlchars($_POST["status"]);
$type = exechtmlchars($_POST["type"]);
$tag = exechtmlchars($_POST["tag"]);
$date = exechtmlchars($_POST["date"]);
$notedesc = $_POST["notedesc"];

if (validateSwitch($status) && validateSwitch($type)) {
  if (
    !empty($title && $author && $tag && $date && $notedesc)
  ) {
    $stmt = $conn->prepare(
      "INSERT INTO note(title, notedesc, status, tag, type, author, date) VALUES (:title,:notedesc, :status, :tag,:type,:author,:date);"
    );
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":notedesc", $notedesc);
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":tag", $tag);
    $stmt->bindParam(":type", $type);
    $stmt->bindParam(":author", $author);
    $stmt->bindParam(":date", $date);
    if ($stmt->execute()) {
      echo 1; // added sucessfully
    } else {
      echo 0; // failed to add
    }
  } else {
    echo 3; // empty
  }
} else {
  echo 4; // input field incorrect
}

?>