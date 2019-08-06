<?php
require_once('../../vendor/autoload.php');
require_once("Test.php");
session_start();
if (isset($_POST["PDF"]))
{
    if ($_SESSION['phrase']==$_POST['captcha'])
    {
        pdf();
    }
}
?>
<?php
use Gregwar\Captcha\CaptchaBuilder;
$builder = new CaptchaBuilder;
$builder->build();
$_SESSION['phrase'] = $builder->getPhrase();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title id="hello"></title>
    <script src="Ajax.js"></script>
    <link href="FormStyle.css" rel="stylesheet" />
</head>
<body onload="loadDoc()">
    <div class="Column">
        <div class="Row">
            <div class="Row Head QTY">ID</div>
            <div class="Row Head Name">Name</div>
            <div class="Row Head Unit-Price">Price</div>
            <div class="Row Head QTY">Stock</div>
        </div>
        <div id="table"></div>
        <div class="Row">
            <button onclick="loadDoc()" type="button" id="button">More</button>
        </div>
        <div class="Row">
            <input id="name" value="" placeholder="Name" />
            <input id="price" value="" placeholder="Price" />
            <input id="stock" value="" placeholder="Stock" />
        </div>
        <div class="Row">
            <button type="button" onclick="insert()">Insert</button>
        </div>
        <form action="PDF.php" method="post">
            <div class="Row">
                <img src="<?php echo $builder->inline(); ?>" />
                <?php echo $builder->getPhrase();?>
                <input type="text" name="captcha" value="" />
            </div>
            <div class="Row">
                <button type="submit" name="PDF">ViewPDF</button>
            </div>
        </form>
    </div>
</body>
</html>