<?php
require "connection.php";

if (empty($_GET["name"])) {

    echo ("Please Enter User Name !!");


} else {
    $name = $_GET["name"];

    ?>

    <?php

    $query = "SELECT * FROM `users` WHERE (`fname` LIKE '%" . $name . "%') OR (`lname` LIKE '%" . $name . "%')";
    $pageno;

    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

    $user_rs = Database::search($query);
    $user_num = $user_rs->num_rows;

    $results_per_page = 5;
    $number_of_pages = ceil($user_num / $results_per_page);

    $page_results = ($pageno - 1) * $results_per_page;
    $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

    $selected_num = $selected_rs->num_rows;

    for ($x = 0; $x < $selected_num; $x++) {
        $selected_data = $selected_rs->fetch_assoc();

        ?>


        <div class="col-lg-10 col-12  border-1 border-bottom offset-lg-1 mt-3">
            <div class="row">
                <div class="col-lg-1 col-12 text-center text-lg-end ">
                    <?php
                    $image_rs = Database::search("SELECT * FROM   `profile_img` WHERE  `users_email` = '" . $selected_data['email'] . "'");
                    $image_data = $image_rs->fetch_assoc();

                    ?>

                    <?php
                    if (empty($image_data["path"])) {
                        ?>

                        <img src="resource/profile-img/user2.jpg" style="height: 60px; " class=" rounded-3 mb-2 ">
                        <?php

                    } else {
                        ?>
                        <img src="<?php echo $image_data["path"]; ?>" style="height: 60px; " class="  rounded-3 mb-2 ">
                        <?php

                    }
                    ?>

                </div>
                <div class="col-lg-4 col-12 text-center text-lg-end">
                    <h5 class=" mt-3  fw-bold">•
                        <?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?>
                    </h5>
                </div>
                <div class="col-lg-2 col-4  offset-lg-0  mt-2 mb-lg-0 mb-3 ">

                    <?php

                    if ($selected_data["status_id"] == 1) {
                        ?>
                        <a id="btn<?php echo $selected_data['email']; ?>"
                            class="text-lg-center  btn btn-outline-success d-block  text-decoration-none fw-bold  "
                            onclick="Activation('<?php echo $selected_data['email']; ?>');">Active</a>
                        <?php
                    } else {
                        ?>
                        <a id="btn<?php echo $selected_data['email']; ?>"
                            class="text-lg-center  btn btn-outline-danger d-block text-decoration-none fw-bold  "
                            onclick="Activation('<?php echo $selected_data['email']; ?>');">Deactive</a>
                        <?php

                    }

                    ?>

                </div>

                <div class="col-lg-2 col-4 mt-2 mb-lg-0 mb-3 ">
                    <a class="text-lg-center  btn btn-outline-success  d-block text-decoration-none fw-bold "
                        onclick="UmoreModel('<?php echo $selected_data['email']; ?>');">More</a>
                </div>
                <div class="col-lg-2 col-4 mt-2 mb-lg-0 mb-3  ">

                    <a class="text-lg-center  btn btn-outline-primary  d-block text-decoration-none fw-bold "
                        onclick="aMessage('<?php echo $selected_data['email']; ?>');"><i
                            class="bi bi-chat-left-text-fill"></i></a>
                </div>
                <!-- //message model// -->


                <div class="modal" tabindex="-1" id="moreModeli<?php echo $selected_data["email"]; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h4><b>Message Box</b> </h4>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $message_rs = Database::search("SELECT * FROM `message` WHERE `from`='" . $selected_data["email"] . "' OR`to`='" . $selected_data["email"] . "' ");
                                $message_num = $message_rs->num_rows;

                                $email = $selected_data["email"];
                                for ($y = 0; $y < $message_num; $y++) {
                                    $message_data = $message_rs->fetch_assoc();

                                    if ($message_data["to"] == $selected_data["email"]) {
                                        ?>
                                        <div class="col-8 bg-primary text-white "
                                            style="float: right; border-radius:10px; margin-bottom:10px;">
                                            <div class="row">
                                                <h5 class="text-white mx-3 mt-2 mb-2 ">
                                                    <?php echo $message_data["message"]; ?>
                                                </h5>
                                            </div>

                                        </div>

                                        <?php

                                    } else {
                                        ?>
                                        <div class="col-8 bg-black " style="float: left; border-radius:10px; margin-bottom:10px;">
                                            <div class="row">
                                                <h5 class=" text-white mx-3 mt-2 mb-2 ">
                                                    <?php echo $message_data["message"]; ?>
                                                </h5>
                                            </div>

                                        </div>

                                        <?php

                                    }
                                    ?>

                                    <?php

                                }

                                ?>


                            </div>
                            <div class="modal-footer">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" id="adminMsg<?php echo $selected_data["email"]; ?>"
                                                class=" form-control">
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary"
                                                onclick="chat2('<?php echo $email ?>');"><i class="bi bi-send-fill"> &nbsp;
                                                    send</i></button>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- //message model// -->
            </div>
        </div>
        <div class="modal" tabindex="-1" id="moreModel<?php echo $selected_data["email"]; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4><b>More Details</b> </h4>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="col-4 offset-4">
                            <div class="row">
                                <img src="<?php echo $image_data["path"]; ?>" style="height: 100px;" class=" rounded-5 mb-2 ">
                            </div>
                        </div>

                        <h6 class="modal-title text-center"><b>Name :</b>
                            <?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></h6>
                        <h6 class="modal-title text-center"><b>Email :</b>
                            <?php echo $selected_data["email"]; ?></h6>
                        <h6 class="modal-title text-center"><b>Mobile Number :</b>
                            <?php echo $selected_data["mobile"]; ?></h6>
                        <h6 class="modal-title text-center"><b>Verification Code :</b>
                            <?php echo $selected_data["verification_code"]; ?></h6>
                        <h6 class="modal-title text-center"><b>Join Date :</b>
                            <?php echo $selected_data["join_date"]; ?></h6>


                    </div>
                    <div class="modal-footer">


                    </div>
                </div>
            </div>
        </div>
        <?php

    }
    ?>

    <!--  -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mt-3 mb-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="
                                    <?php if ($pageno <= 1) {
                                        echo ("#");
                                    } else {
                                        echo "?page=" . ($pageno - 1);
                                    } ?>
                                    " aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                        </li>
                        <?php
                    }
                }

                ?>

                <li class="page-item">
                    <a class="page-link" href="
                                    <?php if ($pageno >= $number_of_pages) {
                                        echo ("#");
                                    } else {
                                        echo "?page=" . ($pageno + 1);
                                    } ?>
                                    " aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--  -->

    <?php

}


?>