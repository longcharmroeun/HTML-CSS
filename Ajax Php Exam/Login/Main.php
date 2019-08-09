<?php
session_start();
if (isset($_POST["upload"]))
{
	header("Location: Upload.php");
    exit();
}
elseif (isset($_POST["view_my_upload"]))
{
	header("Location: ViewMyUpload.php");
    exit();
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="../CSS/FormStyle.css" rel="stylesheet" />
    <script src="../JavaScrip/MainAjax.js"></script>
</head>
<body onload="loadDoc()">
    <div class="Column">
        <div class="Row">
            <label>
                <?php echo "Email: ".$_SESSION["Email"]."  ID:".$_SESSION["ID"]?>
            </label>
        </div>
        <form action="Main.php" method="post">
            <div class="Row">
                <button type="submit" name="upload">Upload</button>
                <button type="submit" name="view_my_upload">View My Upload</button>
                <input type="search" id="search" oninput="Search(this)" value="" placeholder="Search"/>
            </div>
          
        </form>
        <div class="Row">
            <label class="Row Head QTY">ID</label>
            <label class="Row Head Name" style="width:300px">Pathfile</label>
            <label class="Row Head Name">Play</label>
        </div>
        <div id="Table"></div>
        <div class="Row">
            <button onclick="loadDoc()" type="button" id="button">More</button>
        </div>
    </div>
</body>
</html>