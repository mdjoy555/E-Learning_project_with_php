<?php
    define("Title","Courses");
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
        $sql1 = "DELETE FROM course WHERE course_id = '".$id."'";
        $r = $conn->query($sql1);
        if($r===true)
        {
            $msg = "<div class='alert alert-success col-sm-6 mb-3 text-center'>
                        Deleted Successfully</div>";   
        }
        else
        {
            $msg = "<div class='alert alert-danger col-sm-6 mb-3 text-center'>
                        Failed to Delete</div>";
        }
    }
?>
<div class="col-sm-9 mt-5">
    <?php
        if(isset($msg))
        {
            echo $msg;
        }
    ?>
    <p class="bg-dark text-white text-center p-2">List of Courses</p>
    <?php
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows!=0)
        {
    ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Course ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row=$result->fetch_assoc())
                        {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $row['course_id']; ?></th>
                                <td><?php echo $row['course_name']; ?></td>
                                <td><?php echo $row['course_author']; ?></td>
                                <td>
                                    <form action="editcourse.php" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?php echo $row['course_id'];?>">
                                        <button type="submit" class="btn btn-info mr-3" name="view"
                                            value="View">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </form>
                                    <form action="" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?php echo $row['course_id'];?>">
                                        <button type="submit" class="btn btn-danger" name="delete"
                                            value="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
    <?php
        }
    ?>
</div>
</div>
<div>
    <a href="addcourse.php" class="btn btn-danger box">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div>
<?php
    include("./footer.php");
?>