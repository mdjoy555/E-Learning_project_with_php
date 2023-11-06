<?php
    define("Title","Courses");
    include("./dbConnection.php");
    include("./header.php");
?>
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/course.jpg" alt="courses"
            style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
    </div>
</div>
<div class="container mt-5">
        <h1 class="text-center">All Course</h1>
        <div class="row mt-4">
            <?php
                $sql = "SELECT * FROM course";
                $result = $conn->query($sql);
                $row = $result->num_rows;
                if($row!=0)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>
                        <div class="col-sm-4 mb-4">
                            <a href="./coursedetails.php?course_id=<?php echo $row['course_id'];?>" class="btn" style="text-align: left; margin: 0px; padding: 0px;">
                                <div class="card">
                                    <img src="<?php echo str_replace("..",".",$row['course_img']);?>"
                                        class="card-img-top img-thumbnail" alt="image"
                                        style="height: 200px;">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['course_name'];?></h5>
                                        <p class="card-text"><?php echo $row['course_desc'];?></p>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">
                                            Price: <small><del>&#36;<?php echo $row['course_original_price'];?></del></small>
                                            <span class="font-weight-bolder">&#36;<?php echo $row['course_price'];?></span>
                                        </p>
                                        <a href="./coursedetails.php?course_id=<?php echo $row['course_id'];?>"
                                        class="btn btn-primary text-white font-weight-bolder float-right">
                                        Enroll
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
<?php
    include("./footer.php");
?>