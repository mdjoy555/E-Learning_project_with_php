<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2023 || Designed by ELearning
            || <a href="#login" data-target="#adminLoginModalCenter" data-toggle="modal"
            >Admin Login</a>
        </small>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="stuRegModalCenter" tabindex="-1"
        aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuRegModalCenterLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close" onclick="signupClose()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <span id="successMsg"></span>
                    <button type="button" class="btn btn-primary" id="signupBtn"
                        onclick="addStu()">Sign Up</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="signupClose()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="stuLoginModalCenter" tabindex="-1"
        aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuLoginModalCenterLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close" onclick="loginClose()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="stuLoginForm">
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
                    </form>
                </div>
                <div class="modal-footer">
                    <small id="loginMsg"></small>
                    <button type="button" class="btn btn-primary"
                        id="stuLoginBtn" onclick="stuLogin()">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="loginClose()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1"
        aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminLoginModalCenterLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close" onclick="adminLoginClose()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="adminLoginForm">
                        <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="adminLogemail"
                                name="adminLogemail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i>
                            <label for="adminLogpass" class="pl-2 font-weight-bold">Password</label>
                            <input type="password" class="form-control"
                                id="adminLogpass" name="adminLogpass" placeholder="Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <small id="adminLoginMsg"></small>
                    <button type="button" class="btn btn-primary"
                        id="adminLoginBtn" onclick="adminLogin()">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="adminLoginClose()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/ajaxrequest.js"></script>
</body>
</html>