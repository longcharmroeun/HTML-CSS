<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

            .Column h1 {
                line-height: 12px;
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
                margin-top: 10px;
                border: 1px solid #ddd;
                color: white;
                cursor: pointer;
            }

                .Row button:hover {
                    background-color: royalblue;
                }
            .Row.Display{
                 border:solid 1px #4d70e3;
                 border-radius:2px;
                 padding:10px 20px;
                 margin-top:20px;
                 margin-left:10px;
            }
    </style>
</head>
<body>
    <?php
    include('File.php');
if (isset($_POST['submit']))
{
    if (File::CheckCountryName(File::Word('CountryList.txt'),$_POST['country']))
    {
        File::Save($_POST['country'],'Country.txt');
    }
    else
    {
    	?>
    <div class="Column">
        <h1 style="color:#921d1d">Not Found Country!</h1>
    </div>
        <?php
    }
    

}
    ?>
    <div class="Column">
        <h1>Form</h1>
        <form action="Task2.php" method="post">
            <div class="Row">
                <label>Country: </label>
                <input name="country" value="" placeholder="Cambodia" />
            </div>
            <div class="Row">
                <button type="submit" name="submit">Submit</button>
            </div>
            <div class="Row">Country.txt: 
                <div class="Row Display">
                    <?php
                    foreach(File::Word('Country.txt') as $word) {
                        echo $word.'<br>';
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
