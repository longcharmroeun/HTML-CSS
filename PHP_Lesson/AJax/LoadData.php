<?php
try
{
    require_once "Data.php";
	$produce=new Produces("mysql:host=127.0.0.1;dbname=invoice","root","");
    $result=$produce->GetData();
    if ($_REQUEST["start_ID"]<count($result))
    {
    	if (count($result)-$_REQUEST["start_ID"]>=5)
        {
        	for ($i = $_REQUEST["start_ID"]; $i < $_REQUEST["start_ID"]+5; $i++)
            {
?>
<div class="Row">
    <label class="Row Head QTY Body">
        <?php echo $result[$i]["ID"]?>
    </label>
    <label class="Row Head Name Body">
        <?php echo $result[$i]["Name"] ?>
    </label>
    <label class="Row Head Unit-Price Body">
        <?php echo $result[$i]["Price"]?>
    </label>
    <label class="Row Head QTY Body">
        <?php echo $result[$i]["Stock"]?>
    </label>
</div>
<?php
            }
        }
        else
        {
        	for ($i = $_REQUEST["start_ID"]; $i < count($result); $i++)
            {
?>
<div class="Row">
    <label class="Row Head QTY Body">
        <?php echo $result[$i]["ID"]?>
    </label>
    <label class="Row Head Name Body">
        <?php echo $result[$i]["Name"] ?>
    </label>
    <label class="Row Head Unit-Price Body">
        <?php echo $result[$i]["Price"]?>
    </label>
    <label class="Row Head QTY Body">
        <?php echo $result[$i]["Stock"]?>
    </label>
</div>
<?php
            }
        }
    }
    else
    {
    	echo "id out of rand";
    }
}
catch (Exception  $exception)
{
}
?>