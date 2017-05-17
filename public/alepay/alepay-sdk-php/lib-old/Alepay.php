<?php

class Alepay {

    // DATA : {}
    /*
     * Alepay class
     * Implement with Alepay service
     */


    /*
     * @const string - Version number of the Alepay SDK
     */
    const VERSION = "0.0.1";

    /*
     * @var string - the api key Alepay provide
     */

    protected $apiKey = "";
    protected $URL = array(
        'requestPayment' => 'http://localhost:8080/checkout/v1/request-order'
    );

    public function __construct($opts) {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

        /*
         * Require curl and json extension
         */
        if (!function_exists('curl_init')) {
            throw new Exception('Alepay needs the CURL PHP extension.');
        }
        if (!function_exists('json_decode')) {
            throw new Exception('Alepay needs the JSON PHP extension.');
        }

        // set options variable
        if (isset($opts) && !empty($opts["apiKey"])) {
            $this->apiKey = $opts["apiKey"];
        } else {
            throw new Exception("API key is required !");
        }
        $this->handler_sendOrder();
    }

    /*
     * sendOrder - Send order informatin to Alepay service
     * @param array|null $items
     */

    public function sendOrderToAlepay($items123) {
        //@TODO-CANHND : Encode data
        $items = array(
            'token' => $this->apiKey,
            'data' => "hd/G6eNN2XJvkPBIeKIRDIsqX26n6IYYjtU4uLbONcz3g1Ycbd1YO1ExLiM9J7lH3Jv4csKLn8ILZTEr/kRvHUzqO1vsCUAEQzdme0vJzIn5Ckl4kx7rhQMnQSRQ/JMfX5KwLwx89Z8xji75r/PZDY0yHd1tNMntZFRGXxALCwRY9FZfEUEytEK5ReUct2/szHQ4k/qM4sGxZKPBT1UdUgSnHflWvzcdqT4PQaI8OcQX0y9kF05FsjvGqFvBh2sh0MB0WcFGuaSBX5Hdd8jFTAeLhutaQXeq3LGYCaI2jfhxIQ+EQg+zBiMR3H/I0V8+QocqQgDin3y95TTPiRrTlpoofBTRHaf1pvrmb4CDvj/A3BCnfSEbGfckoW2yGBUkEs77ooPB/enpB8CccW3XMr/Tblc1HJu1rCTSjWxxfsF88KpoZNYeZXp8tMJcPl87llabTp8w86gmFQRSGMN/tVC3KgGrld77axl8Y1bGpmiZGuDyXvhcomxlMsOr9Y2SDXh6KJc+cr+hcxS67z6vZT/9J/L/fOM2WW6TiWCfp7PE2k92rf5tpJ9yoBSWjXHJcT/AUdomYdX94ZA2nQzEhvpibO//QduPPHxTtar+maGLB7CW8pn6csUrWlnU1IfNQH4XfQ4qwUNa01lLcjardgaLmETbkUxZLZ948UNqFJs=",
            'checksum' => "e31e9f5f146eb01bb6c4c4c147c267fa",
            'ip' => "10.0.0.1"
        );
//        $items[] = $this->apiKey;
//        $items['data'] = "hd/G6eNN2XJvkPBIeKIRDIsqX26n6IYYjtU4uLbONcz3g1Ycbd1YO1ExLiM9J7lH3Jv4csKLn8ILZTEr/kRvHUzqO1vsCUAEQzdme0vJzIn5Ckl4kx7rhQMnQSRQ/JMfX5KwLwx89Z8xji75r/PZDY0yHd1tNMntZFRGXxALCwRY9FZfEUEytEK5ReUct2/szHQ4k/qM4sGxZKPBT1UdUgSnHflWvzcdqT4PQaI8OcQX0y9kF05FsjvGqFvBh2sh0MB0WcFGuaSBX5Hdd8jFTAeLhutaQXeq3LGYCaI2jfhxIQ+EQg+zBiMR3H/I0V8+QocqQgDin3y95TTPiRrTlpoofBTRHaf1pvrmb4CDvj/A3BCnfSEbGfckoW2yGBUkEs77ooPB/enpB8CccW3XMr/Tblc1HJu1rCTSjWxxfsF88KpoZNYeZXp8tMJcPl87llabTp8w86gmFQRSGMN/tVC3KgGrld77axl8Y1bGpmiZGuDyXvhcomxlMsOr9Y2SDXh6KJc+cr+hcxS67z6vZT/9J/L/fOM2WW6TiWCfp7PE2k92rf5tpJ9yoBSWjXHJcT/AUdomYdX94ZA2nQzEhvpibO//QduPPHxTtar+maGLB7CW8pn6csUrWlnU1IfNQH4XfQ4qwUNa01lLcjardgaLmETbkUxZLZ948UNqFJs=";
//        $items['checksum'] = "e31e9f5f146eb01bb6c4c4c147c267fa";
//        $items['ip'] = "10.0.0.1";
        $data_string = json_encode($items);
        $ch = curl_init($this->URL['requestPayment']);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );
        $result = curl_exec($ch);
        curl_close($ch);
        header('Content-Type: application/json');
        //@TODO-CANHND : Decode data
        $result = array(
            'token' => $this->apiKey,
            'checkoutUrl' => "http://localhost:8080/checkout/v1/0e582da422364eee856e9efbab1ec65f"
        );
        echo json_encode($result);
    }

    /*
     * Receive and process when user send request to create order
     * return link popup
     */

    public function handler_sendOrder() {
        if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendOrderToAlepay') {
            $this->sendOrderToAlepay(array());
//            $data = json_decode(file_get_contents('php://input'), true);
//
//            $err = [];
//            if (empty($data)) {
//                $err[] = "No data";
//            }
//
//            if (empty($data['Item'])) {
//                $err[] = "Items is empty";
//            }
//            if (empty($data['Order'])) {
//                $err[] = "Order is empty";
//            }
//
//            if (!empty($err)) {
//                header('Content-Type: application/json');
//
//                echo json_encode(array(
//                    "error" => true,
//                    "message" => $err,
//                    "data" => array()
//                ));
//            } else {
//                $this->sendOrderToAlepay(array(
//                    "Order" => $data["Order"],
//                    "Item" => $data["Item"],
//                    "Domain" => $data["Domain"]
//                ));
//            }
        }
    }

    public function return_json($error, $message = "", $data = array()) {
        header('Content-Type: application/json');
        echo json_encode(array(
            "error" => $error,
            "message" => $message,
            "data" => $data
        ));
    }

}

?>