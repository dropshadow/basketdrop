<?php

include("connection.php");

$action = $_POST['action'];

// get current date and time
date_default_timezone_set('Asia/Calcutta');
$creatred_at = date('d/m/Y h:i:s a', time());

switch ($action) {
    case 'loadbasket1':
        $result = mysql_query("select * from users");
        if ($result) {
            $jsonData = array();
            while ($array = mysql_fetch_row($result, MYSQL_ASSOC)) {
                $jsonData[] = $array;
            }
            foreach ($jsonData as $key => $value) {
                $row_array['id'] = $value['id'];
                $row_array['user_name'] = $value['user_name'];
            }
            array_push($jsonData, $row_array);
            echo json_encode($jsonData);
        }

        else
            echo mysql_error();
        break;
    case 'loadbasket2':
        $result = mysql_query("select * from user_group");
        if ($result) {
            $jsonData = array();
            while ($array = mysql_fetch_row($result, MYSQL_ASSOC)) {
                $jsonData[] = $array;
            }
            foreach ($jsonData as $key => $value) {
                $row_array['id'] = $value['id'];
                $row_array['group_name'] = $value['group_name'];
            }
            array_push($jsonData, $row_array);
            echo json_encode($jsonData);
        }

        else
            echo mysql_error();
        break;
    default:
        break;
}
?>