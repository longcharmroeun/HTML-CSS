<?php
session_start();
include("../Config/Database.php");
$categories = new Database();
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
                
            </label>
        </div>
        <form action="Main.php" method="post">
            <div class="Row">
                <button type="submit" name="upload">Upload</button>
                <button type="submit" name="view_my_upload">View My Upload</button>
                <input type="search" id="search" oninput="Search(this)" value="" placeholder="Search"/>
                <select onchange="CategorySort(this)" id="select">
                <?php 
                foreach ($categories->GetAllCategories() as $value)
                {
                	?> <option value="<?php echo $value[1]?>"><?php echo $value[0]?></option> <?php
                }     
                ?>
                </select>
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