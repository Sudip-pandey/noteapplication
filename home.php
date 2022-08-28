 <!-- Home section -->
 <section id="home" class="min-h-100 text-gray-600 body-font px-20 | body-main">
     <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
         <div
             class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
             <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Manage your Notes Securly
                 <br class="hidden lg:inline-block">Form here For Free
             </h1>
             </h1>
             <p class="mb-8 leading-relaxed">Hi this is notes management application and this will take your notes and
                 save into database. Than you can delete your notes from database or edit/update your notes.</p>
             <div class="flex-column justify-center ">

                 <?php if (
                   isset($_COOKIE["login"]) &&
                   isset($_SESSION["login"])
                 ) { ?>
                 <div class="mb-5">
                     <a href="<?php echo $url; ?>/create.php" type="button"
                         class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                         Start Creating Notes<svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd"
                                 d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </a>
                 </div>
                 <div>
                     <a href="<?php echo $url; ?>/note.php" type="button"
                         class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                         Explore Notes<svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                             <path fill-rule="evenodd"
                                 d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                 clip-rule="evenodd"></path>
                         </svg>
                     </a>
                 </div>
                 <?php } else { ?>
                 <a href="login.php" type="button"
                     class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                     Get Started <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd"
                             d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </a>

                 <?php } ?>


             </div>
         </div>
         <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
             <img class="object-cover object-center rounded" src="notes.png">
         </div>
     </div>
 </section>