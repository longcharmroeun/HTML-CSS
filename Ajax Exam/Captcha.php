<?php
require ('../vendor/autoload.php');
use Gregwar\Captcha\CaptchaBuilder;
session_start();
$builder = new CaptchaBuilder;
$builder->build();
$_SESSION['phrase'] = $builder->getPhrase();
header('Content-type: image/jpeg');
$builder->output();
?>