<?php

require('Lib/Alepay.php');

$callbackUrl = 'http://' . $_SERVER['SERVER_NAME'];
if ($_SERVER['SERVER_PORT'] != '80') {
    $callbackUrl = $callbackUrl . ':' . $_SERVER['SERVER_PORT'];
}
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$callbackUrl = $callbackUrl . $uri_parts[0];

$alepay = new Alepay(array(
    // db dev
    // "apiKey" => "yTsl7Ycg9uhIl04EduMQoOuJWhQdZ6",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC9vIbL4rPQSu3TW/MxakvwWplDarB9lBa3jlp2V1IVkPdzk3PbWWAeWM/RuHEGlvRpX8xCQEG5AzC60XXpNUT5JpqldSlyyJVdvsuDLd/BVEZ/rnC4PkOFV07XdgCn1MWwptZJkFnAY2yXTJNBxZeo+f705gQ0Mxc6cTfWjlV3bwIDAQAB",
    // "checksumKey" => "rYcX5D6Sb7JwUtglw4AWttt2g2MHsE",

    // db test
    "apiKey" => "0COVspcyOZRNrsMsbHTdt8zesP9m0y",
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCIh+tv4h3y4piNwwX2WaDa7lo0uL7bo7vzp6xxNFc92HIOAo6WPZ8fT+EXURJzORhbUDhedp8B9wDsjgJDs9yrwoOYNsr+c3x8kH4re+AcBx/30RUwWve8h/VenXORxVUHEkhC61Onv2Y9a2WbzdT9pAp8c/WACDPkaEhiLWCbbwIDAQAB",
    "checksumKey" => "hjuEmsbcohOwgJLCmJlf7N2pPFU1Le",

    // joombooking
    // "apiKey" => "r7CcL19wBEix1ScJXv7ZXy9NoL0Ub8",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCTM7z4P0XkP7pzMennhtShndJ/FcQbYZ2hxypzpzcRU2zi74B4hlrN2uBFjY7obuF68F7SGt72J0bcM9w74aBjCb5YAQX8JOD6IlZsdSCPzMwEpCALKaIUEsZ/npNQEf/RmMOV8RNfJDY2/6ElvUgCu7+eGkabl6Ete8fiI9TYKwIDAQAB",
    // "checksumKey" => "mCPjtDOYyGcg3b6IGIl3lSwCbMKq6m",

    // weshop
    // "apiKey" => "FsIFYpHt42GGDgji5SmLkLDqKRV9tt",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDO8WZFC2Hwj4JmBUZN8naZetVISLyg6CCW+EhmUCPRswblGhjjxbk4+aYzkq0itmQFJ8paUJMeql2NAN4E9cBmQ0OaOqNzHeq/aGJV0sdxEga1UpqGcq2BHXYhDQHe9RQ/rSIJXxR4WhxpcZcxZdj0qrswxoPPubeKFBc+fHBdxQIDAQAB",
    // "checksumKey" => "RukyMrAGCyLeBCbfeEw2erzzao2htH",

    // live db
    // "apiKey" => "imt4pZsjbCDE2ioVxnQs71wzNv4TZW",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCVdQKI15hS23XGT9DBQzIardNBBCPa86XeEhMzP2TKKi737SBUXg+z/o3BNhcFZRdTsL5uQpAmBEP3IJYEvclOGgOyWBbpjUf0MXENexaXB9gX9fI/bEiso7k0shBdi8dZt1FdabX/NSTzM+WcQElgLYgXnlwoyCiyzOFL60V4BwIDAQAB",
    // "checksumKey" => "5iaPavRj8FQXb6eXCj7gFcXC43jsg5",
    "callbackUrl" => $callbackUrl
));
if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendOrderToAlepay') {
    //@MERCHANT : IF MERCHANT USE DIRECTLY DATA FROM INPUT
    $data = getDataFromClient();
    //@MERCHANT : IF MERCHANT USE DATA FROM DATABASE QUERY
    //$data = queryOrderDataFromDatabase();
    $alepay->sendOrderToAlepay($data);
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendOrderToAlepayDomestic') {
    //@MERCHANT : IF MERCHANT USE DIRECTLY DATA FROM INPUT
    $data = getDataFromClient();
    //@MERCHANT : IF MERCHANT USE DATA FROM DATABASE QUERY
    //$data = queryOrderDataFromDatabase();
    $response = $alepay->sendOrderToAlepayDomestic($data);
    header('Location:' . $response->checkoutUrl);
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendCardLinkRequest') {
    $data = getDataFromClient();
    $response = $alepay->sendCardLinkRequest($data);
    // if(array_key_exists('url', $response)){
    header('Location:' . $response->url);
    // }
    // else{
    //     echo json_encode($response);
    // }
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'getTransactionInfo') {
    $data = $_POST['transactionCode'];
    $alepay->getTransactionInfo($data);
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendTokenizationPayment') {
    $tokenization = $_POST['tokenization'];
    $response = $alepay->sendTokenizationPayment($tokenization);
    header('Location:' . $response->checkoutUrl);
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendTokenizationPaymentDomestic') {
    $tokenizationDomestic = $_POST['tokenizationDomestic'];
    $response = $alepay->sendTokenizationPaymentDomestic($tokenizationDomestic);
    header('Location:' . $response->checkoutUrl);
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'cancelCardLink') {
    $data = $_POST['alepayToken'];
    $cardlinkUrl = $alepay->cancelCardLink($data);
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendCardLinkDomesticRequest') {
    $cardlinkUrl = $alepay->sendCardLinkDomesticRequest();
    header('Location:' . $cardlinkUrl->url);
} else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'calculateFee') {
    $data = getDataFromClient();
    $alepay->calculateFee($data);
} else if (isset($_GET['data'])) {
    $data = $_GET['data'];
    echo $alepay->decryptCallbackData($data);
}
function getDataFromClient()
{

    return json_decode(file_get_contents('php://input'), true);
}

?>