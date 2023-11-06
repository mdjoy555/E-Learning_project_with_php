<?php
    define("Title","Edit Lesson");
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
    if(isset($_POST['view']))
    {
        $id = $_POST['id'];
        $sql = "SELECT * FROM lesson WHERE lesson_id = '".$id."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_POST['lessonUpdateBtn']))
    {
        if(($_POST['course_id'])!="" && ($_POST['course_name'])!=""
            && ($_POST['lesson_id'])!="" && ($_POST['lesson_name'])!=""
            && ($_POST['lesson_desc'])!="")
        {
            $lesson_id = $_POST['lesson_id'];
            $lesson_name = $_POST['lesson_name'];
            $lesson_desc = $_POST['lesson_desc'];
            $lesson_link = "../video/lessonvideo/".$_FILES['lesson_link']['name'];
            $lesson_link_tmp = $_FILES['lesson_link']['tmp_name'];
            move_uploaded_file($lesson_link_tmp,$lesson_link);
            
            $sql = "UPDATE lesson SET lesson_name = '".$lesson_name."',
                    lesson_desc = '".$lesson_desc."', lesson_link = '".$lesson_link."'
                    WHERE lesson_id = '".$lesson_id."'";
            $result = $conn->query($sql);
            if($result==true)
            {
                $msg = "<div class='alert alert-success col-sm-6 mt-3 text-center'
                            style='margin: 0 auto;'>Updated Successfully</div>";
            }
            else
            {
                $msg = "<div class='alert alert-danger col-sm-6 mt-3 text-center'
                            style='margin: 0 auto;'>Failed to Update</div>";
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
    <h3 class="text-center">Update Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" class="form-control" name="lesson_id" id="lesson_id"
                value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="course_id">Course Id</label>
            <input type="text" class="form-control" name="course_id" id="course_id"
                value="<?php if(isset($row['course_id'])){ echo $row['course_id'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name"
                value="<?php if(isset($row['course_name'])){ echo $row['course_name'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" name="lesson_name" id="lesson_name"
                value="<?php if(isset($row['lesson_name'])){echo $row['lesson_name'];}?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" name="lesson_desc" id="lesson_desc">
                <?php if(isset($row['lesson_desc'])){echo $row['lesson_desc'];}?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
            <input type="file" class="form-control-file" name="lesson_link" id="lesson_link">
            <div class="embed-responsive embed-responsive-16by9 mt-2">
                <iframe class="embed-responsive-item"
                    src="<?php if(isset($row['lesson_link'])){ echo $row['lesson_link'];}?>"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="lessonUpdateBtn"
                name="lessonUpdateBtn">Update</button>
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