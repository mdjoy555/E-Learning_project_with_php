<?php
    define("Title","Edit Course");
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
        $sql = "SELECT * FROM course WHERE course_id = '".$id."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_POST['courseUpdateBtn']))
    {
        if(($_POST['course_id'])!="" && ($_POST['course_name'])!=""
            && ($_POST['course_desc'])!="" && ($_POST['course_author'])!=""
            && ($_POST['course_duration'])!="" && ($_POST['course_original_price'])!=""
            && ($_POST['course_price'])!="")
        {
            $course_id = $_POST['course_id'];
            $course_name = $_POST['course_name'];
            $course_desc = $_POST['course_desc'];
            $course_author = $_POST['course_author'];
            $course_duration = $_POST['course_duration'];
            $course_original_price = $_POST['course_original_price'];
            $course_price = $_POST['course_price'];
            $course_img = "../image/courseimg/".$_FILES['course_img']['name'];
            $course_img_tmp = $_FILES['course_img']['tmp_name'];
            move_uploaded_file($course_img_tmp,$course_img);
            
            $sql = "UPDATE course SET course_name = '".$course_name."',
                    course_desc = '".$course_desc."', course_author = '".$course_author."',
                    course_duration = '".$course_duration."', course_price = '".$course_price."',
                    course_original_price = '".$course_original_price."',
                    course_img = '".$course_img."' WHERE course_id = '".$course_id."'";
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
    <h3 class="text-center">Update Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" name="course_id" id="course_id"
                value="<?php if(isset($row['course_id'])){ echo $row['course_id'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" name="course_name" id="course_name"
                value="<?php if(isset($row['course_name'])){echo $row['course_name'];}?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea class="form-control" name="course_desc" id="course_desc">
                <?php if(isset($row['course_desc'])){echo $row['course_desc'];}?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Course Author</label>
            <input type="text" class="form-control" name="course_author" id="course_author"
                value="<?php if(isset($row['course_author'])){echo $row['course_author'];}?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" class="form-control" name="course_duration" id="course_duration"
                value="<?php if(isset($row['course_duration'])){echo $row['course_duration'];}?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" class="form-control" name="course_original_price"
                value="<?php if(isset($row['course_original_price'])){echo $row['course_original_price'];}?>"id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" class="form-control" name="course_price" id="course_price"
                value="<?php if(isset($row['course_price'])){echo $row['course_price'];}?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" class="form-control-file" name="course_img" id="course_img">
            <?php
                if(isset($row['course_img']))
                {
            ?>
                        <img src="<?php echo $row['course_img'];?>"
                            alt="image" class="img-thumbnail mt-2">
            <?php
                }
            ?>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="courseUpdateBtn"
                name="courseUpdateBtn">Update</button>
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