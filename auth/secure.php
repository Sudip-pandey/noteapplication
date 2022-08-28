<?php

if (isset($_SESSION["login"])) {
} else {
  echo "<script>window.location.href='{$url}';</script>";
}
?>