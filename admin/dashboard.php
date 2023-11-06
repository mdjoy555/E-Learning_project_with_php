<?php
    define("Title","Dashboard");
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
    $sql = "SELECT * FROM course";
    $result = $conn->query($sql);
    $row  = $result->num_rows;
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);
    $row2 = $result->num_rows;
    $sql = "SELECT * FROM courseorder";
    $result = $conn->query($sql);
    $row3 = $result->num_rows;

    if(isset($_POST['delete']))
    {
        $id = $_POST['id'];
        $sql = "DELETE FROM courseorder WHERE co_id = '".$id."'";
        $result = $conn->query($sql);
        if($result==true)
        {
            $msg = "<div class='alert alert-success col-sm-6 text-center'>Delete Successfully</div>";
        }
        else
        {
            $msg = "<div class='alert alert-danger col-sm-6 text-center'>Failed to Delete</div>";
        }
    }
?>
            <div class="col-sm-9 mt-5">
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-4">
                        <div class="card text-white bg-danger mb-3"
                            style="max-width: 18rem;">
                            <div class="card-header">
                                Course
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row;?></h4>
                                <a href="courses.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <div class="card text-white bg-success mb-3"
                            style="max-width: 18rem;">
                            <div class="card-header">
                                Students
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row2;?></h4>
                                <a href="students.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <div class="card text-white bg-primary mb-3"
                            style="max-width: 18rem;">
                            <div class="card-header">
                                Sold
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $row3;?></h4>
                                <a href="sells.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <?php
                        if(isset($msg))
                        {
                            echo $msg;
                        }
                    ?>
                    <p class="bg-dark text-white p-2">Course Ordered</p>
                    <?php
                        $sql = "SELECT * FROM courseorder";
                        $result = $conn->query($sql);
                        $row = $result->num_rows;
                        if($row!=0)
                        {
                    ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Course ID</th>
                                        <th scope="col">Student Email</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                            while($row=$result->fetch_assoc())
                            {
                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['order_id'];?></th>
                                        <td><?php echo $row['course_id'];?></td>
                                        <td><?php echo $row['stu_email'];?></td>
                                        <td><?php echo $row['order_date'];?></td>
                                        <td><?php echo $row['amount'];?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id"
                                                    value="<?php echo $row['co_id'];?>">
                                                <button type="submit" class="btn btn-danger"
                                                    name="delete" value="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                    <?php
                            }
                        }
                    ?>
                    
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
    include("./footer.php");
?>