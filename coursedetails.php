<?php
    define("Title","Course Details");
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
    <?php
        if(isset($_GET['course_id']))
        {
            $id = $_GET['course_id'];
            $_SESSION['course_id'] = $id;
            $sql = "SELECT * FROM course WHERE course_id = '".$id."'";
            $result = $conn->query($sql);
            $row = $result->num_rows;
            if($row!=0)
            {
                $row = $result->fetch_assoc();
    ?>
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo str_replace("..",".",$row['course_img']);?>" alt="image" class="card-img-top">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Course Name: <?php echo $row['course_name'];?></h5>
                            <p class="card-text">Description: <?php echo $row['course_desc'];?></p>
                            <p class="card-text">Duration: <?php echo $row['course_duration'];?></p>
                            <p class="card-text d-inline">
                                Price: <small><del>&#36;<?php echo $row['course_original_price'];?></del></small>
                                <span class="font-weight-bolder">&#36;<?php echo $row['course_price'];?></span>
                            </p>
                            <form action="checkout.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['course_price'];?>">
                                <button type="submit" name="buy"
                                    class="btn btn-primary text-white font-weight-bolder float-right">
                                    Buy Now
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    ?>
</div>
<div class="container mt-3">
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM lesson WHERE course_id = '".$id."'";
                    $result = $conn->query($sql);
                    $row = $result->num_rows;
                    if($row!=0)
                    {
                        $count = 1;
                        while($row=$result->fetch_assoc())
                        {
                ?>
                            <tr>
                                <th scope="row"><?php echo $count++;?></th>
                                <td><?php echo $row['lesson_name'];?></td>
                            </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    include("./contact.php");
    include("./footer.php");
?>