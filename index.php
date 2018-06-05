<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 12/04/2017
 * Time: 15:21
 */
/*
$ngrok = "https://f3627264.ngrok.io";
$path="/ApplicationCreditCardValidator/CreditCardWS?wsdl";
$url = $ngrok.$path;
$client = new soapClient($url);

$cn = $_POST["cn"];
$exparyDate = $_POST["exparyDate"];
$number = $_POST["number"];
$type = $_POST["type"];
$token = $_POST["token"];


//$crd = new stdClass();
$card = new stdClass;
$card->number='44444';
$card->expiryDate='15/12/2017';
$card->controlNumber=111;
$card->type='Visa';

/*$params = array(array("number"=>"44444",
			"expiryDate"=>"5/12",
			"controlNumber"=>111,
			"type"=>"Visa"));*/
//var_dump($card);
//$result=$client->validate(array("creditCard"=>$card));

//
/*
$card = array(
    "id" => null,
    "cn" => $cn,
    "exparyDate" => $exparyDate,
    "number" => $number,
    "type" => $type
);

$tkn = array( "token" => $token );
/*
$crd->cn = $cn;
$crd->exparyDate = $exparyDate;
$crd->number = $number;
$crd->type = $type;
$crd->id = null;
*/
/*
var_dump($card);

$tkon = "34a0ef83e85b4fb1f701797e2f810a1841af06fb";
var_dump($tkon);
if(isset($_POST["submit"])){
   $var =  $client->validate(array("creditCard"=>$card,"token"=>$tkon));
    var_dump($var);
}
*/
ini_set("display_errors",0);error_reporting(0);

    ?>
    <html>
    <head>
        <title>CC Validator</title>
        <link rel="stylesheet" href="Css/Darky.css" type="text/css">
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">CC Validator</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Validate.php">Validate</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">
        <div class="jumbotron">
            <br><br><br><br>
            <h1>Credit Card Validator</h1><br><br>
            <p class="lead">Credit Card Validator is a web-service that use a secure methode in order to validate your card</p>
            <p><a href="Validate.php" class="btn btn-primary btn-lg">Try it &raquo;</a></p>
        </div>
        <hr/>
        <footer>
            <p>&copy; Card Validator in PHP</p>
        </footer>
    </div>
    </body>
    </html>
