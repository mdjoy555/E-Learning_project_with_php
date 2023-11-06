<?php
    define("Title","Change Password");
    include("./header.php");
    $stu_email = $_SESSION['stuEmail'];
    if(isset($_POST['stuUpdateBtn']))
    {
        if(($_POST['stu_pass'])!="")
        {
            $sql = "SELECT * FROM student WHERE stu_email = '".$stu_email."'";
            $result = $conn->query($sql);
            $row = $result->num_rows;
            if($row!=0)
            {
                $stu_pass = $_POST['stu_pass'];
                $sql = "UPDATE student SET stu_pass = '".$stu_pass."'
                        WHERE stu_email = '".$stu_email."'";
                $result = $conn->query($sql);
                if($result==true)
                {
                    $msg = "<div class='alert alert-success col-sm-12 mt-3 text-center'>
                                Updated Successfully</div>";
                }   
                else
                {
                    $msg = "<div class='alert alert-danger col-sm-12 mt-3 text-center'>
                                Failed to Update</div>";
                }
            }
        }
        else
        {
            $msg = "<div class='alert alert-warning col-sm-12 mt-3 text-center'>
                        All fields are required!</div>";
        }
    }
?>
<div class="col-sm-9 mt-5">
    <div class="row">
        <div class="col-sm-6">
            <form method="POST" class="mt-5 mx-5">
                <div class="form-group">
                    <label for="stu_email">Email</label>
                    <input type="email" class="form-control" name="stu_email"
                        id="stu_email" value="<?php echo $stu_email;?>" readonly>
                </div>
                <div class="form-group">
                    <label for="stu_pass">Password</label>
                    <input type="text" class="form-control" name="stu_pass"
                        id="stu_pass" placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-success"
                    name="stuUpdateBtn">Update</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
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
</div>
</div>
<?php
    include("./footer.php");
?>