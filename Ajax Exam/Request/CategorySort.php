<?php
require "../Config/Database.php";
$data=new Database();
$tmp= $data->CategorySort($_REQUEST["CategoryID"],$_REQUEST["Page"],5);
echo json_encode($tmp);
?>