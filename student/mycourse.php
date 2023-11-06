<?php
    define("Title","My Course");
    include("../dbConnection.php");
    include("./header.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(!isset($_SESSION['isStuLogin']))
    {
        echo "<script>window.location.href = '..index.php';</script>";
    }
?>
<div class="container col-sm-9 mt-5 ml-5">
    <div class="row">
        <div class="jumbotron">
            <h4 class="text-center">All Course</h4>
            <?php
                $stuEmail = $_SESSION['stuEmail'];
                if(isset($stuEmail))
                {
                    $sql = "SELECT co.order_id,c.course_id,c.course_name,c.course_desc,
                            c.course_author,c.course_img,c.course_duration,
                            c.course_original_price,c.course_price FROM courseorder AS co
                            JOIN course as c ON co.course_id = c.course_id WHERE
                            co.stu_email = '".$stuEmail."'";
                    $result = $conn->query($sql);
                    $row = $result->num_rows;
                    if($row!=0)
                    {
                        while($row=$result->fetch_assoc())
                        {
            ?>
                            <div class="bg-light mb-3">
                                <h5 class="card-header"><?php echo $row['course_name'];?></h5>
                                <div class="row">
                                    <div class="col-sm-3 ml-2">
                                        <img src="<?php echo $row['course_img'];?>"
                                            class="card-img-top img-thumbnail mt-4"
                                            alt="image">
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <div class="card-body">
                                            <p class="card-title">
                                                <?php echo $row['course_desc'];?>
                                            </p>
                                            <small class="card-text">
                                                Duration: <?php echo $row['course_duration'];?>
                                            </small><br>
                                            <small class="card-text">
                                                Instructor: <?php echo $row['course_author'];?>
                                            </small><br>
                                            <p class="card-text d-inline">
                                                Price: <small><del>
                                                &#36;<?php echo $row['course_original_price'];?>
                                                </del></small>
                                                <span class="font-weight-bolder">
                                                &#36;<?php echo $row['course_price'];?>
                                                </span>
                                            </p>
                                            <a href="./watchcourse.php?course_id=<?php echo $row['course_id'];?>"
                                                class="btn btn-primary mt-5 float-right">
                                                Watch Course
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    }
                }
            ?>
        </div>
    </div>
</div>
</div>
</div>
<?php
    include("./footer.php");
?>