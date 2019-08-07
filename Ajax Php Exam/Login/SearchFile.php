<?php
include("../Data/Table_PDO.php");
session_start();
$data=new Upload();
$tmp= $data->SearchName($_REQUEST["Search"]);
echo json_encode($tmp);
?>