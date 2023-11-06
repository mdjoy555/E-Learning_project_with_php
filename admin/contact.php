<?php
    define("Title","Contact");
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
        $sql = "DELETE FROM contact WHERE contact_id = '".$id."'";
        $result = $conn->query($sql);
        if($result==true)
        {
            $msg = "<div class='alert alert-success col-sm-6 mb-3 text-center'>
                        Delete Successfully</div>";
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
    <p class="bg-dark text-white text-center p-2">List of Contact</p>
    <?php
        $sql = "SELECT * FROM contact";
        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row!=0)
        {
    ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Contact ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row=$result->fetch_assoc())
                        {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $row['contact_id'];?></th>
                                <td><?php echo $row['contact_name'];?></td>
                                <td><?php echo $row['contact_subject'];?></td>
                                <td><?php echo $row['contact_email'];?></td>
                                <td><?php echo $row['contact_message'];?></td>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id"
                                            value="<?php echo $row['contact_id'];?>">
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