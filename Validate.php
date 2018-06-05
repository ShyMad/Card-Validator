<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 13/04/2017
 * Time: 01:58
 */
ini_set("display_errors",0);error_reporting(0);

?>
<html>
<head>
    <title>Validate Card</title>
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
<?php

if( ! empty($_POST))
{
    extract($_POST);
    var_dump($at);
    $cardclass = new stdClass;
    $cardclass->number=$cn;
    $cardclass->expiryDate=$ed;
    $cardclass->controlNumber=$vn;
    $cardclass->type=$type;

    $card= array('number'=>$cn,'expiryDate'=>$ed,'cn'=>$vn,'type'=>$type);
    var_dump($card);
    $client = new SoapClient("http://31ad05b7.ngrok.io/ApplicationCreditCardValidator/CreditCardWS?wsdl");
    var_dump($client->__getTypes());
    $result=$client->validate(array('entity'=>$card),array('token'=>$at));
    if($result->return==1){
        echo "la carte de crédit n° ".$cardclass->number." est valide.";
    }else
    {
        echo "la carte de crédit n° ".$cardclass->number." n'est pas valide.";
    }
    //echo "Le résultat de la validation de votre carte est = ".$result;
    echo "<a href=index.php>Revenir à la page d'acceuil</a>";
}else {

?>
<div class="container body-content">

    <br/><br/><br/>

    <form class="form-horizontal" method="post">
        <fieldset>
            <legend>Card Informations</legend>

            <div class="form-group">
                <label for="CardNumber" class="col-lg-2 control-label">Card Number</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="cn" id="inputCn" placeholder="15861...">
                </div>
            </div>
            <div class="form-group">
                <label for="ExparyDate" class="col-lg-2 control-label">Expary Date</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="ed" id="inputEmail" placeholder="08/17">
                </div>
            </div>
            <div class="form-group">
                <label for="Number" class="col-lg-2 control-label">Verification Number</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="Number" name="vn" placeholder="###">
                </div>
            </div>
            <div class="form-group">
                <label for="Type" class="col-lg-2 control-label">Type</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="Type" name="type" placeholder="Visa">
                </div>
            </div>
            <div class="form-group">
                <label for="Token" class="col-lg-2 control-label">Token</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="Token" name="at">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Validate</button>
                </div>
            </div>
        </fieldset>
    </form>
    <?php
    }
    ?>
    <hr/>
    <footer>
        <p>&copy; Card Validator in PHP</p>
    </footer>
</div>
</body>
</html>
