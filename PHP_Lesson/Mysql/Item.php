<?php
require_once('Connection.php');
/**
 * Item short summary.
 *
 * Item description.
 *
 * @version 1.0
 * @author Long charmroeun
 */
function GetIteminfo(){

}

function Insert()
{
    $produce = new PDO("mysql:host=127.0.0.1;dbname=invoice","root","");
    $tmp = $produce->prepare("INSERT INTO `produce` (`Name`,`Price`,`Stock`) VALUES (?,?,?)");
    $tmp->execute(array("Hello1",20,20));
}
$produce = new Produces("mysql:host=127.0.0.1;dbname=invoice","root","");
$produce->Insert(array("Hello1",20,20));
//Insert();