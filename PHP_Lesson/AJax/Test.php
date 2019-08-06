<?php
if (isset($_POST["PDF"]))
{
    echo $_POST['captcha'].'<br>'.$_SESSION['phrase'];
	if ($_SESSION['phrase']==$_POST['captcha'])
    {
        echo "asdasssssssssssssss";
    }

}

?>