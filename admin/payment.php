<?php
    define("Title","Payment Status");
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
    <form method="post" action="" class="form-inline d-print-none mt-3">
        <div class="form-group mr-2">
            <label for="order_id">Order ID:</label>
            <input type="text" class="form-control ml-2" name="order_id" id="order_id">
        </div>
        <input type="submit" class="btn btn-primary" name="submitBtn"
                value="View">
    </form>
    <?php
        if(isset($_POST['submitBtn']))
        {
            if($_POST['order_id']!="")
            {
                $order_id = $_POST['order_id'];
                $sql = "SELECT * FROM courseorder WHERE order_id = '".$order_id."'";
                $result = $conn->query($sql);
                $row = $result->num_rows;
                if($row!=0)
                {
                    $row = $result->fetch_assoc();
    ?>
                    <div class="row justify-content-start mt-4">
                        <div class="col-auto">
                            <h2 class="text-center">Payment Receipt</h2>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th><label>Course Order ID</label>
                                        <td><?php echo $row['co_id'];?></td>
                                    </tr>
                                    <tr>
                                        <th><label>Order ID</label></th>
                                        <td><?php echo $row['order_id'];?></td>
                                    </tr>
                                    <tr>
                                        <th><label>Course ID</label></th>
                                        <td><?php echo $row['course_id'];?></td>
                                    </tr>
                                    <tr>
                                        <th><label>Email</label></th>
                                        <td><?php echo $row['stu_email'];?></td>
                                    </tr>
                                    <tr>
                                        <th><label>Amount</label></th>
                                        <td><?php echo $row['amount'];?></td>
                                    </tr>
                                    <tr>
                                        <th><label>Order Date</label></th>
                                        <td><?php echo $row['order_date'];?></td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <button class="btn btn-primary"
                                                onclick="window.print()">
                                                Print
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
    
    <?php
                }
                else
                {
    ?>
                    <div class="alert alert-info col-sm-6 mt-3 text-center">
                        No records found!
                    </div>
    <?php
                }
    ?>
    <?php
            }
            else
            {
    ?>
                <div class="alert alert-warning col-sm-6 mt-3 text-center">
                    Filed is required!
                </div>
    <?php
            }
        }
    ?>
</div>
</div>
</div>
<?php
    include("./footer.php");
?>