<footer class="container-fluid bg-dark-brown text-white text-center p-5">
  Copyright &copy; AgriBids <span id="copyright-year"></span>
</footer>

<div class="modal fade" id="auth-modal" tabindex="-1" aria-labelledby="auth-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-brown active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#login-tab-pane" type="button" role="tab"
                                    aria-controls="login-tab-pane" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-brown" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#register-tab-pane" type="button" role="tab"
                                    aria-controls="register-tab-pane" aria-selected="false">Sign Up</button>
                        </li>
                    </ul>
                    <span style="cursor: pointer" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-circle-xmark text-brown"></i>
                    </span>
                </div>
                <div class="tab-content px-3 my-3" id="auth-tab">
                    <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel"
                         aria-labelledby="login-tab" tabindex="0">
                        <h5>Login</h5>
                        <form class="row" method="post" action="#">
                            <div class="col-md-12 mb-3">
                                <label for="login-email" class="form-label">
                                    Email address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email-login" id="login-email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="login-password" class="form-label">
                                    Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="login-password" id="login-password" required>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-outline-brown" name="login" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="register-tab-pane" role="tabpanel"
                         aria-labelledby="register-tab" tabindex="0">
                        <h5>Sign Up</h5>
                        <form class="row" method="post" action="#">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">
                                    Email address <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">
                                    Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="re-password" class="form-label">
                                    Re-type Password <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="re-password" id="re-password" required>
                            </div>
                            <div class="col-md-12">
                              <button class="btn btn-outline-brown" name="signup" type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/scripts.js"></script>
</body>
</html>