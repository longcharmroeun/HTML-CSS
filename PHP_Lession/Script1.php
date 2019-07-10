<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <style>
        div.form {
            line-height: 40px;
            border-radius: 5px;
            border: solid darkblue;
            text-align: center;
        }

        .form input {
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <?php
    use SebastianBergmann\CodeCoverage\Node\Builder;
    use Gregwar\Captcha\CaptchaBuilder;
    if (isset($_POST['Submit']))
    {
        echo ''.$_POST['FirstName'];

        $builder = new CaptchaBuilder();
        $builder->build();
        $builder->save('hello.jpg');
    }
    else{
    ?>
    <div class="form">
        <form action="Script1.php" method="post">
            FirstName:
            <input type="text" name="FirstName" value="" />
            <br />
            LastName:
            <input type="text" name="LastName" value="" />
            <br />
            Email:
            <input type="text" name="Email" value="" />
            <br />
            Password:
            <input type="text" name="Password" value="" />
            <br />
            <input type="submit" name="Submit" value="Submit" />
        </form>
    </div>
    <?php
    }
    ?>
</body>
</html>
