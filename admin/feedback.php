<?php
    define("Title","Feedback");
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
        $sql = "DELETE FROM feedback WHERE f_id = '".$id."'";
        $result = $conn->query($sql);
        if($result==true)
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
    <p class="bg-dark text-white text-center p-2">List of Feedback</p>
    <?php
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row!=0)
        {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Feedback Id</th>
                        <th scope="col">Content</th>
                        <th scope="col">Stuent Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row=$result->fetch_assoc())
                    {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $row['f_id'];?></td>
                            <td><?php echo $row['f_content'];?></td>
                            <td><?php echo $row['stu_id'];?></td>
                            <td><?php echo $row['stu_email'];?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="id"
                                        value="<?php echo $row['f_id'];?>">
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
</div>
<?php
    include("./footer.php");
?>