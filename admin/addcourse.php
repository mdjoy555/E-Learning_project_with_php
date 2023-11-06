<?php
    define("Title","Add Course");
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
    if(isset($_POST['courseSubmitBtn']))
    {
        if(($_POST['course_name'])!="" && ($_POST['course_desc'])!=""
            && ($_POST['course_author'])!="" && ($_POST['course_duration'])!=""
            && ($_POST['course_original_price'])!="" && ($_POST['course_price'])!="")
        {
            $course_name= $_POST['course_name'];
            $course_desc = $_POST['course_desc'];
            $course_author = $_POST['course_author'];
            $course_duration = $_POST['course_duration'];
            $course_original_price = $_POST['course_original_price'];
            $course_price = $_POST['course_price'];
            $course_img = $_FILES['course_img']['name'];
            $course_img_tmp = $_FILES['course_img']['tmp_name'];
            $img_folder = "../image/courseimg/".$course_img;
            move_uploaded_file($course_img_tmp,$img_folder);

            $sql = "INSERT INTO course(course_name,course_desc,course_author,course_img,course_duration,course_price,course_original_price)
                    VALUES('$course_name','$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_original_price')";
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
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Course Author</label>
            <input type="text" class="form-control" name="course_author" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" name="course_duration" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" name="course_original_price" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" name="course_price" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" name="course_img" id="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="courseSubmitBtn"
                name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
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