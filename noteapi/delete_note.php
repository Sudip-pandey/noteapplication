<?php 

include "../backend/config.php";

session_start();

if (isset($_SESSION["login"]) && isset($_GET["nid"])) {
} else {
  echo "<script>window.location.href='{$url}';</script>";
}

$id = $_GET["nid"];

if($id) {
    $stmt = $conn->prepare("DELETE FROM note WHERE id=:id");
    $stmt->bindParam(":id", $id);
    if($stmt->execute()){
        echo "<script>window.location.href='{$url}/notes.php';</script>";
        // echo $id;
    }else {
        echo "<script>window.location.href='{$url}';</script>";
    }

}else {
    echo "<script>window.location.href='{$url}';</script>";

    // header("/");
}