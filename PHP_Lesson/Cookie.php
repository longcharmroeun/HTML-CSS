<?php

ob_start();
echo "Hello\n";

//setcookie("cookiename", "cookiedata");
echo $_COOKIE['cookiename'];
ob_end_flush();

?>