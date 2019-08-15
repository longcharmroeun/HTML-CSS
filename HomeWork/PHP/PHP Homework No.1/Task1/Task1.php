<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <script>
        function LoadColor() {
            var r = document.getElementById("r").value;
            var g = document.getElementById("g").value;
            var b = document.getElementById("b").value;
            document.getElementById("box").style.backgroundColor = 'rgb(' + r + ',' + g + ',' + b +')';
}
    </script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
        }

        .Column {
            background-color: whitesmoke;
            border-radius: 5px;
            justify-content: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            width: 50%;
            margin: auto;
        }

        .Row {
            background-color: whitesmoke;
            justify-content: center;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

            .Row label {
                margin: 5px 10px 5px 0;
            }

            .Row input {
                vertical-align: middle;
                margin: 5px 10px 5px 0;
                padding: 10px;
                background-color: #fff;
                border: 1px solid #ddd;
            }

            .Row button {
                padding: 10px 20px;
                background-color: dodgerblue;
                border: 1px solid #ddd;
                color: white;
                cursor: pointer;
            }

                .Row button:hover {
                    background-color: royalblue;
                }
    </style>
</head>
<body>
    <?php
    include 'BackgroundColor.php';
    if(isset($_POST['submit'])){
        $ar=array($_POST['r'],$_POST['g'],$_POST['b']);
        $backgroundcolor = new BackgroundColor($ar);
        $backgroundcolor->run();
        ob_start();
        setcookie("RGB", serialize($ar));
        ob_end_flush();
    }
    else{
        $ar = unserialize($_COOKIE['RGB']);
    }
    ?>
    <div class="Column">
        <form action="Task1.php" method="post">
            <div class="Row">
                <label>Color RGB:</label>
                <div style="height:20px;width:20px;background-color:rgb(<?php echo $ar[0].','.$ar[1].','.$ar[2]?>)" id="box"></div>
            </div>
            <div class="Row">
                <label>R:</label>
                <input name="r" id="r" value="<?php echo $ar[0]?>" oninput="LoadColor()" placeholder="R" />
            </div>

            <div class="Row">
                <label>G:</label>
                <input name="g" id="g" value="<?php echo $ar[1]?>" oninput="LoadColor()" placeholder="G" />
            </div>

            <div class="Row">
                <label>B:</label>
                <input name="b" id="b" value="<?php echo $ar[2]?>" oninput="LoadColor()" placeholder="B" />
            </div>

            <div class="Row">
                <button type="submit" name="submit">Submit</button>
                <button type="submit" name="clear">Clear</button>
            </div>
        </form>
    </div>
</body>
</html>
