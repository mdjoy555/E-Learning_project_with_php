<?php
    define("Title","Login or Sign Up");
    include("./dbConnection.php");
    include("./header.php");
?>
    <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./image/course.jpg" alt="courses"
                style="height: 500px; width: 100%; object-fit: cover; box-shadow: 10px;">
        </div>
    </div>
    <div class="container jumbotron mb-5">
        <div class="row">
            <div class="col-md-5" style="margin-right: 75px;">
                <h5 class="mb-3">If Already Registered! Login</h5>
                <form id="stuLoginForm" role="form">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="stuLogemail"
                            name="stuLogemail" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="stuLogpass" class="pl-2 font-weight-bold">Password</label>
                        <input type="password" class="form-control"
                            id="stuLogpass" name="stuLogpass" placeholder="Password">
                    </div>
                    <button type="button" class="btn btn-primary"
                        id="stuLoginBtn" onclick="stuLogin()">Login</button>
                </form><br>
                <small id="loginMsg"></small>
            </div>
            <div class="col-md-5 offset-md-1">
                <h5 class="mb-3">New User! Sign Up</h5>
                <form id="signupForm">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <label for="stuname" class="pl-2 font-weight-bold">Name</label>
                        <input type="text" class="form-control" id="stuname"
                            name="stuname" placeholder="Name">
                        <small id="msg1"></small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="stuemail" class="pl-2 font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="stuemail"
                            name="stuemail" placeholder="Email">
                        <small id="msg2"></small>
                        <small id="emailHelp" class="form-text text-muted">
                            We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="stupass" class="pl-2 font-weight-bold">Password</label>
                        <input type="password" class="form-control"
                            id="stupass" name="stupass" placeholder="Password">
                        <small id="msg3"></small>
                    </div>
                    <button type="button" class="btn btn-primary" id="signupBtn"
                        onclick="addStu()">Sign Up</button>
                </form><br>
                <span id="successMsg"></span>
            </div>
        </div>
    </div>
<?php
    include("./contact.php");
    include("./footer.php");
?>