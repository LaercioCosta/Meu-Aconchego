<?php

MercadoPago\SDK::setAccessToken("APP_USR-1422372214464850-101618-40348fbdc037c4104bd49aed533a9dfe-242353619");
$payment = MercadoPago\Payment::find_by_id($_POST["data"]["id"]);
$payment->{'status'};

$fp = fopen ('log.txt', 'a');
$html='';
foreach($_POST as $value => $key){
	$html.=$key.'=>'.$value.'|';
}
$writer = fwrite($fp, $html);
fclose($fp);

?>
