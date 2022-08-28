<?php include 'header.php';?>
<?php include 'navbar.php';?>
<?php include "./auth/secure.php"; ?>

<section id="notes" class="body-main">
    <div class="center notes">
        <?php
        $sql1 = "SELECT * FROM note WHERE type=1 ORDER BY id DESC";
        $stmt = $conn->prepare($sql1);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <div class="single-note">

            <h1 class="title"><?php echo htmlspecialchars($row["title"]); ?></h1>

            <div class="desc"><?php echo $row["notedesc"]; ?></div>
            <h1>Published at : <?php echo $row["date"]; ?></h1>

        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php include 'footer.php';?>