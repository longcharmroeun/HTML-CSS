<?php
require "../Config/Database.php";
$data=new Database();
$tmp= $data->SearchName($_REQUEST["Search"],$_REQUEST["Page"],5);
echo json_encode($tmp);
?>