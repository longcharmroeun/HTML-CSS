<?php
session_start();
include("../Config/Database.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="../CSS/FormStyle.css" rel="stylesheet" />
    <script src="../JavaScrip/Ajax.js"></script>
</head>
<body onload="loadDoc()">
    <div class="Column">
        <div class="Row">
            <label class="Row Head QTY">ID</label>
            <label class="Row Head Name">Pathfile</label>
            <label class="Row Head Name">Description</label>
            <label class="Row Head QTY">Category</label>
            <label class="Row Head Name">Play</label>
        </div>
        <div id="Table"></div>
        <div class="Row">
            <button onclick="loadDoc()" type="button" id="button">More</button>
        </div>
    </div>
</body>
</html>
