<?php
    define("Title","Profile");
    include("./header.php");
    
    $stuEmail = $_SESSION['stuEmail'];
    $sql = "SELECT * FROM student WHERE stu_email = '".$stuEmail."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(isset($_POST['studentUpdateBtn']))
    {
        if(($_POST['stu_id'])!="" && ($_POST['stu_name'])!=""
            && ($_POST['stu_email'])!="" && ($_POST['stu_occ'])!="")
        {
            $stu_email = $_POST['stu_email'];
            $stu_name = $_POST['stu_name'];
            $stu_occ = $_POST['stu_occ'];
            $stu_img = $_FILES['stu_img']['name'];
            $stu_img_tmp = $_FILES['stu_img']['tmp_name'];
            $img_folder = "../image/studentimg/".$stu_img;
            move_uploaded_file($stu_img_tmp,$img_folder);
            
            $sql = "UPDATE student SET stu_name = '".$stu_name."',
                    stu_occ= '".$stu_occ."', stu_img = '".$img_folder."'
                    WHERE stu_email = '".$stu_email."'";
            $result = $conn->query($sql);
            if($result==true)
            {
                $msg = "<div class='alert alert-success col-sm-9 mt-3 text-center'>
                            Updated Successfully</div>";
            }
            else
            {
                $msg = "<div class='alert alert-danger col-sm-6 mt-3 text-center'>
                            Failed to Update</div>";
            }
        }
        else
        {
            $msg = "<div class='alert alert-warning col-sm-9 mt-3 text-center'>
                        All fields are required!</div>";
        }
    }
?>
<div class="col-sm-6 mt-5">
    <form action="" class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_id">Student ID</label>
            <input type="text" class="form-control" name="stu_id" id="stu_id"
                value="<?php if(isset($row['stu_id'])){ echo $row['stu_id'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" name="stu_email" id="stu_email"
                value="<?php if(isset($row['stu_email'])){echo $row['stu_email'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" name="stu_name" id="stu_name"
                value="<?php if(isset($row['stu_name'])){echo $row['stu_name'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" name="stu_occ" id="stu_occ"
                value="<?php if(isset($row['stu_occ'])){echo $row['stu_occ'];}?>">
        </div>
        <div class="form-group">
            <label for="stu_img">Upload Image</label>
            <input type="file" class="form-control-file" name="stu_img" id="stu_img">
        </div>
        <button type="submit" class="btn btn-primary" id="studentUpdateBtn"
            name="studentUpdateBtn">Update</button>
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