<?php
session_start();
require_once './DBcontroller.php';
$dbClass = new DBcontroller;
$connect = $dbClass->connect();
if (isset($_POST['submit'])) {
    $sql = $dbClass->queryInsert(
        'tbl_contact_messages',
        ' full_name, email, message',
        "'{$_POST['full_name']}', '{$_POST['email']}', '{$_POST['message']}'"
    );
    $result = $dbClass->insertQuery($sql);
    if ($result['status']  > 0) {
        header('location: ./index.php');
    } else {
        header('location: ./contact-us.php');
    }
}
$full_name = '';
$email = '';
if (isset($_SESSION['user']['data']['user_id'])) {
    $full_name = $_SESSION['user']['data']['first_name'] . " " . $_SESSION['user']['data']['last_name'];
    $email = $_SESSION['user']['data']['user_email'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>contactus </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="./css/contactus.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav>
        <ul>
            <li> <a class="active" href="./index.php">Back</a></li>
        </ul>
        <h1>Contact Us</h1>
    </nav>
    <section class="contact">
        <div class="content">
            <h2></h2>
            <p> </p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3> Address</h3>
                        <p>Nablus,<br>Salem village,<br>Street Girls Salem High School,<br> Qusay's clinic </p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3> Phone</h3>
                        <p>0598060757</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3> Email</h3>
                        <p>hosnyish812@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form method="POST">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="full_name" required="required" value="<?php echo $full_name ?>">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="email" required="required" value="<?php echo $email ?>">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <textarea name="message" required="required"></textarea>
                        <span>your message..</span>
                    </div>
                    <div class="inputBox">
                        <div class="sub"><input type="submit" name="submit" value="Send"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>