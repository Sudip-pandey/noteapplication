<?php include 'header.php';?>
<?php include 'navbar.php';?>
<?php include "./auth/secure.php"; ?>

<section id="notes" class="body-main">
    <div class="center notes">
        <?php
        $author = $_SESSION['uid'];
        $sql1 = "SELECT * FROM note WHERE author=$author ORDER BY id DESC";
        $stmt = $conn->prepare($sql1);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
        <div class="single-note">
            <h1 class="title"><?php echo htmlspecialchars($row["title"]); ?></h1>
            <!-- <div><?php echo $row["tag"]; ?></div> -->

            <div class="desc"><?php echo $row["notedesc"]; ?></div>



            <?php
                if($row["status"]){
                    echo "<div>Current: Published</div>";
                }else {
                    echo "<div>Current: Draft <button>Publish</button></div>";
                }

            ?>


            <?php
                if($row["type"]){
                    echo "Current: Public <a href='{$url}/noteapi/private.php' class='button is-rounded'>Change to private</a>";
                }else {
                    echo "Current: Draft <a class='button is-rounded'>Change to public</a>";
                }

            ?>


            <h1><?php echo $row["date"]; ?></h1>

            <div class="config mt-10">
                <a class="py-2 px-2 font-medium text-white bg-red-500 rounded hover:bg-red-800 transition duration-300"
                    href="<?php echo $url; ?>/noteapi/delete_note.php?nid=<?php echo $row["id"]; ?>">Delete </a>
            </div>
        </div>
        <?php }{
            ?>
        <h3>No notes found</h3>
        <?php
        }; ?>
    </div>
</section>

<?php include 'footer.php';?>