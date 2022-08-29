<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<?php include "./auth/secure.php"; ?>

<section id="notes" class="body-main">
    <div class="center notes">
        <?php
        $author = $_SESSION['uid'];
        $sql1 = "SELECT * FROM note WHERE author=$author ORDER BY id DESC";
        $stmt = $conn->prepare($sql1);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="single-note">
            <?php
                if ($row["status"]) {
                    echo "Published";
                } else {
                    echo "Draft";
                }
                ?>

            <h1 class="title"><?php echo htmlspecialchars($row["title"]); ?></h1>
            <!-- <div><?php echo $row["tag"]; ?></div> -->

            <div class="desc"><?php echo $row["notedesc"]; ?></div>



            <h4><?php echo $row["date"]; ?></h4>

            <div class="config mt-10">
                <?php
                    if ($row["status"]) {
                        echo "<a  class='mx-5 py-2 px-5 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-800 transition duration-300'  href=" . $url . "/noteapi/changetodraft.php?nid=" . $row["id"] . ">Change to Draft </a>";
                    } else {
                        echo "<a class='mx-5 py-2 px-10 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-800 transition duration-300'  href=" . $url . "/noteapi/changetopublish.php?nid=" . $row["id"] . ">Change to Published</a>";
                    }
                    ?>
                <?php
                    if ($row["type"]) {
                        echo "<a  class='mx-5 py-2 px-10 font-medium text-white bg-blue-500 rounded hover:bg-blue-800 transition duration-300' href=" . $url . "/noteapi/changetoprivate.php?nid=" . $row["id"] . ">Change to private </a>";
                    } else {
                        echo "<a class='mx-5 py-2 px-10 font-medium text-white bg-blue-500 rounded hover:bg-blue-800 transition duration-300'  href=" . $url . "/noteapi/changetopublic.php?nid=" . $row["id"] . ">Change to Public </a>";
                    }
                    ?>
                <a class="py-2 px-10 font-medium text-white bg-red-500 rounded hover:bg-red-800 transition duration-300"
                    href="<?php echo $url; ?>/noteapi/delete_note.php?nid=<?php echo $row["id"]; ?>">Delete </a>
            </div>
        </div>
        <?php }
        ?>

    </div>
</section>

<?php include 'footer.php'; ?>