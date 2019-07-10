<?php
setcookie("Name","123123123123123",time+60*60,'/cookie/','hello.com',true,false);
echo $_COOKIE['Name'];
echo '<br>';

session_start();
echo 'id='.session_id().'<br>';
?>