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
    <link rel="stylesheet" href="../css/adminstyle.css">
    <title><?php echo Title;?></title>
</head>
<body>
    <nav class="navbar navbar-dark fixed-top p-0 shadow"
        style="background-color: #225470;">
        <a href="dashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">ELearning
            <small class="text-white">Admin Panel</small>
        </a>
    </nav>
    <div class="container-fluid mb-5" style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="dashboard.php"
                                class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php"
                                class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lessons.php"
                                class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Lessons
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="students.php"
                                class="nav-link">
                                <i class="fas fa-user"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sells.php"
                                class="nav-link">
                                <i class="fas fa-table"></i>
                                Sell Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="payment.php"
                                class="nav-link">
                                <i class="fas fa-table"></i>
                                Payment Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="feedback.php"
                                class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php"
                                class="nav-link">
                                <i class="fas fa-address-book"></i>
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="changepassword.php"
                                class="nav-link">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>