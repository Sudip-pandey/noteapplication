<?php include "./header.php"; ?>
<?php
include "./navbar.php";
if (isset($_COOKIE["login"])) {
  $_SESSION["login"] = $_COOKIE["login"];
  $_SESSION["uid"] = $_COOKIE["uid"];
  echo "<script>window.location.href ='{$url}'</script>";
} else {
}
?>

<!-- Login Section -->
<div class="bg-slate-200 py-6 flex flex-col justify-center relative overflow-hidden sm:py-12  | body-main">
    <span
        class="border text-4xl text-yellow-800 px-6 pt-10 pb-8 bg-white w-1/2 max-w-md mx-auto rounded-t-md sm:px-10">Login
    </span>
    <div class="border relative px-4 pt-7 pb-8 bg-white shadow-xl w-1/2 max-w-md mx-auto sm:px-10 rounded-b-md">
        <form id="form" method="post" autocomplete="on">
            <div class="alert alert-primary" style="display: none;" id="loginalert"></div>
            <label for="username" class="block">Username</label>
            <input name="username" id="username" type="Username"
                class="h-10 mb-5 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="Username">
            <label for="" class="block">Password</label>
            <input name="password" id="password" type="password"
                class="h-10 mb-5 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="password">
            <div class="flex items-start">
                <div class="flex items-start">
                    <div class="flex items-center">
                        <input id="remember" aria-describedby="remember" type="checkbox"
                            class="bg-gray-50 border border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                    </div>
                    <div class="text-sm ml-3">
                        <label for="remember" class="font-medium text-gray-900">Remember me</label>
                    </div>
                </div>
                <a href="#" class="text-sm text-blue-700 hover:underline ml-auto dark:text-blue-500">Lost
                    Password?</a>
            </div>
            <input type="submit" value="Login"
                class="mt-5 bg-green-500 hover:bg-blue-700 shadow-xl text-white uppercase text-sm font-semibold px-14 py-3 rounded"
                id="login">
        </form>
        <div class="text-center text-gray-500 mt-10">
            <p class="text-sm">Don't have an account? <a href="signup.php" class="text-blue-700 hover:underline">Sign
                    up</a></p>
        </div>
    </div>
</div>


<script src="./apps/jquery.js"></script>
<script>
$(document).ready(function() {
    $("#username").change(function() {
        $('#loginalert').css('display', 'none');
    });
    $("#password").change(function() {
        $('#loginalert').css('display', 'none');
    });
    $("#login").on("click", (e) => {
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        if (username == "" && password == "") {
            $('#loginalert').css('display', 'block');
            $("#loginalert").text("Username and Password can't be empty !!");
        } else {
            $.ajax({
                url: './auth/userlogin.php',
                type: 'post',
                data: {
                    'username': username,
                    'password': password,
                },
                success: function(res) {
                    if (res == 1) {
                        $("#form").trigger("reset");
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text(
                            "User Logged in sucessfull !!");
                        location.reload(true);
                    } else if (res == 2) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Please enter all fields !!!");
                    } else if (res == 0) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Username/password not matched !!");
                    } else {
                        console.log(res);
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Please Try Again !!");
                    }

                }
            });
        }
    })
});
</script>


<?php include "./footer.php"; ?>