<?php

require_once './DBcontroller.php';
$dbClass = new DBcontroller;
$connect = $dbClass->connect();

function register($first_name,$last_name,$email, $password)
{
    global $dbClass;
    $password = md5($password);
    $sql = $dbClass->queryInsert('tbl_users', 'first_name, last_name, user_email, password', "'{$first_name}','{$last_name}',  '{$email}', '{$password}'");
    $result = $dbClass->insertQuery($sql);

    if ($result['status'] > 0) {
        return array('text' =>'create user success', 'status'=>1);


    } else {
        return array('text' =>'error create user', 'status'=>0);

    }
}


if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $register = register($_POST['first_name'], $_POST['last_name'],$email, $password);

    if (isset($register['status'])) {
        header('location: ./index.php?success');
        echo '<script type="text/javascript">';
        echo 'alert("Password Invalid!")';
        echo '</script>';

    } else {

        header('location: ./index.php?fail');

    }
}