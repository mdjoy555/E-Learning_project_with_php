<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include_once("../dbConnection.php");

    if(!isset($_SESSION['isAdminLogin']))
    {
        if(isset($_POST['adminVerify']) && isset($_POST['adminEmail'])
        && isset($_POST['adminPass']))
        {
            $adminEmail = $_POST['adminEmail'];
            $adminPass = $_POST['adminPass'];

            $sql = "SELECT admin_email, admin_pass FROM admin
                    WHERE admin_email = '".$adminEmail."' AND admin_pass = '".$adminPass."'";
            $result = $conn->query($sql);
            $row = $result->num_rows;

            if($row!=0)
            {
                $_SESSION['isAdminLogin'] = true;
                $_SESSION['adminEmail'] = $adminEmail;
                echo json_encode("OK");
            }
            else
            {
                $sql1 = "SELECT admin_email FROM admin WHERE admin_email = '".$adminEmail."'";
                $sql2 = "SELECT admin_pass FROM admin WHERE admin_pass = '".$adminPass."'";
                $result1 = $conn->query($sql1);
                $result2 = $conn->query($sql2);
                $row1 = $result1->num_rows;
                $row2 = $result2->num_rows;
                
                if($row1==0)
                {
                    echo json_encode("email");
                }
                else if($row2==0)
                {
                    echo json_encode("password");
                }
            }
        }
    }
?>