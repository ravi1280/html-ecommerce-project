<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signin Page ||</title>
    <link rel="stylesheet" href="bootstrap.css" />

    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="main ">
    <div class="container-fluid vh-100 d-flex justify-content-center g-2">

        <div class="card  ">
            <div class="row align-content-center">
                <!-- header -->

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 mt-1 mb-5">
                            <h1 class=" text-white fs-1">Please Enter Admin Email Address</h1>
                        </div>
                    </div>
                </div>

                <!-- header -->
                <!-- contend -->
                <div class="col-12">
                    <div class="row">


                        <div class="col-lg-4 ">
                            <div class="row">
                                <!-- <div class="col-6 d-none d-lg-block signinimg"> -->
                                <img src="resource/adminSignIn.jpg" class=" rounded-5" alt="">

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="col-10 offset-1 ">
                                <div class="row">
                                    <input type="text" class=" form-control sh text-center rounded-3 mt-5" id="email"
                                        placeholder="admin@gmail.com" style="height:50px ;">
                                </div>
                            </div>
                            <!-- contend -->


                            <div class="col-12 col-lg-8 offset-lg-2 d-grid mt-3">
                                <!-- <button class="signinbtn abtn sh" onclick="changeViwe();"> Sign In</button> -->
                                <a class=" btn btn-primary text-decoration-none" onclick="changeViwe();"> Sign In</a>
                            </div>
                        </div>
                    </div>


                    <!-- model -->
                    <div class="modal" tabindex="-1" id="verificationModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary mb-2">Admin Verification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label class="form-lable text-primary mb-2"> Ente Your Verification Code ..</label>
                                    <input type="text" class=" form-control" id="vcode">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="adminVerify();">Verify</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- model -->
                    <!-- modal -->
                    <div class="modal" tabindex="-1" id="alertBox">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-black">Alert Box</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-5">
                                    <div class="col-10 offset-1 rounded-3 alertBoxBackground p-4">
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <h4 class=" text-black text-center" id="alertContend"></h4>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- modal -->

                    <!-- footer -->

                    <div class="col-12 fixed-bottom d-none d-lg-block">
                        <p class="text-center">&copy;2022 <b>New Clothes</b>.lk || All Right Reserved</p>
                    </div>

                    <!-- footer -->

                </div>
            </div>
        </div>
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
</body>

</html>