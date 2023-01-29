<?php
session_start();
require_once './DBcontroller.php';
$dbClass = new DBcontroller;
$connect = $dbClass->connect();
function getUserByData($data)
{
    global $dbClass;
    $query = $dbClass->querySelect('tbl_users', '', "{$data}", true, null);
    $result = $dbClass->getAll($query);
    if ($result['status'] > 0) {
        if ($result['query']->num_rows > 0) {
            $data = $dbClass->fetch($result['query'], $result['status'])['data'];
            return array('data' => $data, 'status' => 1);
        } else {
            return array('text' => 'there data for this user', 'status' => 0);
        }
    } else {
        return array('text' => 'there is no user', 'status' => 0);
    }
}
function login($username, $password)
{
    $data = getUserByData(" user_email='$username' and password='{$password}'");
    if ($data['status'] == 1) {
        if (sizeof($data) > 0) {
            if ($password == $data['data']['password']) {
                $_SESSION['user']['data'] = $data['data'];
                $_SESSION['user']['login_status'] = true;
                $_SESSION['user']['start'] = time();
                // taking now logged in time
                $_SESSION['user']['expire'] = $_SESSION['user']['start'] + (5 * 60);
                return $_SESSION['user']['data'];
            } else {
                return 'incorrect username/password';

            }
        } else {
            return 'there is no profile';

        }
    } else {
        return $data;
    }
    return $data;
}
