<?php
session_start();

require_once './DBcontroller.php';
$dbClass = new DBcontroller;
$connect = $dbClass->connect();
if (!isset($_SESSION['user']['data']['user_id'])) {

    header('location: ./index.php');
}
function getproduct($id)
{
    global $dbClass;
    $query = $dbClass->querySelect('tbl_product', '', 'product_id=' . $id, true, null);
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

function getproducts()
{
    global $dbClass;
    $query = $dbClass->querySelect('tbl_product', '', null, false, null);
    $result = $dbClass->getAll($query);
    if ($result['status'] > 0) {
        if ($result['query']->num_rows > 0) {
            $data = $dbClass->fetchAll($result['query'], $result['status']);
            return array('data' => $data, 'status' => 1);
        } else {
            return array('text' => 'there data for this user', 'status' => 0);
        }
    } else {
        return array('text' => 'there is no user', 'status' => 0);
    }
}

function rent_action(array $data)
{
    global $dbClass;
    if (!is_array($data)) {
        return false;
    }
    $sql = $dbClass->queryInsert(
        'tbl_rent_details',
        'de_phone, de_ccn, de_type_bike, de_sn_bike, start_date, end_date',
        "'{$data['phone']}', '{$data['ccn']}', '{$data['product_type']}', '{$data['product_sn']}', '{$data['start_date']}', '{$data['end_date']}' "
    );
    $result = $dbClass->insertQuery($sql);
    if ($result['status']  > 0) {
        $lastId = $dbClass->lastInsertId();
        $sql2 = $dbClass->queryInsert('tbl_rent', 'product_id, user_id, rent_details', "{$data['product_id']}, {$data['user_id']}, {$lastId}");
        $result2 = $dbClass->insertQuery($sql2);
        if ($result2['status']  > 0) {
            return 'success';
        } else {
            return 'error';
        }
    }
    return $data;
}
