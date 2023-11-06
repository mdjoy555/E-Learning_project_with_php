<?php
    if(isset($_POST['submit']))
    {
        if(($_POST['name'])!="" && ($_POST['subject'])!="" && ($_POST['email'])!=""
            && ($_POST['message'])!="")
        {
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $sql = "INSERT INTO contact(contact_name,contact_subject,contact_email,contact_message)
                    VALUES('$name','$subject','$email','$message')";
            $result = $conn->query($sql);
            if($result==true)
            {
                $msg = "<div class='alert alert-success'>Send Successfully</div>";
            }
            else
            {
                $msg = "<div class='alert alert-danger'>Failed to Send</div>";
            }
        }
        else
        {
            $msg = "<div class='alert alert-warning'>All fields are required!</div>";
        }
    }    
?>
<div class="container mt-4" id="contact">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="row">
        <div class="col-md-8">
            <form method="post">
                <input type="text" name="name" class="form-control"
                    placeholder="Name"><br>
                <input type="text" name="subject" class="form-control"
                    placeholder="Subject"><br>
                <input type="email" name="email" class="form-control"
                    placeholder="Email"><br>
                <textarea name="message" class="form-control" style="height: 150px;"
                    placeholder="Message">
                </textarea><br>
                <input type="submit" value="Send" class="btn btn-primary" name="submit">
                <br><br>
                <?php
                    if(isset($msg))
                    {
                        echo $msg;
                    }
                ?>
            </form>
        </div>
        <div class="col-md-4 stripe text-white text-center">
            <h4>ELearning</h4>
            <p>ELearning, Chittagong, Bangladesh<br>
                Phone: 0123456789<br>
                www.elearning.com
            </p>
        </div>
    </div>
</div>