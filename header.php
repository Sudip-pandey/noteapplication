<?php
include "./backend/config.php";
session_start();

if (isset($_COOKIE["login"])) {
  $_SESSION["uid"] = $_COOKIE["uid"];
  $_SESSION["login"] = $_COOKIE["login"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MeroNote</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"
        rel="stylesheet" />

    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <script src="./ckeditor/ckeditor.js"></script>
    <script src="./apps/jquery.js" defer></script>
</head>

<body>