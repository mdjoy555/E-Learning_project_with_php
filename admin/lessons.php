<?php
    define("Title","Lessons");
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

    if(isset($_POST['delete']))
    {
        $id = $_POST['id'];
        $sql = "DELETE FROM lesson WHERE lesson_id = '".$id."'";
        $result = $conn->query($sql);
        if($result==true)
        {
            $msg = "<div class='alert alert-success col-sm-6 mt-3 text-center'
                        style='margin-bottom: -30px;'>Deleted Successfully</div>";
        }
        else
        {
            $msg = "<div class='alert alert-danger col-sm-6 mt-3 text-center'>
                        Failed to Delete</div>";
        }
    }
?>
<div class="col-sm-9 mt-5 mx-4">
    <form action="" class="form-inline d-print-none mt-3">
        <div class="form-group mr-2">
            <label for="checkid">Enter Course ID: </label>
            <input type="text" class="form-control ml-2" name="checkid" id="checkid">
        </div>
        <button type="submit" class="btn btn-primary" name="searchBtn">Search</button>
    </form>
    <?php
        if(isset($msg))
        {
            echo $msg;
        }
        if(isset($_REQUEST['searchBtn']))
        {
            if(($_REQUEST['checkid'])!="")
            {
                $id = $_REQUEST['checkid'];
                $sql = "SELECT * FROM course WHERE course_id = '".$id."'";
                $result = $conn->query($sql);
                $row = $result->num_rows;
                if($row!=0)
                {
                    $row = $result->fetch_assoc();
                    $_SESSION['course_id'] = $row['course_id'];
                    $_SESSION['course_name'] = $row['course_name'];
                    ?>
                        <h6 class='mt-5 bg-dark text-white p-2'>
                            Course ID: <?php if($row['course_id']){echo $row['course_id'];}?>
                            <span class="ml-5">
                            Course Name: <?php if($row['course_name']){echo $row['course_name'];}?></h6>
                        <div>
                            <a href='addlesson.php' class='btn btn-danger box'>
                                <i class='fas fa-plus fa-2x'></i>
                            </a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope='col'>Lesson ID</th>
                                    <th scope='col'>Lesson Name</th>
                                    <th scope='col'>Lesson Link</th>
                                    <th scope='col'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                            $sql = "SELECT * FROM lesson WHERE course_id = '".$id."'";
                            $result = $conn->query($sql);     
                            while($row=$result->fetch_assoc())
                            {
                        ?>
                                <tr>
                                    <th scope='row'><?php echo $row['lesson_id'];?></th>
                                    <td><?php echo $row['lesson_name'];?></td>
                                    <td><?php echo $row['lesson_link'];?></td>
                                    <td>
                                        <form action="editlesson.php" method="POST" class="d-inline">
                                            <input type="hidden" name="id"
                                                value=<?php echo $row['lesson_id'];?>>
                                            <button type="submit" class="btn btn-info"
                                                name="view" value="View">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                        </form>
                                        <form action="" method="POST" class="d-inline">
                                            <input type="hidden" name="id"
                                                value="<?php echo $row['lesson_id'];?>">
                                            <button type="submit" class="btn btn-danger"
                                                name="delete" value="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                            </tobdy>
                        </table>
                    <?php
                }
                else
                {
                ?>
                    <div class='alert alert-info col-sm-6 mt-3 text-center'>
                        No records found!
                    </div>
                <?php
                }
            }
            else
            {
            ?>
                <div class='alert alert-warning col-sm-6 mt-3 text-center'>
                    Field is required!
                </div>
    <?php
            }
        }
    ?>
</div>
<?php
    include("./footer.php");
?>