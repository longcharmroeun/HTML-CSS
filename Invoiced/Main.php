<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <?php include('Model/Trait1.php');
          include('Model/Data.php');
          include('Model/Form.php');
          $ID=count(Trait1::LoadData('Model/Produce.txt'));
    ?>
    <script src="JavaScript1.js"></script>
    <link rel="stylesheet" href="Formstyle.css" />
</head>
<body onload="GetDate()">
    <?php
if (isset($_POST[submit]))
{
    Trait1::Submit();
}
elseif (isset($_POST['history']))
{
    $table=Trait1::LoadData('Model/hello.txt');
    $startdate=new Date();
    $startdate->day=date('d');
    $startdate->month=date('m');
    $startdate->year=date('Y');

    $enddate=new Date();
    $enddate->day=date('d');
    $enddate->month=date('m');
    $enddate->year=date('Y');
    Form::History($startdate,$enddate,$table);
}

elseif (isset($_POST['gettotal']))
{
    preg_match('/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})/',$_POST['start'],$start);
    $table=Trait1::LoadData('Model/hello.txt');
    $startdate=new Date();
    $startdate->day=$start[2];
    $startdate->month=$start[1];
    $startdate->year=$start[3];

    preg_match('/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})/',$_POST['end'],$end);
    $enddate=new Date();
    $enddate->day=$end[2];
    $enddate->month=$end[1];
    $enddate->year=$end[3];
    Form::History($startdate,$enddate,$table);
}
elseif (isset($_POST['add_produce']))
{
	Form::Add_Produce();
}

elseif (isset($_POST['produce_submit']))
{
    $stock = new Stock($_POST['produce_stock']);
    $produce=new Product($_POST['produce_name'],$_POST['produce_price'],$stock,$ID);
    Trait1::Save($produce,'Model/Produce.txt');
    Form::Add_Produce();
}

elseif (isset($_POST['produce_list']))
{
    Form::Produce_list(Trait1::LoadData('Model/Produce.txt'));
}

elseif (isset($_POST['search_by_id']))
{
    Form::Update_produce(Trait1::SearchByID($_POST['id']));
}

elseif (isset($_POST['produce_update']))
{
    if ($_POST['produce_id']==$ID-1)
    {
    	Trait1::FileReplaceByLine('Model/Produce.txt',$_POST['produce_id'],json_encode(new Product($_POST['produce_name'],$_POST['produce_price'],new Stock($_POST['produce_stock']),$_POST['produce_id'])),false);
    }
    elseif ($_POST['produce_id']>=$ID)
    {
        echo 'This ID Not Found!';
    }

    else
    {
    	Trait1::FileReplaceByLine('Model/Produce.txt',$_POST['produce_id'],json_encode(new Product($_POST['produce_name'],$_POST['produce_price'],new Stock($_POST['produce_stock']),$_POST['produce_id'])).',',false);
    }
    Form::Produce_list(Trait1::LoadData('Model/Produce.txt'));
}

else
{
    Form::MainForm();
}
    ?>
</body>
</html>
