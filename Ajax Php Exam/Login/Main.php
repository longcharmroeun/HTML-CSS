<?php session_start();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="../CSS/FormStyle.css" rel="stylesheet" />
</head>
<body>
    <div class="Column">
        <div class="Row">
            <label>
                <?php echo "Email: ".$_SESSION["Email"]."  ID:".$_SESSION["ID"]?>
            </label>
        </div>
        <div class="Row">
            <button type="submit" name="register">Login</button>
        </div>
    </div>
</body>
</html>