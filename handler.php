<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['Name','Email'])->areRequired()->maxLength(50);
$validator->field('Email')->isEmail();
$validator->field('Message')->maxLength(6000);


$pp->requireReCaptcha();
$pp->getReCaptcha()->initSecretKey('6LdNp7EqAAAAANDF-w8NGerdOgGD4bgwe1kEMh2d');


$pp->sendEmailTo('hello@achinbindlish.com'); // ← Your email here

echo $pp->process($_POST);