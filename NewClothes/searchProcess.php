<?php
require "connection.php";
session_start();

$text = $_POST["text"];
$category = $_POST["category"];
$colour = $_POST["colour"];
$size = $_POST["size"];
$sort = $_POST["sort"];
$price_from = $_POST["pf"];
$price_to = $_POST["to"];

$query = "SELECT * FROM `product`";
$status = 0;



if ($sort == 0) {


    if (!empty($text)) {
        $query .= " WHERE `title` LIKE '%" . $text . "%'";
        $status = 1;
    }


    if ($status == 0 && $category != 0) {
        $query .= " WHERE `category_id` ='" . $category . "'";
        $status = 1;
    } else if ($status != 0 && $category != 0) {
        $query .= " AND `category_id` = '" . $category . "'";
    }


    $pid = 0;


    if ($status == 0 && $colour != 0) {
        $query .= " WHERE `colour_id` = '" . $colour . "'";
        $status = 1;
    } elseif ($status != 0 && $colour != 0) {
        $query .= " AND `colour_id` = '" . $colour . "'";
    }


    if ($status == 0 && $size != 0) {
        $query .= " WHERE `size_id` = '" . $size . "'";
        $status = 1;
    } elseif ($status != 0 && $size != 0) {
        $query .= " AND `size_id` = '" . $size . "'";
    }



    // price
    if (!empty($price_from) && empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price`>= '" . $price_from . "'";
            $status = 1;
        } else if ($status != 0) {

            $query .= " AND `price`>= '" . $price_from . "'";
        }
    } else if (empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price`<= '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($price_from) && !empty($price_to)) {
        if ($status == 0) {
            $query .= " WHERE `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "' ";
            $status = 1;
        } else if ($status != 0) {
            $query .= " AND `price` BETWEEN '" . $price_from . "' AND '" . $price_to . "' ";
        }
    }
    // price


} else if ($sort == 1) {
    if (!empty($text)) {
        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `price` DESC ";
        $status = 1;
    }
} else if ($sort == 2) {
    if (!empty($text)) {
        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `price` ASC ";
        $status = 1;
    }
} else if ($sort == 3) {
    if (!empty($text)) {
        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `qty` DESC ";
        $status = 1;
    }
} else if ($sort == 4) {
    if (!empty($text)) {
        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `qty` ASC ";
        $status = 1;
    }
} else if ($sort == 5) {
    if (!empty($text)) {
        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `datetime_added` DESC ";
        $status = 1;
    }
} else if ($sort == 6) {
    if (!empty($text)) {
        $query .= " WHERE `title` LIKE '%" . $text . "%' ORDER BY `datetime_added` ASC ";
        $status = 1;
    }
}



?>


<?php
// $pageno;
// if ($_GET["page"] != "0") {

//     $pageno = $_GET["page"];
// } else {

//     $pageno = 1;
// }

// $product_rs = Database::search($query);
// $product_num = $product_rs->num_rows;

// $results_per_page = 4;
// $number_of_pages = ceil($product_num / $results_per_page);

// $viewed_results_count = ((int) $pageno - 1) * $results_per_page;

// $query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
// $results_rs = Database::search($query);
// $results_num = $results_rs->num_rows;
?>

<?php
// $pageno;
// if ($_POST["page"] != "0") {

//     $pageno = $_POST["page"];
// } else {

//     $pageno = 1;
// }

// $product_rs = Database::search($query);
// $product_num = $product_rs->num_rows;

// $results_per_page = 4;
// $number_of_pages = ceil($product_num / $results_per_page);

// $viewed_results_count = ((int) $pageno - 1) * $results_per_page;

// // $_SESSION["advanceQuery"] = $query;
// // echo ($query);

// $query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::search($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
    ?>

    <div class="col-lg-3 col-12">
        <div class="border border-3 rounded position-relative ">
            <div class="">
                <?php

                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $results_data["id"] . "'");
                $image_data = $image_rs->fetch_assoc();

                ?>
                <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
            </div>

            <?php
            if (isset($_SESSION["u"])) {
                $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $results_data["id"] . "' AND 
                                        `users_email`='" . $_SESSION["u"]["email"] . "'");
                $watchlist_num = $watchlist_rs->num_rows;

                if ($watchlist_num == 1) {
                    ?>
                    <div class="text-danger border border-2  px-3 py-1 rounded-pill position-absolute"
                        style="top: 10px; right: 10px;"><i class="fa fa-heart" aria-hidden="true"></i>
                    </div>

                    <?php

                } else {
                    ?>
                    <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute"
                        style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $results_data["id"]; ?>);'><i
                            class="fa fa-heart" aria-hidden="true"></i>
                    </div>

                    <?php
                }
            } else {
                ?>
                <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute disabled"
                    style="top: 10px; right: 10px;"><i class="fa fa-heart " aria-hidden="true"></i>
                </div>

                <?php
            }
            ?>


            <div class="p-4 rounded-bottom cardH ">

                <h4 class=" fw-bold"><?php echo $results_data["title"]; ?></h4>

                <p><?php echo $results_data["description"]; ?></p>
                <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                    <p class="text-dark fs-5 fw-bold mt-1 mb-0 ">
                        RS:<?php echo $results_data["price"]; ?>.00
                    </p>
                    <?php
                    if (isset($_SESSION["u"])) {
                        if ($results_data["qty"] > 0) {
                            ?>
                            <a href="<?php echo "singleProductView.php?id=" . $results_data["id"]; ?>"
                                class="btn border border-secondary rounded-pill px-3 text-primary"> Buy Now</a>
                            <a class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                    class="fa fa-shopping-bag me-2  " onclick='addToCart(<?php echo $results_data["id"]; ?>);'></i>
                            </a>

                            <?php
                        } else {
                            ?>
                            <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>
                            <a href="" class="btn border border-2 text-center text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary " onclick="al();"></i> </a>

                            <?php
                        }

                    } else {
                        ?>
                        <a href="<?php echo "singleProductView.php?id=" . $results_data["id"]; ?>"
                            class="btn border  border-2   px-3 text-primary"> Buy Now</a>
                        <a class="btn border border-2 disabled text-center text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary "></i> </a>

                        <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>

    <?php
}

?>



<!-- <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php
                if ($pageno <= 1) {
                    // echo "#";
                } else {
                    ?> 
                    onclick="search('<?php echo($pageno-1)?>')"
                    <?php
                    // echo "?page=" . ($pageno - 1);
                }
                ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {

                    ?>
                    <li class="page-item active">
                        <a class="page-link" onclick="search('<?php echo $x ?>');"><?php echo $x; ?></a>
                    </li>
                    <?php

                } else {
                    ?>
                    <li class="page-item">
                        <a class="page-link" onclick=" search('<?php echo $x ?>');"><?php echo $x; ?></a>
                    </li>
                    <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link"  <?php
                if ($pageno <= 1) {
                    // echo "#";
                } else {
                    ?>
                    onclick="search('<?php echo($pageno-1)?>')"
                    <?php
                    // echo "?page=" . ($pageno - 1);
                }
                ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div> -->