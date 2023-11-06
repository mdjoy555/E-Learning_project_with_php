<?php
    define("Title","Edit Student");
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
        $sql = "SELECT * FROM student WHERE stu_id = '".$id."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    if(isset($_POST['studentUpdateBtn']))
    {
        if(($_POST['stu_id'])!="" && ($_POST['stu_name'])!=""
            && ($_POST['stu_email'])!="" && ($_POST['stu_pass'])!=""
            && ($_POST['stu_occ'])!="")
        {
            $stu_id = $_POST['stu_id'];
            $stu_name = $_POST['stu_name'];
            $stu_email = $_POST['stu_email'];
            $stu_pass = $_POST['stu_pass'];
            $stu_occ = $_POST['stu_occ'];
            
            $sql = "UPDATE student SET stu_name = '".$stu_name."',
                    stu_email = '".$stu_email."', stu_pass = '".$stu_pass."',
                    stu_occ= '".$stu_occ."' WHERE stu_id = '".$stu_id."'";
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
    <h3 class="text-center">Update Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" name="stu_id" id="stu_id"
                value="<?php if(isset($row['stu_id'])){ echo $row['stu_id'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name"
                value="<?php if(isset($row['stu_name'])){echo $row['stu_name'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" name="stu_email" id="stu_email"
                value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" class="form-control" name="stu_pass" id="stu_pass"
                value="<?php if(isset($row['stu_pass'])){echo $row['stu_pass'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ"
                value="<?php if(isset($row['stu_occ'])){echo $row['stu_occ'];}?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" id="studentUpdateBtn"
                name="studentUpdateBtn">Update</button>
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