<?php
    include_once("../dbConnection.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    if(!isset($_SESSION['isStuLogin']))
    {
        echo "<script> window.location.href = '../index.php'; </script>";
    }
    $stuEmail = $_SESSION['stuEmail'];
    $sql = "SELECT stu_img FROM student WHERE stu_email = '".$stuEmail."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
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
    <title><?php echo Title;?></title>
</head>
<body>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow"
            style="background-color: #225470;">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="studentprofile.php">
                ELearning</a>
    </nav>
    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img; ?>" alt="image"
                                class="img-thumbnail">
                        </li>
                        <li class="nav-item">
                            <a href="studentprofile.php"
                                class="nav-link">
                                <i class="fas fa-user"></i>
                                Profile <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mycourse.php"
                                class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                My Course
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stufeedback.php"
                                class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stuchangepassword.php"
                                class="nav-link">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-signout-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>