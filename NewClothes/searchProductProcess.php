<?php
require "connection.php";

if (empty($_GET["name"])) {

    echo ("Please Product User Name !!");


} else {
    $name = $_GET["name"];

    ?>

    <?php

    $query = "SELECT * FROM `product` WHERE `title` LIKE '%" . $name . "%'";
    $pageno;

    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

    $product1_rs = Database::search($query);
    $product1_num = $product1_rs->num_rows;

    $results_per_page = 5;
    $number_of_pages = ceil($product1_num / $results_per_page);

    $page_results = ($pageno - 1) * $results_per_page;
    $product_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

    $product_num = $product_rs->num_rows;

    for ($x = 0; $x < $product_num; $x++) {
        $product_data = $product_rs->fetch_assoc();

        ?>


        <div class="col-lg-10 col-12   border-1 border-bottom offset-lg-1 mt-3 ">
            <div class="row">
                <div class="col-lg-2 col-5 text-end text-lg-center">
                    <?php
                    $image_rs = Database::search("SELECT * FROM   `images` WHERE  `product_id` = '" . $product_data["id"] . "'");
                    $image_data = $image_rs->fetch_assoc();

                    ?>
                    <img src="<?php echo $image_data["code"]; ?>" style="height: 60px; " class=" rounded-4 mb-3">
                </div>
                <div class="col-lg-4 col-5 text-center text-lg-center">
                    <h4 class=" mt-3"><?php echo $product_data["title"]; ?></h4>
                </div>
                <div class="col-lg-2 col-6  mt-2 mb-lg-0 mb-3 ">

                    <?php

                    if ($product_data["status_id"] == 1) {
                        ?>
                        <a id="pbtn<?php echo $product_data['id']; ?>"
                            class="text-lg-center  btn btn-outline-success  text-decoration-none fw-bold d-block"
                            onclick="pActivation('<?php echo $product_data['id']; ?>');">Active</a>
                        <?php
                    } else {
                        ?>
                        <a id="pbtn<?php echo $product_data['id']; ?>"
                            class="text-lg-center  btn btn-outline-danger  text-decoration-none fw-bold d-block"
                            onclick="pActivation('<?php echo $product_data['id']; ?>');">Deactive</a>
                        <?php

                    }

                    ?>

                </div>

                <div class="col-lg-2 col-6 mt-2 mb-lg-0 mb-3 ">
                    <a class="text-lg-center  btn btn-outline-success  text-decoration-none fw-bold d-block "
                        onclick="PmoreModel('<?php echo $product_data['id']; ?>');">More &nbsp;<i
                            class="bi bi-three-dots-vertical"></i></a>
                </div>

                <div class="modal" tabindex="-1" id="PmoreModel<?php echo $product_data['id']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4><b>More Details</b> </h4>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <div class="col-4 offset-4">
                                    <div class="row">
                                        <img src="<?php echo $image_data["code"]; ?>" style="height: 150px;"
                                            class=" rounded-5 mb-2 ">
                                    </div>
                                </div>

                                <h6 class="modal-title text-center"><b>Name :</b>
                                    <?php echo $product_data['title']; ?></h6>
                                <h6 class="modal-title text-center"><b>Price :</b>
                                    Rs.<?php echo $product_data['price']; ?>.00</h6>
                                <h6 class="modal-title text-center"><b>Warrenty :</b>
                                    <?php echo $product_data["warrenty"]; ?></h6>
                                <h6 class="modal-title text-center"><b>Discount :</b>
                                    <?php echo $product_data["discount"]; ?> %</h6>
                                <h6 class="modal-title text-center"><b>Datetime Added :</b>
                                    <?php echo $product_data["datetime_added"]; ?></h6>
                                <h6 class="modal-title text-center"><b>Description :</b>
                                    <?php echo $product_data['description']; ?></h6>


                            </div>
                            <div class="modal-footer">


                            </div>
                        </div>
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