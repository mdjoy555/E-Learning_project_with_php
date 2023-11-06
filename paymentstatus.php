<?php
    define("Title","Payment Status");
    include("./dbConnection.php");
    include("./header.php");
?>
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./image/course.jpg" alt="courses"
            style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
    </div>
</div>
<div class="container">
    <h2 class="text-center my-4">Payment Status</h2>
    <form method="post" action="">
        <div class="form-group row">
            <label class="offset-sm-3 col-form-label">Order ID:</label>
            <div>
                <input type="text" class="form-control mx-3" name="order_id" id="order_id">
            </div>
            <div>
                <input type="submit" class="btn btn-primary mx-4" name="submitBtn"
                    value="View">
            </div>
        </div>
    </form>
</div>
<div class="container">
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
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h2 class="text-center">Payment Receipt</h2>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th><label>Order ID</label></th>
                                        <td><?php echo $row['order_id'];?></td>
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
                    <div class="alert alert-info col-sm-6 text-center"
                        style="margin-left: 200px;">No records found!
                    </div>
    <?php
                }
    ?>
    <?php
            }
            else
            {
    ?>
                <div class="alert alert-warning col-sm-6 text-center"
                    style="margin-left: 200px;">Filed is required!
                </div>
    <?php
            }
        }
    ?>
</div>
<?php
    include("./contact.php");
    include("./footer.php");
?>