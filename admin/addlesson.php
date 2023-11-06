<?php
    define("Title","Add Lesson");
    if(!isset($_SESSION))
    {
        session_start();
    }
    include("./header.php");
    include("../dbConnection.php");
    if(!isset($_SESSION['isAdminLogin']))
    {
        echo "<script>window.location.href = '../index.php';</script>";
    }
    if(isset($_POST['lessonSubmitBtn']))
    {
        if($_POST['course_id']!="" && $_POST['course_name']
            && ($_POST['lesson_name'])!="" && ($_POST['lesson_desc'])!="")
        {
            $course_id = $_POST['course_id'];
            $course_name = $_POST['course_name'];
            $lesson_name= $_POST['lesson_name'];
            $lesson_desc = $_POST['lesson_desc'];
            $lesson_link = $_FILES['lesson_link']['name'];
            $lesson_link_tmp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = "../video/lessonvideo/".$lesson_link;
            move_uploaded_file($lesson_link_tmp,$link_folder);

            $sql = "INSERT INTO lesson(lesson_name,lesson_desc,lesson_link,course_id,course_name)
                    VALUES('$lesson_name','$lesson_desc','$link_folder','$course_id','$course_name')";
            $result = $conn->query($sql);
            if($result==true)
            {
                $msg = "<div class='alert alert-success col-sm-9 mt-3 text-center'
                            style='margin: 0 auto;'>Course Added Successfully</div>";
            }
            else
            {
                $msg = "<div class='alert alert-danger col-sm-6 mt-3 text-center'
                            style='margin: 0 auto;'>Failed to Add</div>";
            }
        }
        else
        {
            $msg = "<div class='alert alert-warning col-sm-6 mt-3 text-center'
                        style='margin: 0 auto;'>All fields are required!</div>";
        }
    }
?>
<div class="col-sm-6 mt-5 mx-5 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" name="course_id" id="course_id"
                value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input class="form-control" name="course_name" id="course_name"
                value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" name="lesson_name" id="lesson_name">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" name="lesson_desc" id="lesson_desc"></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <input type="file" class="form-control-file" name="lesson_link" id="lesson_link">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="lessonSubmitBtn"
                name="lessonSubmitBtn">Submit</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
            if(isset($msg))
            {
                echo $msg;
            }
        ?>
    </form>
</div>
</div>
</div>
<?php
    include("./footer.php");
?>