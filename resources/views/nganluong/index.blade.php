<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<span style="color: #ff0000;"><em><span style="font-size: medium;"><strong> </strong></span><span style="color: #000000;">
Thanh toán trực tuyến bằng thẻ ATM; Visa, Master Card;... qua NgânLượng.vn</span>

<form name="Test"  method="post" action="{{ url('/nganluong') }}" onsubmit="return check();">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table>
        <tr><th><strong>Họ Tên:</strong></th><td><input  type="text" name="txh_name" size="28" placeholder="Họ tên" /></td></tr>
        <tr><th><strong>Email:</strong></th><td><input  type="text" name="txt_email" size="28" placeholder="địa chỉ email" /></td></tr>
        <tr><th><strong>Số điện thoại:</strong></th><td><input  type="text" name="txt_phone" size="28" placeholder="Số điện thoại" /></td></tr>
        <tr><th><strong>Số tền thanh toán:</strong></th><td><input name="txt_gia" type="text" size="28" placeholder="Số tiền quyên góp" /></td></tr>
        <tr><th></th><td><input  type="submit" name="submit" value="Thanh Toán"></td></tr>
    </table>

    <script type="text/javascript">
        function check(){
            var price = document.Test.txt_gia.value;

            if (price < 2000) {

                alert('Minimum amount is 2000 VNĐ');
                return false;
            }

            return true;
        }
    </script>
</form>
</body>
</html>