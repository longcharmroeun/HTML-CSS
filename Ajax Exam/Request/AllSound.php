<?php
require "../Config/Database.php";
$data=new Database();
$tmp= $data->GetAllSound($_REQUEST["Page"],5);
echo json_encode($tmp);
?>