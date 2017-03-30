<?php

namespace App\Http\Controllers;
// namespace Carbon;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\User;
// use Carbon\Carbon;

define('NGANLUONG_URL', 'http://sandbox.nganluong.vn:8088/nl30/checkout.php');
define('URL_API','http://sandbox.nganluong.vn:8088/nl30/checkout.api.nganluong.post.php');
define('RECEIVER','demo@nganluong.vn'); // Email tài khoản Ngân Lượng
define('MERCHANT_ID', '36680'); // Mã kết nối
define('MERCHANT_PASS', 'matkhauketnoi'); // Mật khẩu kết nối
// CheckoutV3
class NL_CheckOutV3
{
    public $url_api ='https://www.nganluong.vn/checkout.api.nganluong.post.php';
    public $merchant_id = '';
    public $merchant_password = '';
    public $receiver_email = '';
    public $cur_code = 'vnd';



    function __construct($merchant_id, $merchant_password, $receiver_email,$url_api)
    {
        $this->version ='3.1';
        $this->url_api =$url_api;
        $this->merchant_id = $merchant_id;
        $this->merchant_password = $merchant_password;
        $this->receiver_email = $receiver_email;
    }

    function GetTransactionDetail($token){
        ###################### BEGIN #####################
        $params = array(
            'merchant_id'       => $this->merchant_id ,
            'merchant_password' => MD5($this->merchant_password),
            'version'           => $this->version,
            'function'          => 'GetTransactionDetail',
            'token'             => $token
        );

        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->url_api);
        curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        // AkKe Fixed
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        if ($result != '' && $status==200){
            $nl_result  = simplexml_load_string($result);
            return $nl_result;
        }

