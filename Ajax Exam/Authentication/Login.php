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
        header("Location: ../Main/Main.php?token=".$_SESSION["token"]);
        exit();
    }
    else
    {
    	$Invalid_Captcha=true;
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="../CSS/FormStyle.css" rel="stylesheet" />
    <script src="../JavaScrip/Login.js"></script>
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
                <img src="../Captcha.php" style="margin-right:20px;border:solid" id="new_captcha"/>
                <input type="text" name="captcha" value="" />
                <button type="button" style="margin-left:20px" onclick="NewCaptcha()">New Captcha</button>
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
                <a href="Sign_up.php" style="margin-left:20px">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>
