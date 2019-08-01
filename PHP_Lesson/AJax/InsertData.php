<?php
require_once "Data.php";
$produce=new Produces("mysql:host=127.0.0.1;dbname=invoice","root","");
$produce->Insert(array($_REQUEST["name"],$_REQUEST["price"],$_REQUEST["stock"]))
?>