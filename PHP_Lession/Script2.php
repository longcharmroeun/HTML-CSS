<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style>
        div.form {
            line-height: 40px;
            border-radius: 5px;
            border: solid darkblue;
            width: 50%;
            margin: auto;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.6);
            -moz-box-shadow: 0 0 10px rgba(0,0,0,0.6);
            -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.6);
            transition: width height ease-in 1s;
            background-color:whitesmoke;
        }

            div.form:hover {
               padding:50px;
            }

        body {
            background-color: darkgray;
        }

        .form input {
            margin-left: 20px;
        }

        thead th {
            position: sticky;
            top: 0;
        }

        tbody th {
            position: sticky;
            left: 0;
        }

        th {
            background-color: cornflowerblue;
            padding: 15px;
            width: 100px;
        }

        table {
            border-collapse: collapse;
            left: 0;
            top: 0;
            text-align:center;
        }

        #td1 {
            background-color: blanchedalmond;
            padding: 15px;
            text-align: center;
            width: 100px;
        }

        #td2 {
            background-color: white;
            padding: 15px;
            width: 100px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_POST['Submit'])){
        $ar=array('Apple'=>array('qty'=>$_POST['AppleQ'],'Price'=>$_POST['Apple$']),'Banana'=>array('qty'=>$_POST['BananaQ'],'Price'=>$_POST['Banana$']),'Orange'=>array('qty'=>$_POST['OrangeQ'],'Price'=>$_POST['Orange$']));
    ?>
    <header style="text-align:center;font-size:100px">INVOICED</header>
    <div class="form" style="width:500px">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Totale</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $total=0;
        $count=0;
        foreach ($ar as $key=>$value)
        {
            $count++;
            if ($count%2==0)
            {
                ?>
                <tr>
                    <td id="td1">
                        <?php
                echo $key;
                        ?>
                    </td>
                    <td id="td1">
                        <?php
                echo $value['qty'];
                        ?>
                    </td>
                    <td id="td1">
                        <?php echo '$'.$value['Price']?>
                    </td>
                    <td id="td1">
                        <?php
                echo '$'.($value['Price'] * $value['qty']);
                $total+=($value['Price'] * $value['qty']);
                        ?>
                    </td>
                </tr>
                <?php
            }
            else
            {
                ?>
                <tr>
                    <td id="td2">
                        <?php
                echo $key;
                        ?>
                    </td>
                    <td id="td2">
                        <?php
                echo $value['qty'];
                        ?>
                    </td>
                    <td id="td2">
                        <?php echo '$'.$value['Price']?>
                    </td>
                    <td id="td2">
                        <?php
                echo '$'.($value['Price'] * $value['qty']);
                $total+=($value['Price'] * $value['qty']);
                        ?>
                    </td>
                </tr>
                <?php
            }


        }
                ?>
                <tr style="background-color:palevioletred">
                    <td style="font-weight:bold">Total</td>
                    <td></td>
                    <td></td>
                    <td style="font-weight:bold">
                        <?php echo '$'.$total; ?>
                    </td>
                </tr>
                <?php ?>
            </tbody>
        </table>
    </div>
    <?php
    }
    else{
    ?>
    <div class="form">
        <form action="Script2.php" method="post">
            Apple:
            <input type="text" name="Apple$" value="1.25" />$
            Quality:
            <input type="text" name="AppleQ" value="1" />Unit
            <br />
            Banana:
            <input type="text" name="Banana$" value="2.75" />$
            Quality:
            <input type="text" name="BananaQ" value="1" />Punch
            <br />
            Orange:
            <input type="text" name="Orange$" value="0.85" />$
            Quality:
            <input type="text" name="OrangeQ" value="1" />Unit
            <br />
            <input type="submit" name="Submit" value="Submit" />
        </form>
    </div>
    <?php
    }
    ?>
</body>
</html>

