@extends('master')
@section('content')
    <div class="content">
        <div class="form-user-ads">
            <div class="left">
                <div class="head">
                    <img id="logo" src="{{ asset('images/logo-dang-tin.png') }}">
                    <div class="intro">
                        <p id="title">ĐĂNG TIN CỦA BẠN</p>
                        <p>Tin đăng miễn phí - Hiển thị lập tức</p>
                    </div>
                </div>
                <div class="main">
                    <div class="title">Bắt đầu tin đăng của bạn</div>
                    <div class="form-input form-input-inline">
                        <label>Họ tên của bạn là</label>
                        <input class="width350" type="text" placeholder="Vui lòng điền đầy đủ họ tên của bạn...">
                    </div>
                    <div class="form-input form-input-inline">
                        <label>Thuộc danh mục</label>
                        <select>
                            <option>Mua & Bán</option>
                            <option>Nội thất</option>
                            <option>Thuê & Cho thuê</option>
                            <option>Vật liệu xây dựng</option>
                            <option>Đầu tư & Tư vấn</option>
                        </select>
                    </div>
                    <div class="form-input form-input-inline">
                        <label>Thuộc phân mục</label>
                        <select>
                            <option>Đất - Kho - Xưởng</option>
                            <option>Chung cư</option>
                            <option>Nhà Phố</option>
                            <option>Biệt thự</option>
                            <option>Nghỉ dưỡng</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <label>Sản phẩm của bạn</label>
                        <div class="your-product">
                            <input class="width415" type="text" placeholder="Tiêu đề...">
                            <textarea class="width415" placeholder="Nội dung..."></textarea>
                            <button id="fill-quickly">Điền nhanh</button>
                        </div>
                    </div>
                    <div class="form-input form-input-inline">
                        <label>Địa chỉ</label>
                        <input class="width350" type="text" placeholder="Vui lòng điền địa chỉ...">
                    </div>
                    <div class="form-input form-input-inline">
                        <label>Diện tích</label>
                        <input class="width45" type="text"><strong> m2 &nbsp= </strong>
                        <input class="width45" type="text"><strong> PK &nbsp+</strong>
                        <input class="width45" type="text"><strong> PN &nbsp+</strong>
                        <input class="width45" type="text"><strong> WC</strong>
                    </div>
                    <div class="form-inline">
                        <div class="form-input form-input-inline">
                            <label>Số tầng</label>
                            <input class="width45" type="text"><strong> Tầng &nbsp &nbsp &nbsp &nbsp </strong>
                        </div>
                        <div class="form-input form-input-inline">
                            <label>Mặt tiền</label>
                            <input class="width45" type="text"><strong> m</strong>
                        </div>
                    </div>
                    <div class="form-input form-input-inline">
                        <label>Ngày giao nhà</label>
                        <input class="width350" type="text">
                    </div>

                    <div class="form-input form-input-inline">
                        <label>Giá</label>
                        <div class="form-input check-price">
                            <div class="form-input form-input-inline">
                                <input name="check-price" type="radio">
                                <input class="width45" type="text">
                                <select>
                                    <option>Triệu</option>
                                    <option>Tỷ</option>
                                </select>
                            </div>
                            <div class="form-input form-input-inline">
                                <input name="check-price" type="radio"><strong> Liên hệ </strong>
                            </div>
                        </div>
                    </div>
                    <div class="product-images">
                        <label>Ảnh sản phẩm</label>
                        <div class="product-images-upload">
                            <ul>
                                <li>
                                    <input class="imgInp" accept="image/*" type="file" style="color:transparent;"/>
                                    <img class="view-img" src="" alt="your image"/>
                                </li>
                            </ul>
                        </div>
                        <button id="add-img">Thêm ảnh</button>
                    </div>
                    <div class="form-input form-input-inline">
                        <label>Mã đăng tin</label>
                        <input class="width350" type="text" placeholder="Nhập số điện thoại của bạn...">
                    </div>
                </div>
            </div>
            <div class="right">
                <img src="{{ asset('images/dang-tin-right-img.png') }}">
            </div>
        </div>
    </div>
@endsection
@section('page_script')
    <script type="text/javascript">
        // function readURL(input) {
        //      if (this.files && this.files[0]) {
        //          var reader = new FileReader();
        //          reader.onload = function (e) {
        //              $('#view-image').attr('src', e.target.result);
        //          }
        //          reader.readAsDataURL(input.files[0]);
        //      }
        //  }
        jQuery(document.body).on('change', '.imgInp', function (event) {
            var me = $(this);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    me.closest('li').find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });


        // $(".imgInp").on("change",function(){
        // 	alert('c');

        // });


        $('#add-img').click(function () {
            var html = '<li><input class="imgInp" accept="image/*" type="file" style="color:transparent;"/><img class="view-img" src="" alt="your image" /></li>'
            $('.product-images-upload').find('ul').append(html);
        });
    </script>
@endsection

