<?php
include("../Data/Table_PDO.php");
session_start();
$data=new Upload();
$tmp= $data->CategorySort($_REQUEST["CategoryID"],$_REQUEST["Page"],5);
echo json_encode($tmp);
?>