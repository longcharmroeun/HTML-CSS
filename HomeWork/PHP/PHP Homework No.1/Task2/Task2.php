<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <script>
function startTime() {
    document.getElementById('timer').innerHTML = formatAMPM(new Date());
    setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i}; 
    return i;
    }
function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var second = date.getSeconds();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = checkTime(minutes);
    second = checkTime(second);
    var strTime = hours + ':' + minutes + ':' + second + ' ' + ampm;
  return strTime;
}
</script>
    <style>
        body {
            background-color: ThreeDDarkShadow;
        }

        a {
            text-decoration: none;
        }

        .Column {
            background-color: whitesmoke;
            border-radius: 10px;
            justify-content: center;
            display:inline-flex;
            flex-direction: column;
            align-items: center;
            padding:10px;
            margin:auto;  
            font-family:'Segoe UI';
        }

        .Row {
            background-color: whitesmoke;
            justify-content: center;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

            .Row.Time {
                padding-bottom:7px;
                font-size: 30px;
                color: #4776a9;
                font-weight: bold;
                vertical-align: central;
            }

            .Row.DropDown {
                border: solid darkgray;
                border-radius: 5px;
                padding: 5px 15px;
                color: gray;
                font-size: 14px;
                margin-right: 4px;
            }

            .Row.Button input[type=submit]{
                background-color: #e6bb6e;
                cursor: pointer;
                border: solid darkgray;
                border-radius: 5px;
                padding: 5px 15px;
                color: gray;
                font-size: 14px;
                margin-right: 4px;
            }

                .Row.Button input:hover {
                    background-color:#e73d71;
                }

            .Row.DayOfWeek {

                width: 100px;
                border:solid #ded7cf;
                background-color: #f1f6fa;
                color: #5a5f62;
                font-size: 20px;
                border-radius: 10px;
                height: 40px;
                margin: 4px;
            }

            .Row.DayOfWeek.DayNumber{
                height: 80px;
            }

            .Row.DayOfWeek.DayNumber.Count {
                    width: 25px;
                    height: 25px;            
                    color:white;
                    margin-left:70px;
                    margin-bottom:50px; 
                }

            .Row.DayOfWeek.DayNumber.OnToday {
                background-color: cornflowerblue;
            }

            .Row.DayOfWeek.DayNumber.Count.OnToday.Number{  
                 border:solid #212227;
                 background-color:#97889a;
                }

            .Row.DayOfWeek.DayNumber.On {
                background-color: #1bd2c7;
            }
            .Row.DayOfWeek.DayNumber.Count.On.Number {
                   background-color: darkgray;         
                }

            .Row.DayOfWeek.DayNumber.Off {
                 background-color: whitesmoke;
            }
    </style>
</head>
<body onload="startTime()">
    <div class="Column">

        <div class="Row">
            <div class="Row Time" id="timer">24</div>
        </div>

        <div class="Row">
          <form action="Task2.php" method="post" class="Row">
          <select name="month" class="Row DropDown">
          <?php
          if ($_POST['month']!=null)
          {
          	$selected = $_POST['month'];
          }
          else $selected = date('m');        
?>
          <option value="1" <?php if($selected == '1'){echo("selected");}?>>January</option>
          <option value="2" <?php if($selected == '2'){echo("selected");}?>>February</option>
          <option value="3" <?php if($selected == '3'){echo("selected");}?>>March</option>
          <option value="4" <?php if($selected == '4'){echo("selected");}?>>April</option>
          <option value="5" <?php if($selected == '5'){echo("selected");}?>>May</option>
          <option value="6" <?php if($selected == '6'){echo("selected");}?>>June</option>
          <option value="7" <?php if($selected == '7'){echo("selected");}?>>July</option>
          <option value="8" <?php if($selected == '8'){echo("selected");}?>>August</option>
          <option value="9" <?php if($selected == '9'){echo("selected");}?>>September</option>
          <option value="10" <?php if($selected == '10'){echo("selected");}?>>October</option>
          <option value="11" <?php if($selected == '11'){echo("selected");}?>>November</option>
          <option value="12" <?php if($selected == '12'){echo("selected");}?>>December</option>
        </select>
            <select name="year" class="Row DropDown">
          <?php
          if ($_POST['year']!=null)
          {
          	$selected = $_POST['year'];             
          }
          else $selected = date('Y');          
          for ($i = 1900; $i < 2156; $i++)
          {
          	?> <option value="<?php echo $i ?>" <?php if($selected == $i){echo("selected");}?>><?php echo $i?></option> <?php
          }
          
?>
          
        </select>
            <div class="Row Button">
            <input type="submit" name="submit" value="Show" />
            </div>
          </form>
        </div>

        <div class="Row" style="margin-top: 20px">
            <div class="Row DayOfWeek">Sunday</div>
            <div class="Row DayOfWeek">Monday</div>
            <div class="Row DayOfWeek">Tuesday</div>
            <div class="Row DayOfWeek">Wendesday</div>
            <div class="Row DayOfWeek">Thusday</div>
            <div class="Row DayOfWeek">Friday</div>
            <div class="Row DayOfWeek">Saturday</div>
        </div>

        <?php
        if (isset($_POST['submit']))
        {
            $month = $_POST['month'];
            $year = $_POST['year'];
        }
        else
        {
        	$month = date('n');
            $year = date('Y');
        }
        
        
        include('_date.php');
        $dayofweek = date('w', strtotime($month.'/01/'.$year));
        $counter=0;
        $daynumber=1;
        $isend=false;
        for ($i = 0; $i < 6; $i++)
        {
            if ($isend)
            {
            	break;
            }
            
        	?>
            <div class="Row">
            <?php
            for ($j = 0; $j < 7; $j++)
            {
                if ($counter++>=$dayofweek)
                {
                    if (_date::MonthToDaynumber($month,$year)>=$daynumber)
                    {
                        if ($month==date('n') && $year == date('Y') && $daynumber==date('d'))
                        {
                        	?> 
<div class="Row DayOfWeek DayNumber OnToday"> <?php
                              ?> 
                          <div class="Row DayOfWeek DayNumber Count OnToday Number"><?php echo $daynumber++;?></div>
                        <?php
                        ?> </div> <?php
                        }
                        else
                        {
                        	?> 
<div class="Row DayOfWeek DayNumber On"> <?php
                              ?> 
                          <div class="Row DayOfWeek DayNumber Count On Number"><?php echo $daynumber++;?></div>
                        <?php
                        ?> </div> <?php
                        }
                        
                    }
                    else
                    {
                        if ($j==0)
                        {
                        	break;
                        }
                        
                        ?> 
<div class="Row DayOfWeek DayNumber Off"> </div> <?php  
                        $isend=true;                     
                    }                 
                }
                else
                {
                	?> 
<div class="Row DayOfWeek DayNumber Off"> </div> <?php
                }               
            }            
            ?>
        </div>
            <?php
        }
        
        ?>
    </div>
</body>
</html>
