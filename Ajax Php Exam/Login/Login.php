<?php
require ('../../vendor/autoload.php');
include("../Data/Table_PDO.php");
session_start();
$Invalid_Captcha=false;
if (isset($_POST["login"]))
{
    if ($_SESSION['phrase']==$_POST['captcha'])
    {
        $signup = new Signup();
        $data = $signup->Login($_POST["email"],$_POST["password"]);
        if ($data!=null)
        {
            $_SESSION["Email"]=$data[0][1];
            $_SESSION["ID"]=$data[0][0];
        	header("Location: Main.php");
            exit();
        }
        else
        {
        	echo "Invalid Login!";
        }

    }
    else
    {
    	$Invalid_Captcha=true;
    }
}

use Gregwar\Captcha\CaptchaBuilder;
$builder = new CaptchaBuilder;
$builder->build();
$_SESSION['phrase'] = $builder->getPhrase();
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
                <img src="<?php echo $builder->inline(); ?>" />
                <?php echo $builder->getPhrase();?>
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
