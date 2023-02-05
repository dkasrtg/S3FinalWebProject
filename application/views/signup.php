<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign up</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php bu('assets/admin/assets/images/logo/user-286.png')?>">

    <!-- page css -->
    <link href="<?php bu('assets/admin/assets/css/main.css')?>" rel="stylesheet">

    <!-- Core css -->
    <link href="<?php bu('assets/admin/assets/css/app.min.css')?>" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('<?php bu('assets/admin/assets/images/others/login-3.png')?>')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <h2 class="m-b-0">Sign up <span class="erro"><?php echo $success?></span></h2>
                                    </div>
                                    <form action="<?php su('logger/signuper')?>" method="post">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">First name : </label>
                                            <input type="text" name="first_name" class="form-control" id="userName" placeholder="First name" value="<?php echo set_value('first_name'); ?>">
                                            <?php fe('first_name')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Last name :</label>
                                            <input type="text" name="last_name" class="form-control" id="userName" placeholder="Last name" value="<?php echo set_value('last_name'); ?>">
                                            <?php fe('last_name')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Phone :</label>
                                            <input type="text" name="phone" class="form-control" id="userName" placeholder="Phone" value="<?php echo set_value('phone'); ?>">
                                            <?php fe('phone')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                                            <?php fe('email')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password:</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>">
                                            <?php fe('password')?>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                                            <input type="password" name="cpassword" class="form-control" id="confirmPassword" placeholder="Confirm Password" value="<?php echo set_value('cpassword'); ?>">
                                            <?php fe('cpassword')?>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Already have an account? 
                                                    <a class="small" href="<?php su('logger/');?>"> Log in</a>
                                                </span>
                                                <button class="btn btn-primary">Sign up</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2023 S3FinalWebProject</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="#">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="#">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="<?php bu('assets/admin/assets/js/vendors.min.js')?>"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="<?php bu('assets/admin/assets/js/app.min.js')?>"></script>

</body>
</html>