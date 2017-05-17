<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tài liệu và hướng dẫn tích hợp hệ thống Alepay">
    <meta name="author" content="">
    <title>Alepay | Sandbox</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" <!-- Custom styles for
        this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <link href="css/side-menu.css" rel="stylesheet">
    <link href="css/font-aw/css/font-awesome.css" rel="stylesheet">
    <link href="http://services.shipchung.vn/sdk/assets/templates/green/style.css" rel="stylesheet">
    <link href="http://services.shipchung.vn/sdk/assets/templates/orange/style.css" rel="stylesheet">
    <link href="http://services.shipchung.vn/sdk/assets/templates/default/style.css" rel="stylesheet">
    <link href="http://services.shipchung.vn/sdk/assets/templates/blue/style.css" rel="stylesheet">

</head>

<body>

<div class="container">

    <div class="header">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="index.html">Trang chủ</a></li>
            </ul>
        </nav>
        <h3 class="text-muted"> Sandbox</h3>
    </div>


    <div class="row marketing">

        <div class="col-lg-6">
            <img src="sc-sdk-php/image/iphone-6s-plus-64gb-400-400x450.png" alt="" style="overflow:hidden;width:80%">
            <h4>Điện thoại iphone 6 16GB</h4>
            <ul>
                <li>Miếng dán màn hình (giá trị đến 90.000₫)</li>
                <li>Mua Office 365 Personal (bản quyền 1 năm) chỉ với 800,000đ (Giá chưa giảm là 1,300,000đ)
                </li>
            </ul>
        </div>

        <div class="col-lg-6">
            <h4>Điện thoại iphone 6 16GB</h4>
            <p>5.990.000₫ (Còn hàng - Xem siêu thị còn hàng)</p>
            <p>


            <div class="row">
                <div class="col-md-4">
                    <select name="quantity" id="quantity-12" class="form-control ">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            </p>
            <p>
            <h3>Merchant ID : 71</h3>
            <div class='alepay' data-sc-style="green" data-sc-size="default" data-sc-type="payment"
                 data-sc-text="Thanh toán & Liên kết">
                <orders order-amount="5000000" order-buyer-address="Hanoi123123" order-buyer-city="Hanoi"
                        order-buyer-country="Vietnam" order-buyer-email="testalepay@yopmail.com"
                        order-buyer-name="bin" order-buyer-phone="01699624373"
                        order-cancel-url="http://demo.alepay.vn:8091/demo-alepay/"
                        order-return-url="http://demo.alepay.vn:8091/demo-alepay/"
                        order-currency="VND" order-code="ORDER123" order-description="Iphone 6" order-payment-hours="10"
                        order-total-item="4" order-buyerPostalCode="100000" order-merchantSideUserId="CUS123"
                        order-buyerState="Hanoi" order-isCardLink="true" order-installment="false">
                </orders>
            </div>
            <div class='alepay' data-sc-style="green" data-sc-size="default" data-sc-type="payment-instant"
                 data-sc-text="Thanh toán ngay">
                <orders order-amount="5000000" order-buyer-address="Hanoi123123" order-buyer-city="Hanoi"
                        order-buyer-country="Vietnam" order-buyer-email="testalepay@yopmail.com"
                        order-buyer-name="bin" order-buyer-phone="01699624373"
                        order-cancel-url="http://demo.alepay.vn:8091/demo-alepay/"
                        order-return-url="http://demo.alepay.vn:8091/demo-alepay/"
                        order-currency="VND" order-code="ORDER123" order-description="Iphone 6S"
                        order-payment-hours="10"
                        order-total-item="4" order-isCardLink="false" order-installment="false">
                </orders>
            </div>
            <div class='alepay' data-sc-style="green" data-sc-size="default" data-sc-type="payment-installment"
                 data-sc-text="Thanh toán trả góp">
                <orders order-amount="5000000" order-buyer-address="Hanoi123123" order-buyer-city="Hanoi"
                        order-buyer-country="Vietnam" order-buyer-email="testalepay@yopmail.com"
                        order-buyer-name="bin" order-buyer-phone="01699624373"
                        order-cancel-url="http://demo.alepay.vn:8091/demo-alepay/"
                        order-return-url="http://demo.alepay.vn:8091/demo-alepay/"
                        order-currency="VND" order-code="ORDER123" order-description="Iphone 7" order-payment-hours="10"
                        order-total-item="4" order-isCardLink="false" order-installment="true" order-month="9"
                        order-bankCode="SACOMBANK" order-paymentMethod="VISA">
                </orders>
            </div>
            <div>
                <form action="{{ route('ale',['action' => 'sendCardLinkRequest']) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="sc-button btn-size-default btn-style-green">Liên kết thẻ</button>
                </form>
            </div>
            <div>
                <form method="POST" action="{{ route('ale',['action' => 'sendTokenizationPayment']) }}">
                    {{ csrf_field() }}
                    Mã tokenization : <input type="text" name="tokenization"/>
                    <button type="submit" class="sc-button btn-size-default btn-style-green">1-Click payment</button>
                </form>
            </div>
            <div>
                <form method="POST" action="{{ route('ale',['action' => 'getTransactionInfo']) }}">
                    Mã giao dịch : <input type="text" name="transactionCode"/>
                    <button type="submit" class="sc-button btn-size-default btn-style-green">Lấy thông tin giao dịch
                    </button>
                </form>
            </div>
            <div>
                <form method="POST" action="{{ route('ale',['action' => 'cancelCardLink']) }}">
                    Alepay token : <input type="text" name="alepayToken"/>
                    <button type="submit" class="sc-button btn-size-default btn-style-green">Hủy liên kết thẻ</button>
                </form>
            </div>
            <div>
                <form method="POST" action="{{ route('ale',['action' => 'sendCardLinkDomesticRequest']) }}">
                    {{ csrf_field() }}
                    <button class="sc-button btn-size-default btn-style-green">Liên kết thẻ nội địa</button>
                </form>
            </div>
            <div>
                <form method="POST" action="{{ route('ale',['action' => 'sendOrderToAlepayDomestic']) }}">
                    {{ csrf_field() }}
                    <button class="sc-button btn-size-default btn-style-green">Thanh toán thẻ nội địa</button>
                </form>
            </div>
            <div>
                <form method="POST" action="{{ route('ale',['action' => 'sendTokenizationPaymentDomestic']) }}">
                    {{ csrf_field() }}
                    Mã tokenization nội địa : <input type="text" name="tokenizationDomestic"/>
                    <button type="submit" formaction="" class="sc-button btn-size-default btn-style-green">1-Click payment nội địa</button>
                </form>
            </div>
            </p>
            <p>
                <strong>Đoạn mã sử dụng để hiên thị nút thanh toán</strong>
            <div style="background: #272822; overflow:auto;width:auto;">
                        <pre style="background: #272822;margin: 0; line-height: 125%"><span style="color: #f92672">&lt;div</span> <span
                                    style="color: #a6e22e">class=</span><span
                                    style="color: #e6db74">&quot;alepay&quot;</span>                            <span
                                    style="color: #a6e22e">data-sc-style=</span><span style="color: #e6db74">&quot;green&quot;</span>                            <span
                                    style="color: #a6e22e">data-sc-size=</span><span style="color: #e6db74">&quot;default&quot;</span>                            <span
                                    style="color: #a6e22e">data-sc-type=</span><span style="color: #e6db74">&quot;payment&quot; </span>
                            <span style="color: #a6e22e">data-sc-text=</span><span style="color: #e6db74">&quot;Thanh toán và vận chuyển&quot;</span>
                            <span style="color: #f92672">&gt;</span>
                            <span style="color: #f92672">&lt;items</span> <span style="color: #a6e22e">item-name=</span>
                            <span style="color: #e6db74">&quot;Điện thoại iphone 6 16GB&quot;</span> <span
                                    style="color: #a6e22e">item-price=</span>
                            <span style="color: #e6db74">&quot;5990000&quot;</span> <span style="color: #a6e22e">item-quantity=</span>
                            <span style="color: #e6db74">&quot;1&quot;</span> <span
                                    style="color: #a6e22e">item-weight=</span>
                            <span style="color: #e6db74">&quot;2&quot;</span> <span
                                    style="color: #a6e22e">item-link=</span>
                            <span style="color: #e6db74">&quot;http://sandbox.alepay.vn/&quot;</span> <span
                                    style="color: #a6e22e">item-image=</span>
                            <span style="color: #e6db74">&quot;http://192.168.11.40/demoalepay/sc-sdk-php/image/iphone-6s-plus-64gb-400-400x450.png&quot;</span>
                            <span style="color: #f92672">&gt;&lt;/items&gt;</span>
                            <span style="color: #f92672">&lt;/div&gt;</span>
                        </pre>
            </div>
            </p>
            <h4>Thông số kỹ thuật iphone 6 16GB</h4>
            <table class="table">
                <tr>
                    <td>Màn hình</td>
                    <td>LED-backlit IPS LCD, 7.9 inch</td>
                </tr>
                <tr>
                    <td>Hệ điều hành</td>
                    <td>iOS 8</td>
                </tr>
                <tr>
                    <td>Vi xử lí CPU</td>
                    <td>Dual - Core, 1 GHz</td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td>512 MB</td>
                </tr>
                <tr>
                    <td>Bộ nhớ trong</td>
                    <td>64 GB, 32 GB, 16 GB</td>
                </tr>
                <tr>
                    <td>Camera</td>
                    <td>5 MP(2592 x 1944 pixels)</td>
                </tr>
                <tr>
                    <td>Kết nối</td>
                    <td>Không 3G, Wifi chuẩn 802.11 a/b/g/n</td>
                </tr>
                <tr>
                    <td>Đàm thoại</td>
                    <td>Face Time</td>
                </tr>
                <tr>
                    <td>Dung lượng pin</td>
                    <td>4490mAh(16.3Wh)</td>
                </tr>
            </table>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; Company 2014</p>
    </footer>
{{--<script>--}}
{{--(function (d, s, id, exports) {--}}
{{--exports.SDK_URI = exports.SDK_URI || 'alepay-sdk-php/?action=sendOrderToAlepay';--}}
{{--var js, fjs = d.getElementsByTagName(s)[0];--}}
{{--if (d.getElementById(id))--}}
{{--return;--}}
{{--js = d.createElement(s);--}}
{{--js.id = id;--}}
{{--js.src = "alepay-sdk-php/scripts/sc-button.js";--}}
{{--fjs.parentNode.insertBefore(js, fjs);--}}
{{--}(document, 'script', 'sc-jssdk', window));--}}
{{--</script>--}}
</body>

</html>