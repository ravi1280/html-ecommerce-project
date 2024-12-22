<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile ||</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>


<body class="b y">
    

        <?php
        require "alertBoxContend.php";
        require "connection.php";
        include "header1.php";


        if (isset($_SESSION["u"])) {

            $email = $_SESSION["u"]["email"];

            $details_rs = Database::search("SELECT * FROM `users` INNER JOIN `gender` ON
                gender.id = users.gender_id WHERE `email`='" . $email . "'");

            $image_rs = Database::search("SELECT * FROM   `profile_img` WHERE  `users_email` = '" . $email . "'");

            $address_rs = Database::search("SELECT * FROM `users_has_address`  INNER JOIN `city` ON 
                users_has_address.city_id=city.id INNER JOIN `district` ON 
                city.district_id=district.id INNER JOIN  `province` ON 
                district.province_id=province.id WHERE `users_email`='" . $email . "'");


            $data = $details_rs->fetch_assoc();
            $image_data = $image_rs->fetch_assoc();
            $address_data = $address_rs->fetch_assoc();
            ?>

            <div class="col-12  mt-5">
                <div class="row">
                    <div class="col-11 col-lg-3 mt-5 py-5">
                        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                            aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="homePage2.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
                            </ol>
                        </nav>

                    </div>

                </div>

            </div>

            <!-- new DEsign -->
            <div class="col-10 offset-1 userbackground rounded-4 p-2 mb-4">
                <div class="row d-flex justify-content-around align-items-center">
                    <div class="col-lg-5 col-11 bg-white rounded-4 mt-3">

                        <div class="d-flex flex-column align-items-center text-center p-3 ">
                            <?php
                            if (empty($image_data["path"])) {
                                ?>
                                <img src="resource/users.jpg" class="rounded " style="width: 200px;" id="viewImg" />
                                <?php

                            } else {
                                ?>
                                <img src="<?php echo $image_data["path"]; ?>" class="rounded " style="width: 200px;"
                                    id="viewImg" />
                                <?php

                            }
                            ?>

                            <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                            <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                            <input type="file" class="d-none" id="profileimage" accept="image/*" />
                            <label for="profileimage" class="btn btn-primary mt-4" onclick="changeImage();">Update
                                Profile Image</label>

                        </div>

                    </div>
                    <div class="col-lg-5 col-11 bg-white rounded-4 mt-3">
                        <div class="row p-4">

                            <div class="col-6">
                                <label class="form-lable">First Name</label>
                                <input type="text" class="form-control" value='<?php echo $data["fname"] ?>' id="fname">
                            </div>

                            <div class="col-6">
                                <label class="form-lable">Last Name</label>
                                <input type="text" class="form-control" value='<?php echo $data["lname"] ?>' id="lname">
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Mobile</label>
                                <input type="text" class="form-control" value='<?php echo $data["mobile"] ?>' id="mobile">
                            </div>
                            <div class="col-12">
                                <label class="form-lable">Password</label>
                                <div class="input-group ">
                                    <input type="password" class="form-control" readonly
                                        value="<?php echo $data["password"]; ?>">
                                    <span class="input-group-text bg-primary" id="basic-addon2">
                                        <i class="bi bi-eye-slash-fill text-white"></i> </span>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Email</label>
                                <input type="text" readonly class="form-control" readonly
                                    value='<?php echo $data["email"] ?>'>
                            </div>

                            <div class="col-12">
                                <label class="form-lable">Registered Date</label>
                                <input type="text" readonly class="form-control" readonly
                                    value='<?php echo $data["join_date"]; ?>'>
                            </div>

                        </div>

                    </div>
                    <div class="col-11 bg-white mt-4 mb-4 p-4 rounded-4">
                        <div class="row d-flex justify-content-around align-items-center">
                            <?php
                            if (!empty($address_data["line1"])) {

                                ?>

                                <div class="col-12">
                                    <label class="form-lable">Address line 01</label>
                                    <input type="text" class="form-control" value='<?php echo $address_data["line1"] ?>'
                                        id="line1">
                                </div>

                                <?php

                            } else {
                                ?>
                                <div class="col-12">
                                    <label class="form-lable">Address line 01</label>
                                    <input type="text" class="form-control" id="line1">
                                </div>

                                <?php
                            }
                            if (!empty($address_data["line2"])) {
                                ?>
                                <div class="col-12">
                                    <label class="form-lable">Address line 02</label>
                                    <input type="text" class="form-control" value='<?php echo $address_data["line2"] ?>'
                                        id="line2">
                                </div>

                                <?php


                            } else {
                                ?>
                                <div class="col-12">
                                    <label class="form-lable">Address line 02</label>
                                    <input type="text" class="form-control" id="line2">
                                </div>
                                <?php
                            }
                            $province_rs = Database::search("SELECT * FROM `province`");
                            $district_rs = Database::search("SELECT * FROM `district`");
                            $city_rs = Database::search("SELECT * FROM `city`")

                                ?>

                            <div class="col-6">
                                <label class="form-lable">Province</label>
                                <select class="form-select" id="province" onchange="loadDistrict();">
                                    <option value="0">Select Province</option>

                                    <?php

                                    $province_rs = Database::search("SELECT * FROM province");
                                    $province_num = $province_rs->num_rows;


                                    for ($a = 0; $a < $province_num; $a++) {
                                        $province_data = $province_rs->fetch_assoc();
                                        ?>

                                        <option value="<?php echo ($province_data["id"]); ?>">
                                            <?php echo ($province_data["name"]); ?>
                                        </option>

                                        <?php
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-lable">District</label>
                                <select class="form-select" id="district" onchange="loadCity();">
                                    <option value="0">Select District</option>

                                    <?php

                                    $district_rs = Database::search("SELECT * FROM district");
                                    $district_num = $district_rs->num_rows;

                                    for ($a = 0; $a < $district_num; $a++) {
                                        $district_data = $district_rs->fetch_assoc();
                                        ?>

                                        <option value="<?php echo ($district_data["id"]); ?>">
                                            <?php echo ($district_data["name"]); ?>
                                        </option>

                                        <?php
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-lable">City</label>
                                <select class="form-select" id="city">
                                    <option value="0">Select City</option>

                                    <?php

                                    $city_rs = Database::search("SELECT * FROM city");
                                    $city_num = $city_rs->num_rows;

                                    for ($a = 0; $a < $city_num; $a++) {
                                        $city_data = $city_rs->fetch_assoc();
                                        ?>

                                        <option value="<?php echo ($city_data["id"]); ?>"><?php echo ($city_data["name"]); ?>
                                        </option>

                                        <?php
                                    }

                                    ?>

                                </select>
                            </div>

                            <?php
                            if (!empty($address_data["postal_code"])) {
                                ?>

                                <div class="col-6">
                                    <label class="form-lable">Postel Code</label>
                                    <input type="text" class="form-control" value="<?php echo $address_data["postal_code"] ?>"
                                        id="pcode" />
                                </div>



                                <?php
                            } else {

                                ?>
                                <div class="col-6">
                                    <label class="form-lable">Postel Code</label>
                                    <input type="text" class="form-control" id="pcode" />
                                </div>




                                <?php
                            }
                            ?>
                            <div class="col-12">
                                <label class="form-lable">Gender</label>
                                <input type="text" class="form-control" readonly value='<?php echo $data["gender_name"] ?>'>
                            </div>

                            <div class="col-12 d-grid mt-3">
                                <button class="btn btn-primary" onclick="updateProfile();">Update My
                                    Profile</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- new DEsign -->
            <?php

        } else {

            ?>
            <script>
                window.location = "homePage2.php"
            </script>
            <?php
        }
        ?>

    

    <?php
    include "footer.php";
    ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>



</html>