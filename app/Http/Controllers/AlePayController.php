<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Alepay;

class AlePayController extends Controller
{
    public function getAlePay(){
        return view('alepay.alepay');
    }

    public function postAlePay(Request $request){
//        dd($request->all());
//        dd(include(app_path()  . '/Http/Lib/Alepay.php'));
//        include(app_path() . '/Http/Lib/Alepay.php');
        $callbackUrl = 'http://' . $_SERVER['SERVER_NAME'];
        if($_SERVER['SERVER_PORT'] != '80'){
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
            dd(1);
            //@MERCHANT : IF MERCHANT USE DIRECTLY DATA FROM INPUT
            $data = getDataFromClient();
            //@MERCHANT : IF MERCHANT USE DATA FROM DATABASE QUERY
            //$data = queryOrderDataFromDatabase();
            $alepay->sendOrderToAlepay($data);
        }
        else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendOrderToAlepayDomestic') {
            //@MERCHANT : IF MERCHANT USE DIRECTLY DATA FROM INPUT
            $data = getDataFromClient();
            //@MERCHANT : IF MERCHANT USE DATA FROM DATABASE QUERY
            //$data = queryOrderDataFromDatabase();
            $response = $alepay->sendOrderToAlepayDomestic($data);
            header('Location:' .$response->checkoutUrl);
        }
        else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendCardLinkRequest') {
            $data = getDataFromClient();
            $response = $alepay->sendCardLinkRequest($data);
            // if(array_key_exists('url', $response)){
            header('Location:' .$response->url);
            // }
            // else{
            //     echo json_encode($response);
            // }
        }
        else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'getTransactionInfo' ) {
            $data = $_POST['transactionCode'];
            $alepay->getTransactionInfo($data);
        }
        else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendTokenizationPayment') {
            $tokenization = $_POST['tokenization'];
            $response = $alepay->sendTokenizationPayment($tokenization);
            header('Location:' .$response->checkoutUrl);
        }
        else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendTokenizationPaymentDomestic') {
            $tokenizationDomestic = $_POST['tokenizationDomestic'];
            $response = $alepay->sendTokenizationPaymentDomestic($tokenizationDomestic);
            header('Location:' .$response->checkoutUrl);
        }
        else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'cancelCardLink') {
            $data = $_POST['alepayToken'];
            $cardlinkUrl = $alepay->cancelCardLink($data);
        }
        else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendCardLinkDomesticRequest') {
            $cardlinkUrl = $alepay->sendCardLinkDomesticRequest();
            header('Location:' .$cardlinkUrl->url);
        }
        else if(isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'calculateFee'){
            $data = getDataFromClient();
            $alepay->calculateFee($data);
        }
        else if(isset($_GET['data'])){
            $data = $_GET['data'];
            echo $alepay->decryptCallbackData($data);
        }

    }
    public function getDataFromClient(){
        return json_decode(file_get_contents('php://input'), true);
    }
}
//class Alepay {
//    protected $alepayUtils ;
//    protected $publicKey = "";
//    protected $checksumKey = "";
//    protected $apiKey = "";
//    protected $callbackUrl = "";
//
//    protected $env = "test";
//
//    protected $baseURL = array(
//        'dev' => 'localhost:8080',
//        'test' => 'http://test.alepay.vn',
//        'live' => 'https://alepay.vn'
//    );
//    protected $URI = array(
//        'requestPayment' => '/checkout/v1/request-order',
//        'calculateFee' => '/checkout/v1/calculate-fee',
//        'getTransactionInfo' => '/checkout/v1/get-transaction-info',
//        'requestCardLink' => '/checkout/v1/request-profile',
//        'tokenizationPayment' => '/checkout/v1/request-tokenization-payment',
//        'tokenizationPaymentDomestic' => '/checkout/v1/request-tokenization-payment-domestic',
//        'cancelCardLink' => '/checkout/v1/cancel-profile',
//        'requestCardLinkDomestic' => '/alepay-card-domestic/request-profile',
//    );
//
//    public function __construct($opts) {
//        header('Access-Control-Allow-Origin: *');
//        header("Access-Control-Allow-Credentials: true");
//        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
//        header('Access-Control-Max-Age: 1000');
//        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
//
//        /*
//         * Require curl and json extension
//         */
//        if (!function_exists('curl_init')) {
//            throw new Exception('Alepay needs the CURL PHP extension.');
//        }
//        if (!function_exists('json_decode')) {
//            throw new Exception('Alepay needs the JSON PHP extension.');
//        }
//
//        // set KEY
//        if (isset($opts) && !empty($opts["apiKey"])) {
//            $this->apiKey = $opts["apiKey"];
//        } else {
//            throw new Exception("API key is required !");
//        }
//        if (isset($opts) && !empty($opts["encryptKey"])) {
//            $this->publicKey = $opts["encryptKey"];
//        } else {
//            throw new Exception("Encrypt key is required !");
//        }
//        if (isset($opts) && !empty($opts["checksumKey"])) {
//            $this->checksumKey = $opts["checksumKey"];
//        } else {
//            throw new Exception("Checksum key is required !");
//        }
//        if (isset($opts) && !empty($opts["callbackUrl"])) {
//            $this->callbackUrl = $opts["callbackUrl"];
//        }
//        $this->alepayUtils = new AlepayUtils();
//    }
//
//
//    /*
//     * Generate data checkout demo
//     */
//    private function createCheckoutData(){
//        $params = array(
//            'amount' =>  '5000000',
//            'buyerAddress' =>  '12 đường 18, quận 1',
//            'buyerCity' =>  'TP. Hồ Chí Minh',
//            'buyerCountry' =>  'Việt Nam',
//            'buyerEmail' =>  'testalepay@yopmail.com',
//            'buyerName' =>  'Nguyễn Văn Bê',
//            'buyerPhone' =>  '0987654321',
//            'cancelUrl' =>  'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/demo-alepay',
//            'currency' =>  'VND',
//            'orderCode' =>  'Order-123',
//            'orderDescription' =>  'Mua ai phôn 8',
//            'paymentHours' =>  '5',
//            'returnUrl' =>   $this->callbackUrl,
//            'totalItem' =>  '1',
//            'checkoutType' =>  2
//        );
//
//        return $params;
//    }
//
//    private function createCheckoutDomesticData(){
//        $params = array(
//            'amount' =>  '5000000',
//            'buyerAddress' =>  '12 đường 18, quận 1',
//            'buyerCity' =>  'TP. Hồ Chí Minh',
//            'buyerCountry' =>  'Việt Nam',
//            'buyerEmail' =>  'testalepay@yopmail.com',
//            'buyerName' =>  'Nguyễn Văn Bê',
//            'buyerPhone' =>  '0987654321',
//            'cancelUrl' =>  'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/demo-alepay',
//            'currency' =>  'VND',
//            'orderCode' =>  'Order-123',
//            'orderDescription' =>  'Mua ai phôn 8',
//            'paymentHours' =>  '5',
//            'returnUrl' =>   $this->callbackUrl,
//            'totalItem' =>  '1',
//            'checkoutType' =>  2,
//            'allowDomestic' => true
//        );
//        return $params;
//    }
//
//    private function createRequestCardLinkData(){
//        $params = array(
//            'id' =>'acb-123',
//            'firstName' =>'Nguyễn',
//            'lastName' => 'Văn Bê',
//            'street' => 'Nguyễn Trãi',
//            'city' => 'TP. Hồ Chí Minh',
//            'state' => 'Quận 1',
//            'postalCode' => '100000',
//            'country' => 'Việt nam',
//            'email' => 'testalepay@yopmail.com',
//            'phoneNumber' => '0987654321',
//            'callback' => $this->callbackUrl
//        );
//        return $params;
//    }
//
//    private function createRequestCardLinkDataDomestic(){
//        $params = array(
//            'customerId' =>'123123123',
//            'firstName' =>'Nguyễn',
//            'lastName' => 'Văn Bê',
//            'street' => 'Nguyễn Trãi',
//            'city' => 'TP. Hồ Chí Minh',
//            'state' => 'Quận 1',
//            'postalCode' => '100000',
//            'country' => 'Viet Nam',
//            'email' => 'canhnd@peacesoft.net',
//            'phoneNumber' => '01663581811',
//            'callback' => $this->callbackUrl
//        );
//        return $params;
//    }
//
//    private function createTokenizationPaymentData($tokenization){
//        $params = array(
//            'customerToken' =>  $tokenization,    // put customer's token
//            'orderCode' =>  'order-123',
//            'amount' =>  '1000000',
//            'currency' =>  'VND',
//            'orderDescription' => 'Mua ai phôn 8',
//            'returnUrl' =>  $this->callbackUrl,
//            'cancelUrl' =>  'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/demo-alepay',
//            'paymentHours' =>  5
//        );
//        return $params;
//    }
//
//    private function createTokenizationPaymentDomesticData($tokenization){
//        $params = array(
//            'customerToken' =>  $tokenization,    // put customer's token
//            'orderCode' =>  'order-123',
//            'amount' =>  '1000000',
//            'currency' =>  'VND',
//            'orderDescription' => 'Mua ai phôn 8',
//            'returnUrl' =>  $this->callbackUrl,
//            'cancelUrl' =>  'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/demo-alepay',
//            'paymentHours' =>  5
//        );
//        return $params;
//    }
//
//
//    /*
//     * sendOrder - Send order information to Alepay service
//     * @param array|null $data
//     */
//    public function sendOrderToAlepay($data) {
//        // get demo data
//        // $data = $this->createCheckoutData();
//        $data['returnUrl'] = $this->callbackUrl;
//        $data['cancelUrl'] =  'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/demo-alepay';
//        $url = $this->baseURL[$this->env] . $this->URI['requestPayment'];
//        $result = $this->sendRequestToAlepay($data, $url);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            echo $dataDecrypted;
//        } else {
//            echo json_encode($result);
//        }
//    }
//
//    public function sendOrderToAlepayDomestic($data) {
//        // get demo data
//        $data = $this->createCheckoutDomesticData();
//        $data['returnUrl'] = $this->callbackUrl;
//        $data['cancelUrl'] =  'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/demo-alepay';
//        $url = $this->baseURL[$this->env] . $this->URI['requestPayment'];
//        $result = $this->sendRequestToAlepay($data, $url);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            return json_decode($dataDecrypted);
//        } else {
//            echo json_encode($result);
//        }
//    }
//
//    /*
//     * get transaction info from Alepay
//     * @param array|null $data
//     */
//    public function getTransactionInfo($transactionCode){
//
//        // demo data
//        $data = array('transactionCode' => $transactionCode );
//        $url = $this->baseURL[$this->env] . $this->URI['getTransactionInfo'];
//        $result = $this->sendRequestToAlepay($data, $url);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            echo $dataDecrypted;
//        } else {
//            echo json_encode($result);
//        }
//    }
//
//    /*
//     * sendCardLinkRequest - Send user's profile info to Alepay service
//     * return: cardlink url
//     * @param array|null $data
//     */
//    public function sendCardLinkRequest($data){
//        // get demo data
//        $data = $this->createRequestCardLinkData();
//        $url = $this->baseURL[$this->env] . $this->URI['requestCardLink'];
//        $result = $this->sendRequestToAlepay($data, $url);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            return json_decode($dataDecrypted);
//        } else {
//            return $result;
//        }
//    }
//
//    public function sendCardLinkDomesticRequest(){
//        // get demo data
//        $data = $this->createRequestCardLinkDataDomestic();
//        $url = $this->baseURL[$this->env] . $this->URI['requestCardLinkDomestic'];
//        $result = $this->sendRequestToAlepay($data, $url);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            return json_decode($dataDecrypted);
//        } else {
//            return $result;
//        }
//    }
//
//    public function sendTokenizationPayment($tokenization){
//
//        $data = $this->createTokenizationPaymentData($tokenization);
//        $url = $this->baseURL[$this->env] . $this->URI['tokenizationPayment'];
//        $result = $this->sendRequestToAlepay($data, $url);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            return json_decode($dataDecrypted) ;
//        } else {
//            return $result;
//        }
//    }
//
//    public function sendTokenizationPaymentDomestic($tokenization){
//        $data = $this->createTokenizationPaymentDomesticData($tokenization);
//        $url = $this->baseURL[$this->env] . $this->URI['tokenizationPaymentDomestic'];
//        $result = $this->sendRequestToAlepay($data, $url);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            return json_decode($dataDecrypted);
//        } else {
//            return $result;
//        }
//    }
//
//    public function cancelCardLink ($alepayToken){
//        $params = array('alepayToken' => $alepayToken );
//        $url = $this->baseURL[$this->env] . $this->URI['cancelCardLink'];
//        $result = $this->sendRequestToAlepay($params, $url);
//        echo json_encode($result);
//        if($result->errorCode == '000'){
//            $dataDecrypted = $this->alepayUtils->decryptData($result->data,$this->publicKey);
//            echo $dataDecrypted;
//        }
//    }
//
//    private function sendRequestToAlepay($data, $url){
//        $dataEncrypt = $this->alepayUtils->encryptData(json_encode($data), $this->publicKey);
//        $checksum = md5($dataEncrypt . $this->checksumKey);
//        $items = array(
//            'token' => $this->apiKey,
//            'data' => $dataEncrypt ,
//            'checksum' => $checksum
//        );
//        $data_string = json_encode($items);
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//                'Content-Type: application/json',
//                'Content-Length: ' . strlen($data_string))
//        );
//        $result = curl_exec($ch);
//        // echo $result;
//        return json_decode($result);
//    }
//
//    public function return_json($error, $message = "", $data = array()) {
//        header('Content-Type: application/json');
//        echo json_encode(array(
//            "error" => $error,
//            "message" => $message,
//            "data" => $data
//        ));
//    }
//
//    public function decryptCallbackData($data){
//        return $this->alepayUtils->decryptCallbackData($data, $this->publicKey);
//    }
//
//}
//class AlepayUtils {
//
//    function encryptData($data, $publicKey) {
//        $rsa = new Crypt_RSA();
//        $rsa->loadKey($publicKey); // public key
//        $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
//        $output = $rsa->encrypt($data);
//        return base64_encode($output);
//    }
//
//
//    function decryptData($data, $publicKey) {
//        $rsa = new Crypt_RSA();
//        $rsa->setEncryptionMode(CRYPT_RSA_ENCRYPTION_PKCS1);
//        $ciphertext = base64_decode($data);
//        $rsa->loadKey($publicKey); // public key
//        $output = $rsa->decrypt($ciphertext);
//        // $output = $rsa->decrypt($data);
//        return $output;
//    }
//
//    function decryptCallbackData($data, $publicKey){
//        $decoded = base64_decode($data);
//        return $this->decryptData($decoded, $publicKey);
//    }
//}