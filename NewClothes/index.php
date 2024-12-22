
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page ||</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="">

    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="main " >
    <div class="container-fluid justify-content-center   d-flex  g-2">

        <div class="card  ">
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
            <div class="col-12 p-3 mb-3 ">
                <div class="row">
                    <div class="col-6 d-none d-lg-block signupimg"></div>
                    <div class="col-12 col-lg-6 mb-4 " id="signUpBox">
                        <div class="row g-2">

                            <div class="col-12">
                                <p class="fs-3">Create New Account</p>
                            </div>
                           
                            <span class="text-danger " id="warningMsg"></span>
                          

                            <div class="col-6">
                                <label class="form-lable">First Name</label>
                                <input type="text" class="form-control" id="f">
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Last Name</label>
                                <input type="text" class="form-control" id="l">
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Email</label>
                                <input type="text" class="form-control" id="e">
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Password</label>
                                <input type="password" class="form-control" id="p">
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Mobile</label>
                                <input type="text" class="form-control" id="m">
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Gender</label>
                                <select class="form-select" id="g">
                                    
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                      
                                </select>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-danger" onclick="signUp();"> Sign Up </button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-primary" onclick="signinpage();"> Sign In</button>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- footer -->

                <div class="col-12 fixed-bottom d-none d-lg-block  mb-5">
                    <p class="text-center">&copy;2022 <b>New Clothes</b>.lk || All Right Reserved</p>
                </div>
                
                <!-- footer -->

            </div>

                
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>