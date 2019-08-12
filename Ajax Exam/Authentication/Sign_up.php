<?php
require ('../../vendor/autoload.php');
include("../Config/Database.php");
$Invalid_Captcha=false;
if (isset($_POST["register"]))
{
    if ($_SESSION['phrase']==$_POST['captcha'])
    {
        $signup = new Database();
        $signup->SignUp(array($_POST["email"],$_POST["password"]));
    }
    else
    {
        $signup = new Database();
        $signup->SignUp(array($_POST["email"],$_POST["password"]));
    	$Invalid_Captcha=true;
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
        <form action="Sign_up.php" method="post">
            <div class="Row">
                <label>Email:</label>
                <input type="text" name="email" value="" />
            </div>
            <div class="Row">
                <label>Password:</label>
                <input type="password" name="password" value="" />
            </div>
            <div class="Row">
                <img src="http://localhost:45903/Ajax%20Exam/Captcha.php?XDEBUG_SESSION_START=CE9CF129" style="margin-right:20px;border:solid" id="new_captcha" />
                <input type="text" name="captcha" value="" />
                <label style="color:#b01f1f"><?php if ($Invalid_Captcha)
                             {
                             	echo"Invalid Captcha!";
                             }
                             ?>
                </label>
            </div>
            <div class="Row">
                <button type="submit" name="register">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>
