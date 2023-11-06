<?php
    define("Title","E-Learning");
    include("./dbConnection.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
    include("./header.php");
?>
    <div class="container-fluid remove-vid-margin">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="video/bannervideo.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
            <h1 class="my-content">Welcome to ELearning</h1>
            <small class="my-content">Learn and Implement</small><br>
            <?php
                if(!isset($_SESSION['isStuLogin']))
                {
            ?>
                    <a href="#" class="btn btn-danger mt-3" data-toggle="modal"
                        data-target="#stuRegModalCenter">Get Started</a>
            <?php
                }
                else
                {
            ?>
                    <a href="student/studentprofile.php" class="btn btn-primary mt-3">My Profile</a>
            <?php
                }
            ?>
        </div>
    <div>
    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5>
                    <i class="fas fa-book-open mr-3">100+ online courses</i>
                </h5>
            </div>
            <div class="col-sm">
                <h5>
                    <i class="fas fa-users mr-3">Expert Instructors</i>
                </h5>
            </div>
            <div class="col-sm">
                <h5>
                    <i class="fas fa-keyboard mr-3">Lifetime Access</i>
                </h5>
            </div>
            <div class="col-sm">
                <h5>
                    <i class="fas fa-dollar-sign mr-3">Money Back Guarantee</i>
                </h5>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="text-center">Popular Course</h1>
        <div class="card-deck mt-4">
            <?php
                $sql = "SELECT * FROM course LIMIT 3";
                $result = $conn->query($sql);
                $row = $result->num_rows;
                if($row!=0)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>
                        <a href="./coursedetails.php?course_id=<?php echo $row['course_id'];?>" class="btn" style="text-align: left; margin: 0px; padding: 0px;">
                            <div class="card">
                                <img src="<?php echo str_replace("..",".",$row['course_img']);?>"
                                    class="card-img-top img-thumbnail" alt="image" style="height: 200px;">
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
            <?php
                    }
                }
            ?>
        </div>
        <div class="card-deck mt-4">
            <?php
                $sql = "SELECT * FROM course LIMIT 3,3";
                $result = $conn->query($sql);
                $row = $result->num_rows;
                if($row!=0)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>
                        <a href="./coursedetails.php?course_id=<?php echo $row['course_id'];?>" class="btn" style="text-align: left; margin: 0px; padding: 0px;">
                            <div class="card">
                                <img src="<?php echo str_replace("..",".",$row['course_img']);?>"
                                    class="card-img-top img-thumbnail" alt="image" style="height: 200px;">
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
            <?php    
                    }
                }
            ?>
        </div>
        <div class="text-center m-2">
            <a href="courses.php" class="btn btn-danger btn-sm">View All Course</a>
        <div>
    </div>
    <?php
        include("./contact.php");
    ?>
    <div class="container-fluid mt-5" style="background-color: #4B7289;" id="feedback">
        <h1 class="text-center testyheading p-4">Student's Feedback</h1>
        <div class="row">
        <?php
            $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM
                    student as s JOIN feedback as f ON s.stu_id = f.stu_id LIMIT 6";
            $result = $conn->query($sql);
            $row = $result->num_rows;
            if($row!=0)
            {
                while($row=$result->fetch_assoc())
                {
                    $row['stu_img'] = str_replace("..",".",$row['stu_img']);
        ?>
                    <div class="col-sm-4">
                        <div class="owl-carousel" id="testimonial-slider">
                            <div class="testimonial">
                                <p class="description"><?php echo $row['f_content'];?></p>
                                <div class="pic">
                                    <img src="<?php echo $row['stu_img'];?>" alt="image"
                                        class="img-thumbnail rounded-circle"
                                        style="height: 150px; width: 150px;">
                                </div>
                                <div class="testimonial-prof mt-2">
                                    <h4><?php echo $row['stu_name'];?></h4>
                                    <small><?php echo $row['stu_occ'];?></small>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        ?>
        </div>
    </div>
    <div class="container-fluid bg-danger">
        <div class="row text-center text-white p-1">
            <div class="col-sm">
                <a href="#" class="text-white social-hover">
                    <i class="fab fa-facebook-f"></i>
                    Facebook
                </a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover">
                    <i class="fab fa-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="col-sm">
                <a href="#" class="text-white social-hover">
                    <i class="fab fa-whatsapp"></i>
                    Whatsapp
                </a>
            </div>
            <div class="col-sm" class="text-white social-hover">
                <a href="#" class="text-white social-hover">
                    <i class="fab fa-instagram"></i>
                    Instagram
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid p-4" style="background-color: #E9ECEF;">
        <div class="container" style="background-color: #E9ECEF;">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto
                        tempore velit accusantium, placeat voluptatum aspernatur optio odio
                        eligendi maxime dignissimos!</p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a href="#" class="text-dark">Web Development</a>
                    <a href="#" class="text-dark">Web Design</a>
                    <a href="#" class="text-dark">Android Development</a>
                    <a href="#" class="text-dark">IOS Development</a>
                    <a href="#" class="text-dark">Data Analysis</a>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>
                        ELearning<br>
                        Chittagong<br>
                        Bangladesh<br>
                        Phone: 0123456789
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php
    include("./footer.php");
?>