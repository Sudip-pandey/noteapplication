<?php include "header.php"; ?>
<?php include "./auth/secure.php"; ?>
<?php include "navbar.php"; ?>
<div class="create-note-container body-center  | body-main">
    <h1 class="title-heading">Create Note</h1>
    <form id="form" class="add-post-form row" method="post">
        <div class="alert alert-primary" style="display: none;" id="loginalert"></div>
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Give the title to your Note </label>
                <input id="title" type="text" class="form-control note-title" name="note-title" placeholder="Title"
                    requried />
            </div>

            <div class="form-group">
                <label for="">Tags</label>
                <select id="tag" class="form-control note-tag" name="tags">
                    <option value="programming" disabled selected>Select Tag</option>
                    <?php
                    $sql1 = "SELECT * FROM tags";
                    $stmt = $conn->prepare($sql1);
                    $stmt->execute();
                    while ($tags = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?php echo htmlspecialchars(
                      $tags["tid"]
                    ); ?>"><?php echo htmlspecialchars(
  $tags["tname"]
); ?></option>

                    <?php endwhile;
                    ?>

                </select>
                <p id="tagerr"></p>
                <input type="text" id="addtag" maxlength="32" class="form-control note-title my-4" name="note-title"
                    placeholder="Add Custom Tag | i.e Programming, Scifi, Subnote" requried />
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full w-24"
                    id="addtagbtn">Add</button>

            </div>
            <div class="form-group ckeditor">
                <label for="">Description</label>
                <textarea class="form-control form-description" id="editor" name="note" rows="8" cols="80"
                    requried></textarea>
            </div>
            <div class="show-error"></div>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select id="status" class="form-control note-status" name="status">
                <option selected value="1">Publish</option>
                <option value="0">Draft</option>
            </select>
        </div>
        <div class="form-group">
            <label>Type</label>
            <select id="type" class="form-control note-status" name="status">
                <option selected value="1">Public</option>
                <option value="0">Private</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" id="send" class="btn add-new" name="submit" value="Submit">
        </div>
</div>
</form>

</div>

<script src="./apps/jquery.js"></script>
<script src="./ckeditor/ckeditor.js"></script>

<script>
ClassicEditor.create(document.getElementById("editor")).catch(err => {
    console.log(err)
})
$(document).ready(function() {
    // $(document).on('change', '#addtag', function() {
    //     console.log("hello")
    // });

    $("#form").on("submit", (e) => {
        e.preventDefault()
        e.preventDefault();
        var title = $("#title").val();
        var notedesc = $("#editor").val();
        var tag = $("#tag").val();
        var status = $("#status").val();
        var type = $("#type").val();
        const date = new Date();

        if (title == "" && notedesc == "" && tag == "" && status == "" && type == "") {
            $('#loginalert').css('display', 'block');
            $("#loginalert").text("Please enter all information !");
        } else {
            $.ajax({
                url: './noteapi/add_note.php',
                type: 'post',
                data: {
                    'title': title,
                    'notedesc': notedesc,
                    'tag': tag,
                    'status': status,
                    'type': type,
                    'date': date,
                },
                success: function(res) {
                    if (res == 1) {
                        $("#form").trigger("reset");
                        $("#editor").val("");
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text(
                            "Note Created Sucessfully !!");
                        window.location.href = "<?php echo $url; ?>/notes.php";
                    } else if (res == 3) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Please enter all fields !!");
                    } else if (res == 0) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Please try Again !!");
                    } else if (res == 4) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Input field incorrect !!");
                    } else {
                        console.log(res);
                    }
                }
            });
        }

    })

    function addTag(e) {
        let tname = $("#addtag").val();
        $.ajax({
            url: './noteapi/add_tag.php',
            type: 'post',
            data: {
                'tname': tname
            },
            success: function(res) {
                if (res == 1) {
                    $("#addtag").val("");
                    $("#tagerr").text("Added sucessfully");
                } else if (res == 2) {
                    $("#tagerr").text("Tag is already in Use.");
                } else if (res == 0) {
                    $("#tagerr").text("Please try again !!");
                } else if (res == 3) {
                    $("#tagerr").text("Empty Field !!");
                } else {
                    console.log(res);

                }
            }
        });

    }

    $("#addtagbtn").on("click", (e) => {
        addTag();
    })

    $("#addtag").keypress(function() {
        var val = this.value;
        if (val !== "") {
            $("#tag").prop("disabled", true);
        }
    });
    setInterval(() => {
        $("#addtag").val() == "" && $("#tag").prop("disabled", false)
    }, 1000)

});
</script>
<?php include "footer.php"; ?>