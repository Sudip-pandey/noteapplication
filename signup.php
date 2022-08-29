<?php include "./header.php"; ?>
<?php include "./navbar.php"; ?>


<!-- signup body -->
<div class="bg-slate-200 py-6 flex flex-col justify-center relative overflow-hidden sm:py-12  | body-main">
    <span
        class="border text-4xl text-yellow-800 px-6 pt-10 pb-8 bg-white w-1/2 max-w-md mx-auto rounded-t-md sm:px-10">Signup
    </span>
    <div class="border relative px-4 pt-7 pb-8 bg-white shadow-xl w-1/2 max-w-md mx-auto sm:px-10 rounded-b-md">
        <form id="form" method="post" autocomplete="none">
            <div class="alert alert-primary" style="display: none;" id="loginalert"></div>
            <label for="" class="block">Full Name</label>
            <input name="name" id="input_name" type="text"
                class="h-10 mb-5 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="Full Name">
            <label for="" class="block">Username</label>
            <input name="name" id="input_username" type="text"
                class="h-10 mb-5 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="username">
            <label for="" class="block">Email</label>
            <input id="input_email" name="email" type="Email"
                class="w-full h-10 mb-5 appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="Email">
            <label for="" class="block">Password</label>
            <input id="input_password" name="password" type="password"
                class="w-full h-10 mb-5 appearance-none block  bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="password">
            <label for="" class="block">Confirm Password</label>
            <input id="input_cpassword" name="cpassword" type="password"
                class="h-10 mb-5 appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                placeholder="Confirm Password">
            <input id="signup" type="submit"
                class="mt-5 bg-green-500 hover:bg-blue-700 shadow-xl text-white uppercase text-sm font-semibold px-14 py-3 rounded"
                value="Submit" name="signup">
        </form>
        <div class="text-center text-gray-500 mt-10">
            <p class="text-sm">Already have an account? <a href="login.php"
                    class="text-blue-700 hover:underline">Login</a></p>
        </div>
    </div>
</div>


<script src="./apps/jquery.js"></script>
<script>
$("#signup").on("click", (e) => {
    e.preventDefault();
    var name = $('#input_name').val();
    var email = $('#input_email').val();
    var username = $('#input_username').val();
    var password = $('#input_password').val();
    var cpassword = $('#input_cpassword').val();
    var date = new Date();
    if (name == "" && email == "" && username == "" && password == "" && cpassword == "") {
        $('#loginalert').css('display', 'block');
        $("#loginalert").text("Please enter all information !");
    } else {
        if (password == cpassword) {
            $.ajax({
                url: './auth/usersignup.php',
                type: 'post',
                data: {
                    'name': name,
                    'email': email,
                    'username': username,
                    'password': password,
                    'datecreated': date
                },
                success: function(res) {
                    console.log(res);
                    if (res == 1) {
                        $("#form").trigger("reset");
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Sucessfully created your account, Please Login !!");
                        window.location.href = "<?php echo $url; ?>/login.php"
                    } else if (res == 2) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Username already exists !!!");
                    } else if (res == 0) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Please try again !!");
                    } else {
                        console.log(res);
                    }
                }
            });
        } else {
            $('#loginalert').css('display', 'block');
            $("#loginalert").text("Password should must match !");
        }
    }
})
</script>

<?php include "./footer.php"; ?>