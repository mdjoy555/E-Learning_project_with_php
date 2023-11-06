<?php
    define("Title","Feedback");
    include("./header.php");

    $stuEmail = $_SESSION['stuEmail'];
    $sql = "SELECT * FROM student WHERE stu_email = '".$stuEmail."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(isset($_POST['studentFeedbackBtn']))
    {
        if(($_POST['f_content'])!="")
        {
            $f_content = $_POST['f_content'];
            $stu_id = $row['stu_id'];
            $stu_email = $row['stu_email'];
            $sql = "INSERT INTO feedback(f_content,stu_id,stu_email)
                    VALUES('$f_content','$stu_id','$stu_email')";
            $result = $conn->query($sql);
            if($result==true)
            {
                $msg = "<div class='alert alert-success col-sm-9 mt-3 text-center'>
                            Send Successfully</div>";
            }
            else
            {
                $msg = "<div class='alert alert-danger col-sm-6 mt-3 text-center'>
                            Failed to Send</div>";
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
                value="<?php if(isset($row['stu_email'])){ echo $row['stu_email'];}?>"
                readonly>
        </div>
        <div class="form-group">
            <label for="f_content">Feedback</label>
            <textarea class="form-control" name="f_content" id="f_content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="studentFeedbackBtn"
            name="studentFeedbackBtn">Send</button>
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