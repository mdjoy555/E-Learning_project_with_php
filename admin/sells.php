<?php
    define("Title","Sell Report");
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
?>
<div class="col-sm-9 mt-5 mx-4">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control" name="startdate" id="startdate">
            </div>
            <div class="form-group col-md-2">
                <input type="date" class="form-control" name="enddate" id="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="searchSubmit"
                    value="Search">
            </div>
        </div>
    </form>
    <?php
        if(isset($_POST['searchSubmit']))
        {
            if(($_POST['startdate'])!="" && ($_POST['enddate'])!="")
            {
                $start_date = $_POST['startdate'];
                $end_date = $_POST['enddate'];
                $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN
                        '".$start_date."' AND '".$end_date."'";
                $result = $conn->query($sql);
                $row = $result->num_rows;
                if($row!=0)
                {
    ?>
                    <p class="bg-dark text-white text-center mt-5 p-2">Details</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <td scope="col">Order ID</td>
                                <td scope="col">Course ID</td>
                                <td scope="col">Student Email</td>
                                <td scope="col">Amount</td>
                                <td scope="col">Order Date</td>
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
                                        <td><?php echo $row['amount'];?></td>
                                        <td><?php echo $row['order_date'];?></td>
                                    </tr>
                            <?php
                                }
                            ?>
                            <tr>
                                <td>
                                    <form action="" class="d-print-none">
                                        <input type="submit" class="btn btn-primary"
                                            value="Print" onclick="window.print()">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        <?php
                }
                else
                {
        ?>
                    <div class="alert alert-info col-sm-6 text-center">
                        No records found!
                    </div>
    <?php
                }
            }
        }
    ?>
</div>
</div>
</div>
<?php
    include("./footer.php");
?>