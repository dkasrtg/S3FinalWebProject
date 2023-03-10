<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log in</title>

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
                                        <h2 class="m-b-0">Log In</h2>
                                    </div>
                                    <form action="<?php su('logger/tester')?>" method="post">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="userName">Email: <span class="erro"><?php echo $email?></span></label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="email" name="email" class="form-control" id="userName" placeholder="Email" value="<?php echo $inputs['email']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password">Password: <span class="erro"><?php echo $password?></span></label>
                                            <a class="float-right font-size-13 text-muted" href="#">Forget Password?</a>
                                            <div class="input-affix m-b-10">
                                                <i class="prefix-icon anticon anticon-lock"></i>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $inputs['password']?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="font-size-13 text-muted">
                                                    Don't have an account? 
                                                    <a class="small" href="<?php su('logger/signup');?>"> Sign up</a>
                                                </span>
                                                <button class="btn btn-primary">Log In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">HANTANIAINA Mamisoa Tatamo ETU001956- RAKOTOBARISOLO Andrianiaina Fy michael ETU001998- RAKOTOARISON Tiavina Gael ETU001995</span>
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