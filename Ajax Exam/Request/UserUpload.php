<?php
session_start();
require "../Config/Database.php";
$data=new Database();
$tmp= $data->GetUserUploadFile($_REQUEST["Page"],5,$_SESSION["token"]);
echo json_encode($tmp);
?>