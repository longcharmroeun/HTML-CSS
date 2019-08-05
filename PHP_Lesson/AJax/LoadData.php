<?php
try
{
    require_once "Data.php";
	$produce=new SqlTable("mysql:host=127.0.0.1;dbname=invoice","root","");
    $result=$produce->GetData($_REQUEST["start_ID"],5);

    echo json_encode($result);
}
catch (Exception  $exception)
{
}
?>