        return false;
        ###################### END #####################

    }


    /*

    Hàm lấy link thanh toán bằng thẻ visa
    ===============================
    Tham số truyền vào bắt buộc phải có
                order_code
                total_amount
                payment_method

                buyer_fullname
                buyer_email
                buyer_mobile
    ===============================
        $array_items mảng danh sách các item name theo quy tắc
        item_name1
        item_quantity1
        item_amount1
        item_url1
        .....
        payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
     */
    function VisaCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
                          $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                          $buyer_address,$array_items,$bank_code)
    {
        $params = array(
            'cur_code'				=>	$this->cur_code,
            'function'				=> 'SetExpressCheckout',
            'version'				=> $this->version,
            'merchant_id'			=> $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email'		=> $this->receiver_email,
            'merchant_password'		=> MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code'			=> $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount'			=> $total_amount, //Tổng số tiền của hóa đơn
            'payment_method'		=> 'VISA', //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code'				=> $bank_code, //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'payment_type'			=> $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description'		=> $order_description, //Mô tả đơn hàng
            'tax_amount'			=> $tax_amount, //Tổng số tiền thuế
            'fee_shipping'			=> $fee_shipping, //Phí vận chuyển
            'discount_amount'		=> $discount_amount, //Số tiền giảm giá
            'return_url'			=> $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url'			=> $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname'		=> $buyer_fullname, //Tên người mua hàng
            'buyer_email'			=> $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile'			=> $buyer_mobile, //Điện thoại người mua
            'buyer_address'			=> $buyer_address, //Địa chỉ người mua hàng
            'total_item'			=> count($array_items)
        );
        // AkKe Debugging
        // dd($param);
        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        if(count($array_items)>0){
            foreach($array_items as $array_item){
                foreach ($array_item as $key => $value){
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key."=".$value;
                }
            }
        }
        //die($post_field);

        $nl_result=$this->CheckoutCall($post_field);
        return $nl_result;
    }
    function PrepaidVisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => Config::$_FUNCTION,
            'version' => Config::$_VERSION,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'CREDIT_CARD_PREPAID', //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );
        //var_dump($params); exit;
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }
        //die($post_field);

        $nl_result = $this->CheckoutCall($post_field);
        return $nl_result;
    }
    /*
    Hàm lấy link thanh toán qua ngân hàng
    ===============================
    Tham số truyền vào bắt buộc phải có
                order_code
                total_amount
                bank_code // Theo bảng mã ngân hàng

                buyer_fullname
                buyer_email
                buyer_mobile
    ===============================

        $array_items mảng danh sách các item name theo quy tắc
        item_name1
        item_quantity1
        item_amount1
        item_url1
        .....
        payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn

    */
    function BankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
                          $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                          $buyer_address,$array_items)
    {
        $params = array(
            'cur_code'				=>	$this->cur_code,
            'function'				=> 'SetExpressCheckout',
            'version'				=> $this->version,
            'merchant_id'			=> $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email'		=> $this->receiver_email,
            'merchant_password'		=> MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code'			=> $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount'			=> $total_amount, //Tổng số tiền của hóa đơn
            'payment_method'		=> 'ATM_ONLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code'				=> $bank_code, //Mã Ngân hàng
            'payment_type'			=> $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description'		=> $order_description, //Mô tả đơn hàng
            'tax_amount'			=> $tax_amount, //Tổng số tiền thuế
            'fee_shipping'			=> $fee_shipping, //Phí vận chuyển
            'discount_amount'		=> $discount_amount, //Số tiền giảm giá
            'return_url'			=> $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url'			=> $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname'		=> $buyer_fullname, //Tên người mua hàng
            'buyer_email'			=> $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile'			=> $buyer_mobile, //Điện thoại người mua
            'buyer_address'			=> $buyer_address, //Địa chỉ người mua hàng
            'total_item'			=> count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        if(count($array_items)>0){
            foreach($array_items as $array_item){
                foreach ($array_item as $key => $value){
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key."=".$value;
                }
            }
        }
        //$post_field="function=SetExpressCheckout&version=3.1&merchant_id=24338&receiver_email=payment@hellochao.com&merchant_password=5b39df2b8f3275d1c8d1ea982b51b775&order_code=macode_oerder123&total_amount=2000&payment_method=ATM_ONLINE&bank_code=ICB&payment_type=&order_description=&tax_amount=0&fee_shipping=0&discount_amount=0&return_url=http://localhost/testcode/nganluong.vn/checkoutv3/payment_success.php&cancel_url=http://nganluong.vn&buyer_fullname=Test&buyer_email=saritvn@gmail.com&buyer_mobile=0909224002&buyer_address=&total_item=1&item_name1=Product name&item_quantity1=1&item_amount1=2000&item_url1=http://nganluong.vn/"	;
        //echo $post_field;
        //die;
        $nl_result=$this->CheckoutCall($post_field);

        return $nl_result;
    }

    function BankOfflineCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
                                 $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                                 $buyer_address,$array_items)
    {
        $params = array(
            'cur_code'				=>	$this->cur_code,
            'function'				=> 'SetExpressCheckout',
            'version'				=> $this->version,
            'merchant_id'			=> $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email'		=> $this->receiver_email,
            'merchant_password'		=> MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code'			=> $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount'			=> $total_amount, //Tổng số tiền của hóa đơn
            'payment_method'		=> 'ATM_OFFLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code'				=> $bank_code, //Mã Ngân hàng
            'payment_type'			=> $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description'		=> $order_description, //Mô tả đơn hàng
            'tax_amount'			=> $tax_amount, //Tổng số tiền thuế
            'fee_shipping'			=> $fee_shipping, //Phí vận chuyển
            'discount_amount'		=> $discount_amount, //Số tiền giảm giá
            'return_url'			=> $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url'			=> $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname'		=> $buyer_fullname, //Tên người mua hàng
            'buyer_email'			=> $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile'			=> $buyer_mobile, //Điện thoại người mua
            'buyer_address'			=> $buyer_address, //Địa chỉ người mua hàng
            'total_item'			=> count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        if(count($array_items)>0){
            foreach($array_items as $array_item){
                foreach ($array_item as $key => $value){
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key."=".$value;
                }
            }
        }
        //$post_field="function=SetExpressCheckout&version=3.1&merchant_id=24338&receiver_email=payment@hellochao.com&merchant_password=5b39df2b8f3275d1c8d1ea982b51b775&order_code=macode_oerder123&total_amount=2000&payment_method=ATM_ONLINE&bank_code=ICB&payment_type=&order_description=&tax_amount=0&fee_shipping=0&discount_amount=0&return_url=http://localhost/testcode/nganluong.vn/checkoutv3/payment_success.php&cancel_url=http://nganluong.vn&buyer_fullname=Test&buyer_email=saritvn@gmail.com&buyer_mobile=0909224002&buyer_address=&total_item=1&item_name1=Product name&item_quantity1=1&item_amount1=2000&item_url1=http://nganluong.vn/"	;
        //echo $post_field;
        //die;
        $nl_result=$this->CheckoutCall($post_field);

        return $nl_result;
    }


    function officeBankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
                                $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                                $buyer_address,$array_items)
    {
        $params = array(
            'cur_code'				=> $this->cur_code,
            'function'				=> 'SetExpressCheckout',
            'version'				=> $this->version,
            'merchant_id'			=> $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email'		=> $this->receiver_email,
            'merchant_password'		=> MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code'			=> $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount'			=> $total_amount, //Tổng số tiền của hóa đơn
            'payment_method'		=> 'NH_OFFLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code'				=> $bank_code, //Mã Ngân hàng
            'payment_type'			=> $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description'		=> $order_description, //Mô tả đơn hàng
            'tax_amount'			=> $tax_amount, //Tổng số tiền thuế
            'fee_shipping'			=> $fee_shipping, //Phí vận chuyển
            'discount_amount'		=> $discount_amount, //Số tiền giảm giá
            'return_url'			=> $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url'			=> $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname'		=> $buyer_fullname, //Tên người mua hàng
            'buyer_email'			=> $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile'			=> $buyer_mobile, //Điện thoại người mua
            'buyer_address'			=> $buyer_address, //Địa chỉ người mua hàng
            'total_item'			=> count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        if(count($array_items)>0){
            foreach($array_items as $array_item){
                foreach ($array_item as $key => $value){
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key."=".$value;
                }
            }
        }
        //$post_field="function=SetExpressCheckout&version=3.1&merchant_id=24338&receiver_email=payment@hellochao.com&merchant_password=5b39df2b8f3275d1c8d1ea982b51b775&order_code=macode_oerder123&total_amount=2000&payment_method=ATM_ONLINE&bank_code=ICB&payment_type=&order_description=&tax_amount=0&fee_shipping=0&discount_amount=0&return_url=http://localhost/testcode/nganluong.vn/checkoutv3/payment_success.php&cancel_url=http://nganluong.vn&buyer_fullname=Test&buyer_email=saritvn@gmail.com&buyer_mobile=0909224002&buyer_address=&total_item=1&item_name1=Product name&item_quantity1=1&item_amount1=2000&item_url1=http://nganluong.vn/"	;
        //echo $post_field;
        //die;
        $nl_result=$this->CheckoutCall($post_field);

        return $nl_result;
    }

    /*

    Hàm lấy link thanh toán tại văn phòng ngân lượng

    ===============================
    Tham số truyền vào bắt buộc phải có
                order_code
                total_amount
                bank_code // HN hoặc HCM

                buyer_fullname
                buyer_email
                buyer_mobile
    ===============================

        $array_items mảng danh sách các item name theo quy tắc
        item_name1
        item_quantity1
        item_amount1
        item_url1
        .....
        payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn

    */
    function TTVPCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
                          $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                          $buyer_address,$array_items)
    {
        $params = array(
            'cur_code'			=>	$this->cur_code,
            'function'				=> 'SetExpressCheckout',
            'version'				=> $this->version,
            'merchant_id'			=> $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email'		=> $this->receiver_email,
            'merchant_password'		=> MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code'			=> $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount'			=> $total_amount, //Tổng số tiền của hóa đơn
            'payment_method'		=> 'ATM_ONLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code'				=> $bank_code, //Mã Ngân hàng
            'payment_type'			=> $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description'		=> $order_description, //Mô tả đơn hàng
            'tax_amount'			=> $tax_amount, //Tổng số tiền thuế
            'fee_shipping'			=> $fee_shipping, //Phí vận chuyển
            'discount_amount'		=> $discount_amount, //Số tiền giảm giá
            'return_url'			=> $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url'			=> $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname'		=> $buyer_fullname, //Tên người mua hàng
            'buyer_email'			=> $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile'			=> $buyer_mobile, //Điện thoại người mua
            'buyer_address'			=> $buyer_address, //Địa chỉ người mua hàng
            'total_item'			=> count($array_items)
        );

        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;
        }
        if(count($array_items)>0){
            foreach($array_items as $array_item){
                foreach ($array_item as $key => $value){
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key."=".$value;
                }
            }
        }

        $nl_result=$this->CheckoutCall($post_field);
        return $nl_result;
    }

    /*

    Hàm lấy link thanh toán dùng số dư ví ngân lượng
    ===============================
    Tham số truyền vào bắt buộc phải có
                order_code
                total_amount
                payment_method

                buyer_fullname
                buyer_email
                buyer_mobile
    ===============================
        $array_items mảng danh sách các item name theo quy tắc
        item_name1
        item_quantity1
        item_amount1
        item_url1
        .....

        payment_type Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
     */
    
    function NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
                        $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                        $buyer_address,$array_items)
    {
        $params = array(
            'cur_code'				=> $this->cur_code,
            'function'				=> 'SetExpressCheckout',
            'version'				=> $this->version,
            'merchant_id'			=> $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email'		=> $this->receiver_email,
            'merchant_password'		=> MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code'			=> $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount'			=> $total_amount, //Tổng số tiền của hóa đơn
            'payment_method'		=> 'NL', //Phương thức thanh toán
            'payment_type'			=> $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description'		=> $order_description, //Mô tả đơn hàng
            'tax_amount'			=> $tax_amount, //Tổng số tiền thuế
            'fee_shipping'			=> $fee_shipping, //Phí vận chuyển
            'discount_amount'		=> $discount_amount, //Số tiền giảm giá
            'return_url'			=> $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url'			=> $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname'		=> $buyer_fullname, //Tên người mua hàng
            'buyer_email'			=> $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile'			=> $buyer_mobile, //Điện thoại người mua
            'buyer_address'			=> $buyer_address, //Địa chỉ người mua hàng
            'total_item'			=> count($array_items) //Tổng số sản phẩm trong đơn hàng
        );
        $post_field = '';
        foreach ($params as $key => $value){
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key."=".$value;

        }
        if(count($array_items)>0){
            foreach($array_items as $array_item){
                foreach ($array_item as $key => $value){
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key."=".$value;
                }
            }
        }

        //die($post_field);
        $nl_result=$this->CheckoutCall($post_field);
        // dd($nl_result);
        return $nl_result;
    }

    function IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items) {
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $this->merchant_id, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $this->receiver_email,
            'merchant_password' => MD5($this->merchant_password), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'IB_ONLINE', //Phương thức thanh toán
            'bank_code' => $bank_code,
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items) //Tổng số sản phẩm trong đơn hàng
        );
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '')
                $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '')
                        $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }

        //die($post_field);
        $nl_result = $this->CheckoutCall($post_field);
        return $nl_result;
    }

    function CheckoutCall($post_field){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->url_api);
        curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);


        // AkKe Fixed
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        // dd($result);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
//        dd($status);
        if ($result != '' && $status==200){
            $xml_result = str_replace('&','&amp;',(string)$result);

            // dd($xml_result);

            // AkKe Test
            // $xml_result2 = str_replace('---','--',(string)$xml_result);
            // $xml_result3 = str_replace('"""','""',(string)$xml_result2);
            // dd($xml_result3);
            // dd(simplexml_load_string($xml_result2));
            $nl_result  = simplexml_load_string($xml_result);
            // dd($nl_result);
            $nl_result->error_message = $this->GetErrorMessage($nl_result->error_code);

            // AkKe Debugging
            return $result;
        }else{
//            dd(1);
            $nl_result->error_message = $error;
            // dd($nl_result);
            return $nl_result;
        }


    }

    function GetErrorMessage($error_code) {
        $arrCode = array(
            '00' => 'Thành công',
            '99' => 'Lỗi chưa xác minh',
            '06' => 'Mã merchant không tồn tại hoặc bị khóa',
            '02' => 'Địa chỉ IP truy cập bị từ chối',
            '03' => 'Mã checksum không chính xác, truy cập bị từ chối',
            '04' => 'Tên hàm API do merchant gọi tới không hợp lệ (không tồn tại)',
            '05' => 'Sai version của API',
            '07' => 'Sai mật khẩu của merchant',
            '08' => 'Địa chỉ email tài khoản nhận tiền không tồn tại',
            '09' => 'Tài khoản nhận tiền đang bị phong tỏa giao dịch',
            '10' => 'Mã đơn hàng không hợp lệ',
            '11' => 'Số tiền giao dịch lớn hơn hoặc nhỏ hơn quy định',
            '12' => 'Loại tiền tệ không hợp lệ',
            '29' => 'Token không tồn tại',
            '80' => 'Không thêm được đơn hàng',
            '81' => 'Đơn hàng chưa được thanh toán',
            '110' => 'Địa chỉ email tài khoản nhận tiền không phải email chính',
            '111' => 'Tài khoản nhận tiền đang bị khóa',
            '113' => 'Tài khoản nhận tiền chưa cấu hình là người bán nội dung số',
            '114' => 'Giao dịch đang thực hiện, chưa kết thúc',
            '115' => 'Giao dịch bị hủy',
            '118' => 'tax_amount không hợp lệ',
            '119' => 'discount_amount không hợp lệ',
            '120' => 'fee_shipping không hợp lệ',
            '121' => 'return_url không hợp lệ',
            '122' => 'cancel_url không hợp lệ',
            '123' => 'items không hợp lệ',
            '124' => 'transaction_info không hợp lệ',
            '125' => 'quantity không hợp lệ',
            '126' => 'order_description không hợp lệ',
            '127' => 'affiliate_code không hợp lệ',
            '128' => 'time_limit không hợp lệ',
            '129' => 'buyer_fullname không hợp lệ',
            '130' => 'buyer_email không hợp lệ',
            '131' => 'buyer_mobile không hợp lệ',
            '132' => 'buyer_address không hợp lệ',
            '133' => 'total_item không hợp lệ',
            '134' => 'payment_method, bank_code không hợp lệ',
            '135' => 'Lỗi kết nối tới hệ thống ngân hàng',
            '140' => 'Đơn hàng không hỗ trợ thanh toán trả góp',);

        return $arrCode[(string)$error_code];
    }
}
class NganLuongV3Controller extends Controller
{
    public function getNLv3(){
        return view('nganluongv3');
    }
    public function postNLv3(Request $request){

        if(@($request->nlpayment)) {
//            dd(@($request->all()));
//            include('config.php');
//            include('include/NL_Checkoutv3.php');
//            dd(1);
            $nlcheckout= new NL_CheckOutV3(MERCHANT_ID,MERCHANT_PASS,RECEIVER,URL_API);
            $total_amount = $_POST['total_amount'];
//            $total_amount = $request->total_amount;
            $array_items[0]= array('item_name1' => 'Product name',
                'item_quantity1' => 1,
                'item_amount1' => $total_amount,
                'item_url1' => 'http://nganluong.vn/');

            $array_items = array();

            $payment_method = @$_POST['option_payment'];

//            // AkKe Debugging
//            if (isset($_POST['option_payment'])){
//                $payment_method = $_POST['option_payment'];
//            }else{
//                $payment_method = '';
//            }

            $bank_code = @$_POST['bankcode'];
            $order_code ="macode_".time();

            $payment_type ='';
            $discount_amount = 0;
            $order_description='';
            $tax_amount=0;
            $fee_shipping=0;
            $return_url ='http://localhost:8000/nlreceiverv3';
            $cancel_url =urlencode('http://localhost/nlreceiverv3?orderid='.$order_code) ;

            $buyer_fullname =$_POST['buyer_fullname'];
            $buyer_email =$_POST['buyer_email'];
            $buyer_mobile =$_POST['buyer_mobile'];

            $buyer_address ='';

            // dd($array_items);

            if($payment_method !='' && $buyer_email !="" && $buyer_mobile !="" && $buyer_fullname !="" && filter_var( $buyer_email, FILTER_VALIDATE_EMAIL )  ){
                // AkKe Debugging
                // dd($payment_method);
                if($payment_method =="VISA"){
                    dd($payment_method);
                    $nl_result= $nlcheckout->VisaCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
                        $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                        $buyer_address,$array_items,$bank_code);

                    // AkKe Debugging
                    // dd($nl_result);

                }elseif($payment_method == "NL"){
                    // dd('Open NL');
                    $nl_result= $nlcheckout->NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
                        $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                        $buyer_address,$array_items);
                    // $payment_type,$order_description,$tax_amount = 0,$fee_shipping = 0,$discount_amount = 0,$buyer_address,$array_items
                    // AkKe Debugging
                    // dd($nl_result);
                    
                }elseif($payment_method =="ATM_ONLINE" && $bank_code !='' ){

                    $nl_result= $nlcheckout->BankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
                        $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile,
                        $buyer_address,$array_items) ;
                }
                elseif($payment_method =="NH_OFFLINE"){
                    $nl_result= $nlcheckout->officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                }
                elseif($payment_method =="ATM_OFFLINE"){
                    $nl_result= $nlcheckout->BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);

                }
                elseif($payment_method =="IB_ONLINE"){
                    $nl_result= $nlcheckout->IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
                }
                elseif ($payment_method == "CREDIT_CARD_PREPAID") {

                    $nl_result = $nlcheckout->PrepaidVisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code);
                }
                

                // AkKe Debugging
                $nl_result_dom = new \SimpleXMLElement($nl_result);
