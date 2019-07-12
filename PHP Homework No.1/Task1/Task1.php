<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style>
        input{
            margin-left:40px;
            margin-top:40px;
        }
    </style>
</head>
<body>
    <?php
    include 'BackgroundColor.php';
    if(isset($_POST['submit'])){
        $backgroundcolor = new BackgroundColor(array($_POST['r'],$_POST['g'],$_POST['b']));
        $backgroundcolor->run();
        ob_start();
        setcookie("RGB", serialize(array($_POST['r'],$_POST['g'],$_POST['b'])));
        ob_end_flush();
    }
    else{
        $ar = unserialize($_COOKIE['RGB']);
    ?>
    <form action="Task1.php" method="post">
        R:
        <input type="text" name="r" value="<?php echo $ar[0]?>" />
        <br />
        G:
        <input type="text" name="g" value="<?php echo $ar[1]?>" />
        <br />
        B:
        <input type="text" name="b" value="<?php echo $ar[2]?>" />
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>
    <?php
    }
    ?>
</body>
</html>
