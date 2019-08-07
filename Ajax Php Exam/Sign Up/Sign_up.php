<?php
require ('../../vendor/autoload.php');
include("../Data/Table_PDO.php");
session_start();
$Invalid_Captcha=false;
if (isset($_POST["register"]))
{
    if ($_SESSION['phrase']==$_POST['captcha'])
    {
        $signup = new Signup();
        $signup->Insert(array($_POST["email"],$_POST["password"]));
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
                <img src="<?php echo $builder->inline(); ?>" />
                <?php echo $builder->getPhrase();?>
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
