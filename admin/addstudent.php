<?php
    define("Title","Add Student");
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
    if(isset($_POST['studentSubmitBtn']))
    {
        if(($_POST['stu_name'])!="" && ($_POST['stu_email'])!=""
            && ($_POST['stu_pass'])!="" && ($_POST['stu_occ'])!="")
        {
            $stu_name= $_POST['stu_name'];
            $stu_email = $_POST['stu_email'];
            $stu_pass = $_POST['stu_pass'];
            $stu_occ = $_POST['stu_occ'];
            
            $sql = "INSERT INTO student(stu_name,stu_email,stu_pass,stu_occ,stu_img)
                    VALUES('$stu_name','$stu_email','$stu_pass','$stu_occ','')";
            $result = $conn->query($sql);
            if($result==true)
            {
                $msg = "<div class='alert alert-success col-sm-9 mt-3 text-center'
                            style='margin: 0 auto;'>Student Added Successfully</div>";
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
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" name="stu_email" id="stu_email">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" class="form-control" name="stu_pass" id="stu_pass">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="studentSubmitBtn"
                name="studentSubmitBtn">Submit</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
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