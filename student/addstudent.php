<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include_once("../dbConnection.php");

    if(isset($_POST['emailVerify']) && isset($_POST['stuEmail']))
    {
        $stuEmail = $_POST['stuEmail'];
        
        $sql = "SELECT stu_email FROM student WHERE stu_email = '".$stuEmail."'";
        $result = $conn->query($sql);
        $row = $result->num_rows;

        echo json_encode($row);
    }

    if(isset($_POST['verify']) && isset($_POST['stuName']) && isset($_POST['stuEmail'])
        && isset($_POST['stuPass']))
    {
        $stuName = $_POST['stuName'];
        $stuEmail = $_POST['stuEmail'];
        $stuPass = $_POST['stuPass'];
        
        $sql = "INSERT INTO student(stu_name,stu_email,stu_pass,stu_occ,stu_img)
                VALUES('$stuName','$stuEmail','$stuPass','','')";
        if($conn->query($sql)==true)
        {
            echo json_encode("OK");
        }
        else
        {
            echo json_encode("Failed");
        }
    }

    if(!isset($_SESSION['isStuLogin']))
    {
        if(isset($_POST['loginVerify']) && isset($_POST['loginEmail'])
        && isset($_POST['loginPass']))
        {
            $email = $_POST['loginEmail'];
            $password = $_POST['loginPass'];

            $sql = "SELECT stu_email, stu_pass FROM student WHERE stu_email = '".$email."'
                    AND stu_pass = '".$password."'";
            $result = $conn->query($sql);
            $row = $result->num_rows;
            if($row!=0)
            {
                $_SESSION['isStuLogin'] = true;
                $_SESSION['stuEmail'] = $email;
                echo json_encode("OK");
            }
            else
            {
                $sql1 = "SELECT stu_email FROM student WHERE stu_email = '".$email."'";
                $sql2 = "SELECT stu_pass FROM student WHERE stu_pass = '".$password."'";
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