<?php
include("../Data/Table_PDO.php");
session_start();
$categories = new Upload();
if (isset($_POST["submit"]))
{
    echo "<p>" . $_POST['file'] . " => file input successfull</p>";
    $target_dir = "../Sound/";
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (move_uploaded_file($file_tmp, $target_dir . $file_name)) {
        echo "<h1>File Upload Success</h1>";
        $upload=new Upload();
        $upload->Insert(array($target_dir . $file_name,$_POST["description"],$_POST["select"],$_SESSION["ID"]));
    } else {
        echo "<h1>File Upload not successfull</h1>";
    }
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="../CSS/FormStyle.css" rel="stylesheet" />
</head>
<body>
    <div class="Column">
        <form action="Upload.php" method="post" enctype="multipart/form-data">
            <div class="Row">
                <label>
                    <?php echo$_SESSION["ID"]?>
                </label>
            </div>
            <div class="Row">
                <input type="file" name="file" value="" />
            </div>
            <div class="Row">
                <label>Description:</label>
                <input type="text" name="description" value=""/>
            </div>
            <div class="Row">
                <label>Category:</label>
                <select name="select">
                    <?php
                    foreach ($categories->GetAllCategories() as $value)
                    {
                	?> <option value="<?php echo $value[1]?>"><?php echo $value[0]?></option> <?php
                    }
                    ?>
                </select>
            </div>
            <div class="Row">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
