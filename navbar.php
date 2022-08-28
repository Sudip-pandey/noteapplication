<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div>
                    <a href="index.php" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-gray-500 text-lg">Notes App</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="index.php"
                        class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold ">Home</a>

                </div>
            </div>

            <div class="hidden md:flex items-center space-x-3 ">
                <?php if (
                  isset($_COOKIE["login"]) ||
                  isset($_SESSION["login"])
                ) { ?>
                <span> Hi, <?php
                isset($_SESSION["name"])
                  ? ($name = $_SESSION["name"])
                  : ($name = "Broo");
                echo $name;
                ?> </span>
                <a class="py-2 px-2 font-medium text-white bg-blue-500 rounded hover:bg-green-400 transition duration-300"
                    href="<?php echo $url; ?>/notes.php">My Notes </a>
                <a class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300"
                    href="<?php echo $url; ?>/auth/logout.php"> Logout </a>
                <?php } else { ?>
                <a href="./login.php"
                    class="py-2 px-2 font-medium text-gray-500 rounded hover:bg-green-500 hover:text-white transition duration-300">Log
                    In</a>
                <a href="./signup.php"
                    class="py-2 px-2 font-medium text-white bg-green-500 rounded hover:bg-green-400 transition duration-300">Sign
                    Up</a>

                <?php } ?>


            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class=" w-6 h-6 text-gray-500 hover:text-green-500 " x-show="!showMenu" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li class="active"><a href="index.php"
                    class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
        </ul>
        <ul class="">
            <li class=""><a href="login.php" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Log
                    In</a></li>
            <li class=""><a href="signup.php" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Sign
                    Up</a></li>
        </ul>
    </div>
    <script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
    </script>
</nav>