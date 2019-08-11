<?php
require ('../../vendor/autoload.php');
include("../Config/Database.php");
session_start();
$Invalid_Captcha=false;
if (isset($_POST["login"]))
{
    if ($_SESSION['phrase']==$_POST['captcha'])
    {
        $login = new Database();
        $_SESSION["token"] = $login->Login($_POST["email"],$_POST["password"]);
        header("Location: ../Main/Main.php");
        exit();
    }
    else
    {
    	$Invalid_Captcha=true;
        //easy test;
        $login = new Database();
        $_SESSION["token"] = $login->Login($_POST["email"],$_POST["password"]);
        header("Location: ../Main/Main.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="../CSS/FormStyle.css" rel="stylesheet" />
</head>
<body>
    <div class="Column">
        <form action="Login.php" method="post">
            <div class="Row">
                <label>Email:</label>
                <input type="text" name="email" value="" />
            </div>
            <div class="Row">
                <label>Password:</label>
                <input type="password" name="password" value="" />
            </div>
            <div class="Row">
                <img src="http://localhost:45903/Ajax%20Exam/Captcha.php?XDEBUG_SESSION_START=CE9CF129" />
                <input type="text" name="captcha" value="" />
                <label style="color:#b01f1f">
                    <?php if ($Invalid_Captcha)
                          {
                              echo"Invalid Captcha!";
                          }
                    ?>
                </label>
            </div>
            <div class="Row">
                <button type="submit" name="login">login</button>
                <a href="http://localhost/HTML+CSS/Ajax%20Php%20Exam/Sign%20Up/Sign_up.php" style="margin-left:20px">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>
