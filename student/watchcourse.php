<?php
    include("../dbConnection.php");
    if(!isset($_SESSOIN))
    {
        session_start();
    }
    if(!isset($_SESSION['isStuLogin']))
    {
        echo "<script>window.location.href = '../index.php';</script>";
    }
    $stuEmail = $_SESSION['stuEmail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" here="../css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/stustyle.css">
    <title>Watch Course</title>
</head>
<body>
    <div class="container-fluid bg-success p-2">
        <h3>Welcome to E-Learning</h3>
        <a href="mycourse.php" class="btn btn-primary">My Course</a>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-light">
                <h4 class="text-center mt-2">Lessons</h4>
                <ul class="nav flex-column" id="playlist">
                    <?php
                        if(isset($_GET['course_id']))
                        {
                            $id = $_GET['course_id'];
                            $sql = "SELECT * FROM lesson WHERE course_id = '".$id."'";
                            $result = $conn->query($sql);
                            $row = $result->num_rows;
                            if($row!=0)
                            {
                                while($row=$result->fetch_assoc())
                                {
                    ?>
                                    <li class="nav-item border-bottom py-2"
                                        movieurl="<?php echo $row['lesson_link'];?>"
                                        style="cursor: pointer;">
                                        <?php echo $row['lesson_name'];?>
                                    </li>
                    <?php
                                }                         
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video src="" class="mt-5 ml-2 w-75" id="videoarea" controls></video>
            </div>
        </div>
    </div>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script src="../js/ajaxrequest.js"></script>
    <script src="../js/custom.js"></script>
</body>
</html>