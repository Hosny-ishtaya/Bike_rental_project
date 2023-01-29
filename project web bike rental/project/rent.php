<?php
require './rentaction.php';
unset($_SESSION['msg']);
if (isset($_POST['submit'])) {
    $_POST['user_id'] = $_SESSION['user']['data']['user_id'];
    $sd = str_replace('-', '', $_POST['start_date']);
    $ed = str_replace('-', '', $_POST['end_date']);
    $_POST['product_id'] = $_GET['id'];
    if (($ed - $sd) < 0) {
        $_SESSION['msg']['error'] = 'End Date must be after one day form start date';

    } else {

        $rent = rent_action($_POST);
        if ($rent === "success") {
            header('location: ./rent.php');
        } else {
            $_SESSION['msg']['error'] = 'error with add rent';
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>rental portal</title>
    <link rel="stylesheet" href="./css/hh2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<nav class="navv">
    <ul>
        <li><a class="active" href="./index.php">Back</a></li>
    </ul>
    <div class="tt">
        <h2 class="title">Bikes Rental Portal</h2>
    </div>
</nav>
<?php
if (isset($_GET['id'])) {
    $product = getproduct($_GET['id'])['data'];
    if (isset($_SESSION['msg']['error'])) {
        echo $_SESSION['msg']['error'];
    }
    ?>
    <div id='login-form' class='login-page' style="display: block;">
        <div class="form-box">
            <div class="container">
                <div class="titlee">Rental Form</div>
                <form id='login' method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" name="full_name" placeholder="Enter your name" required
                                   value="<?php echo $_SESSION['user']['data']['first_name'] . " " . $_SESSION['user']['data']['last_name'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Email Id</span>
                            <input type="email" name="email" placeholder="Enter your Email id" required
                                   value="<?php echo $_SESSION['user']['data']['user_email'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Phone</span>
                            <input type="phone" name="phone" placeholder="Enter Your Phone Number" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Credit Card Number</span>
                            <input type="text" name="ccn" placeholder="Enter Your Credit Card Number" required>

                        </div>
                        <div class="input-box">
                            <span class="details">Type of Bike</span>
                            <input type="text" name="product_type" placeholder="Enter Type Of Bike" required
                                   value="<?php echo $product['product_type'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Serial Number Of Bike</span>
                            <input type="text" name="product_sn" placeholder="Enter Serial Number Of Bike" required
                                   value="<?php echo $product['product_sn'] ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Start Date</span>
                            <input name="start_date" type="date" required>
                        </div>
                        <div class="input-box">
                            <span class="details">End Date</span>
                            <input name="end_date" type="date" required>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" name="submit" value="Rent">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
?>
<div class="small-container">
    <h2 class="title">Electric Bikes</h2>
    <div class="row">
        <?php
        $product = getproducts();
        if ($product['status'] === 1) {
            foreach ($product['data'] as $row) {
                if ($row['product_title'] === "electrical bike") {
                    ?>
                    <div class="col-4">
                        <img src="<?php echo $row['product_image'] ?>">
                        <h4><?php echo $row['product_title'] ?></h4>
                        <h4>Serial number:<?php echo $row['product_sn'] ?></h4>
                        <div class="rating">
                            <?php
                            for ($i = 0; $i < intval($row['product_rate']) - 1; $i++) {
                                ?>
                                <i class="fa fa-star"></i>

                                <?php
                            }
                            ?>
                            <?php
                            if (sizeof(explode(".", $row['product_rate'])) > 0) {
                                ?>
                                <i class="fas fa-star-half-alt"></i>
                                <?php
                            }
                            ?>
                        </div>
                        <p>$<?php echo doubleval($row['product_price']) ?>.00</p>
                        <div class="btt"> <a class="btn"  href="./rent.php?id=<?php echo $row['product_id'] ?>">Rent &#8594</a></div>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
    <h2 class="title">Street Bikes</h2>
    <div class="row">
        <?php
        $product = getproducts();
        if ($product['status'] === 1) {
            foreach ($product['data'] as $row) {
                if ($row['product_title'] === "Street bike") {
                    ?>
                    <div class="col-4">
                        <img src="<?php echo $row['product_image'] ?>">
                        <h4><?php echo $row['product_title'] ?></h4>
                        <h4>Serial number:<?php echo $row['product_sn'] ?></h4>
                        <div class="rating">
                            <?php
                            for ($i = 0; $i < intval($row['product_rate']) - 1; $i++) {
                                ?>
                                <i class="fa fa-star"></i>

                                <?php
                            }
                            ?>
                            <?php
                            if (sizeof(explode(".", $row['product_rate'])) > 0) {
                                ?>
                                <i class="fas fa-star-half-alt"></i>
                                <?php
                            }
                            ?>
                        </div>
                        <p>$<?php echo doubleval($row['product_price']) ?>.00</p>
                        <div class="btt"> <a  class="btn" href="./rent.php?id=<?php echo $row['product_id'] ?>">Rent &#8594</a></div>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
    <h2 class="title">Mountain Bikes</h2>
    <div class="row">
        <?php
        $product = getproducts();
        if ($product['status'] === 1) {
            foreach ($product['data'] as $row) {
                if ($row['product_type'] === "Mountain Bikes") {
                    ?>
                    <div class="col-4">
                        <img src="<?php echo $row['product_image'] ?>">
                        <h4><?php echo $row['product_title'] ?></h4>
                        <h4>Serial number:<?php echo $row['product_sn'] ?></h4>
                        <div class="rating">
                            <?php
                            for ($i = 0; $i < intval($row['product_rate']) - 1; $i++) {
                                ?>
                                <i class="fa fa-star"></i>

                                <?php
                            }
                            ?>
                            <?php
                            if (sizeof(explode(".", $row['product_rate'])) > 0) {
                                ?>
                                <i class="fas fa-star-half-alt"></i>
                                <?php
                            }
                            ?>
                        </div>
                        <p>$<?php echo doubleval($row['product_price']) ?>.00</p>
                        <div class="btt">  <a class="btn"  href="./rent.php?id=<?php echo $row['product_id'] ?>">Rent &#8594</a></div>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>
<div class="offer">
    <div class="small-container">
        <?php
        $product = getproducts();
        if ($product['status'] === 1) {
            foreach ($product['data'] as $row) {
                if ($row['product_type'] === "smart_bike") {
                    ?>
                    <div class="row">
                        <div class="col-2">
                            <img src="<?php echo $row['product_image'] ?>" class="offer-img">
                        </div>
                        <div class="col-2">
                            <p> Exclusively Available on Hosny rental</p>
                            <h1>smart bike 2</h1>
                            <div class="rating">
                                <?php
                                for ($i = 0; $i < intval($row['product_rate']) - 1; $i++) {
                                    ?>
                                    <i class="fa fa-star"></i>

                                    <?php
                                }
                                ?>
                                <?php
                                if (sizeof(explode(".", $row['product_rate'])) > 0) {
                                    ?>
                                    <i class="fas fa-star-half-alt"></i>
                                    <?php
                                }
                                ?>
                            </div>
                            <p>$<?php echo $row['product_price'] ?>.00</p>
                            <small> There is a Special product We worked on it discounts and have a battery 8000
                                Watts </small>
                            <div class="btt"><a class="btn" href="./rent.php?id=<?php echo $row['product_id'] ?>">Rent &#8594</a></div>


                        </div>


                    </div>
                    <?php
                }
            }
        }
        ?>


    </div>


</div>
</body>

</html>