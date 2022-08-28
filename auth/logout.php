<?php
include "../backend/config.php";
session_start();
if (!isset($_SESSION["login"])) {
  echo "<script>window.location.replace('{$url}');</script>";
} else {
  setcookie("uid", "", 60 * 60 * 24, "/");
  setcookie("login", "", 60 * 60 * 24, "/");
  session_unset();
  session_destroy();
}
?>
<div class="div" style="display: flex;align-items: center;justify-content: center;height: 100vh;">
    <h3
        style="font-family: sans-serif;color: white;padding: 20; margin: 20px auto;background: black; border-radius: 4px; ">
        Logging out !!!</h3>
</div>

<script>
setTimeout(() => {
    window.location.href = "<?php echo $url; ?>";
}, 1500);
</script>