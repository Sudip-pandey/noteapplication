<?php
$url = "http://localhost/pandey";
$serverhost = "localhost";
$username = "root";
$password = "";
$dbname = "note";

function exechtmlchars($value)
{
  $value = str_replace("<", "&lt", $value);
  $value = str_replace(">", "&gt", $value);
  $value = str_replace("=", "&#61", $value);
  $value = str_replace("'", "&#39", $value);
  $value = str_replace('"', "&quot", $value);
  $value = str_replace(";", "&#59", $value);
  $value = str_replace("/", "&#47", $value);
  return $value;
}

try {
  $conn = new PDO(
    "mysql:host={$serverhost};dbname={$dbname}",
    "{$username}",
    "{$password}"
  );
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error " . $e->getMessage();
}

?>