<?php
    define("Title","Checkout");
    include("./dbConnection.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(!isset($_SESSION['isStuLogin']))
    {
        echo "<script> window.location.href = 'loginorsignup.php'; </script>";
    }
    if(isset($_POST['checkoutBtn']))
    {
        if(isset($_POST['order_id']) && isset($_POST['cust_id'])
            && isset($_POST['txn_amount']))
        {
            $order_id = $_POST['order_id'];
            $stu_email = $_POST['cust_id'];
            $amount = $_POST['txn_amount'];
            $course_id = $_SESSION['course_id'];
            $order_date = date("Y-m-d");
            $sql = "INSERT INTO courseorder(order_id,stu_email,course_id,amount,order_date)
                    VALUES('$order_id','$stu_email','$course_id','$amount','$order_date')";
            $result = $conn->query($sql);
            if($result==true)
            {
                echo "<script>window.location.href = 'student/mycourse.php';</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" here="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo Title;?></title>
    <title>Checkout</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumbotron">
                <h3 class="mb-5">Welcom to E-Learning Payment Page</h3>
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="order_id" class="col-sm-4 col-form-label">
                            Order ID
                        </label>
                        <div class="col-sm-8">
                            <input id="order_id" class="form-control" tabindex="1" size="20"
                                maxlength="20" name="order_id" autocomplete="off"
                                value="<?php echo "ORDS".rand(100000,1000000000);?>"
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cust_id" class="col-sm-4 col-form-label">
                            Student Email
                        </label>
                        <div class="col-sm-8">
                            <input id="cust_id" class="form-control" tabindex="2" size="12" maxlength="12"
                                name="cust_id" autocomplete="off"
                                value="<?php echo $_SESSION['stuEmail'];?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txn_amount" class="col-sm-4 col-form-label">
                            Amount
                        </label>
                        <div class="col-sm-8">
                            <input title="TXN_AMOUNT" class="form-control" tabindex="10"
                                input="text" name="txn_amount"
                                value="<?php if(isset($_POST['id'])){echo $_POST['id'];}?>"
                                readonly>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary"
                                name="checkoutBtn" value="Checkout">
                        <a href="courses.php">Cancel</a>
                    </div>
                </form>
                <small class="form-text text-muted">
                    Note: Complete payment by clicking checkout button
                </small>
            </div>
        </div>
    </div>
</body>
</html>