//                dd($nl_result_dom);
                // dd($nl_result_dom->checkout_url);
                if ($nl_result_dom->error_code =='00'){

//                    dd($request->all());

                    // AkKe add orders table
                    $order = new Order;
                    $order->name = $request->buyer_fullname;
                    $order->buyer_email = $request->buyer_email;
                    $order->order_code = $order_code;
//                    $order->payment_type = $payment_type;
                    $order->total_amount = $request->total_amount;
//                    $order->payment_type = $payment_type;
//                    $order->payment_method = $payment_method;
                    $order->total_amount = $total_amount;
//                    $order->bank_code = $bank_code;
                    $order->transaction_status = 1;
//                    $order->customer_id = rand(1,100);
                    $order->transaction_info = $order_description;
//                    $order->tax_amount = $tax_amount;
//                    $order->discount_amount = $discount_amount;
//                    $order->free_shipping = rand(1000,50000);
                    $order->order_description = $order_description;
                    $order->secure_code = $order_code;
//                    $order->payment_id = rand(1,100);
                    $order->save();


                    //Cập nhât order với token  $nl_result->token để sử dụng check hoàn thành sau này
                    ?>
                    <script type="text/javascript">
                        <!--
                        window.location = "<?php echo $nl_result_dom->checkout_url; // .'&lang=en' chuyển mặc định tiếng anh  ?>"
                        //-->
                    </script>
                    <?PHP
                }else{
                    echo $nl_result->error_message;
                }
            }else{
                echo "<h3> Bạn chưa nhập đủ thông tin khách hàng </h3>";
            }
        }

    }
    public function nlreceiverv3(Request $request){
        $nlcheckout= new NL_CheckOutV3(MERCHANT_ID,MERCHANT_PASS,RECEIVER,URL_API);
        $nl_result = $nlcheckout->GetTransactionDetail($_GET['token']);
        if($nl_result){
//            dd($nl_result);
            $nl_errorcode           = (string)$nl_result->error_code;
            $nl_transaction_status  = (string)$nl_result->transaction_status;





            if($nl_errorcode == '00') {
                if($nl_transaction_status == '00') {

                    // Find And Update User When Transaction Done
                    $user_merchan = User::all()->where('email',$nl_result->buyer_email)->first();
                    $user_merchan_id = $user_merchan->id;
                    $user_merchan->total_money -= $nl_result->total_amount;
                    $user_merchan->remember_token = $nl_result->token;
                    $user_merchan->save();

                    // Update order of merchan have buyer_email
                    $order_merchan = Order::where('buyer_email',$nl_result->buyer_email)->first();
                    $order_merchan->receiver_email = $nl_result->receiver_email;
                    $order_merchan->payment_type = $nl_result->payment_type;
                    $order_merchan->payment_method = $nl_result->payment_method;
                    $order_merchan->bank_code = $nl_result->bank_code;
                    $order_merchan->transaction_status = 4;
                    $order_merchan->buyer_mobile = $nl_result->buyer_mobile;
                    $order_merchan->buyer_email = $nl_result->buyer_email;
                    $order_merchan->buyer_name = $nl_result->buyer_fullname;
                    $order_merchan->user_id = $user_merchan_id;
                    $order_merchan->save();
                    // dd($Carbon::now());
                    //trạng thái thanh toán thành công
                    echo "<pre>";
                    print_r( $nl_result);
                    echo "</pre>";
                    echo "Cập nhật trạng thái thành công";
                }
            }else{
                echo $nlcheckout->GetErrorMessage($nl_errorcode);
            }
        }
    }
}