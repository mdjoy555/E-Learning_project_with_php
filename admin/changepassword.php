<?php
    define("Title","Change Password");
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
    $admin_email = $_SESSION['adminEmail'];
    if(isset($_POST['adminUpdateBtn']))
    {
        if(($_POST['admin_pass'])!="")
        {
            $sql = "SELECT * FROM admin WHERE admin_email = '".$admin_email."'";
            $result = $conn->query($sql);
            $row = $result->num_rows;
            if($row!=0)
            {
                $admin_pass = $_POST['admin_pass'];
                $sql = "UPDATE admin SET admin_pass = '".$admin_pass."'
                        WHERE admin_email = '".$admin_email."'";
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
                    <label for="admin_email">Email</label>
                    <input type="email" class="form-control" name="admin_email"
                        id="admin_email" value="<?php echo $admin_email;?>" readonly>
                </div>
                <div class="form-group">
                    <label for="admin_pass">Password</label>
                    <input type="text" class="form-control" name="admin_pass"
                        id="admin_pass" placeholder="New Password">
                </div>
                <button type="submit" class="btn btn-success"
                    name="adminUpdateBtn">Update</button>
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