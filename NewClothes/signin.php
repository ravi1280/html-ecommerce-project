<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Page ||</title>
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="main ">
    <?php require "alertBoxContend.php";?>
    <div class="container-fluid vh-100 d-flex justify-content-center g-2">

        <div class="card ">
            <div class="row align-content-center">
                <!-- header -->
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 mt-1 mb-5">
                            <h1 class=" text-white fs-1">Hi welcome to NEW CLOTHES</h1>
                        </div>
                    </div>
                </div>

                <!-- header -->
                <!-- contend -->
                <div class="col-12 p-3 mt-4 ">
                    <div class="row">
                        <div class="col-6 d-none d-lg-block signinimg"></div>
                        <div class="col-12 col-lg-6 ">
                            <div class="row g-2">
                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }
                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }
                                ?>

                                <span class="text-danger " id="msg2"></span>
                                <div class="col-12 mb-4">
                                    <label class="form-lable">Email</label>
                                    <input type="text" class="form-control" id="email2" value="<?php echo $email; ?>">
                                </div>

                                <div class="col-12 mb-4">
                                    <label class="form-lable ">Password</label>
                                    <input type="password" class="form-control" id="password2"
                                        value="<?php echo $password; ?>">
                                </div>

                                <div class="col-12 text-start">
                                    <div class=" form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme">
                                        <label class="form-check-label ">Remember ME</label>

                                    </div>
                                </div>

                                <div class="col-12  text-end">
                                    <a href="#" class=" link-light " onclick="forgotPassword();">Forget Passowrd</a>
                                </div>



                                <div class="col-12 col-lg-6 d-grid">
                                    <button class=" btn btn-warning" onclick="signuppage();"> Sign Up </button>
                                </div>

                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-primary" onclick="signin();"> Sign In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer -->

            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy;2022 <b>New Clothes</b>.lk || All Right Reserved</p>
            </div>

            <!-- footer -->

        </div>

        <!-- model -->
        <div class="modal" tabindex="-1" id="forgotPasswordModel" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black">Please Check Your Email.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body alertBoxBackground">
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-lable text-black">New password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="npi">
                                    <button class="btn btn-outline-secondary" type="button" id="npb"
                                        onclick="ShowPassword1();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-lable text-black">Retype New password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="rnp">
                                    <button class="btn btn-outline-secondary" type="button" id="rnpb"
                                        onclick="ShowPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-lable text-black">verification code</label>

                                <input type="text" class="form-control" id="vc">


                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetpw();"> Reset Password</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>