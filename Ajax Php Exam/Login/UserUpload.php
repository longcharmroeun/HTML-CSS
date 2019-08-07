<?php
include("../Data/Table_PDO.php");
session_start();
$data=new Upload();
$tmp= $data->GetUserUploadFile($_SESSION["ID"],$_REQUEST["Page"],5);
echo json_encode($tmp);
?>