<!DOCTYPE html>
<html>
<head>
    <title>Card Manager</title>
</head>
<body>
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
    $client = new SoapClient("http://yassalie-pc:8080//ApplicationCreditCardValidator/CreditCardWS?wsdl");
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
}else
{
    ?>
    <h4>Enregistrer vous</h4>
    <form action="cardManager.php" method="POST">
        <label>Credit card Number : </label><br>
        <input type="text" name="cn"><br>

        <label>Expiry Date : </label><br>
        <input type="date" name="ed"><br>

        <label>Type : </label><br>
        <input type="text" name="type"><br>

        <label>Verification number : </label><br>
        <input type="text" name="vn"><br>

        <label>Access Token : </label><br>
        <input type="text" name="at"><br>

        <input type="submit" value="Valider">
    </form>

    <?php
}
?>

</body>
</html>