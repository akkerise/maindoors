@extends('master')

@section('content')
    <div class="san-pham-notthat-vlxd">
        <div class="san-pham-noithat-vlxd-title">
            <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}">
            <a href="#"><h3>Nội thất nhà xinh</h3></a>
            <span>Đăng bởi <strong>Xuan Dung</strong> 23 tháng 5 lúc 21:20</span>
        </div>
        <div class="slide-image-noithat-vlxd">
            <div id="va-accordion" class="va-container">
                <div class="va-nav">
                    <span class="va-nav-prev">Previous</span>
                    <span class="va-nav-next">Next</span>
                </div>
                <div class="va-wrapper">
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/01.jpg') }}">
                    </div>
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/02.jpg') }}">
                    </div>
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/03.jpg') }}">
                    </div>
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/04.jpg') }}">
                    </div>
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/05.jpg') }}">
                    </div>
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/06.jpg') }}">
                    </div>
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/07.jpg') }}">
                    </div>
                    <div class="va-slice va-slice-1">
                        <img src="{{ asset('images/noi_that/slide_chitiet/08.jpg') }}">
                    </div>
                </div>
            </div>
        </div>
        <div id="comment-and-like">
            <div id="comment">
                <div id="add-comment">
                    <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                    <textarea name="add-cmt" placeholder="Viet Binh Luan..."></textarea>
                </div>
                <p class="total-cmt">21 Bình luận</p>
                <ul>
                    <li>

                        <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                        <div>
                            <p>Truong Nguyen</p>
                            <p>Nice one Cosmin! I see you're getting totally into AfterEffects? ;-)
                                Or did you use something else for it? Btw: Cheers to you and hopefully
                                you visit Switzerland soon. Gimme a ring when you're here.
                            </p>
                            <p>3 giờ trước</p>
                        </div>

                    </li>
                    <li>
                        <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                        <div>
                            <p>Lorem Ipsum</p>
                            <p>But I must explain to you how all this mistaken idea of denouncing
                                pleasure and praising pain was born and I will give you a complete
                                account of the system
                            </p>
                            <p>4 giờ trước</p>
                        </div>

                    </li>
                    <li>
                        <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                        <div>
                            <p>Lorem Ipsum</p>
                            <p>But I must explain to you how all this mistaken idea of denouncing
                                pleasure and praising pain was born and I will give you a complete
                                account of the system
                            </p>
                            <p>4 giờ trước</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                        <div>
                            <p>Lorem Ipsum</p>
                            <p>But I must explain to you how all this mistaken idea of denouncing
                                pleasure and praising pain was born and I will give you a complete
                                account of the system
                            </p>
                            <p>4 giờ trước</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                        <div>
                            <p>Lorem Ipsum</p>
                            <p>But I must explain to you how all this mistaken idea of denouncing
                                pleasure and praising pain was born and I will give you a complete
                                account of the system
                            </p>
                            <p>4 giờ trước</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                        <div>
                            <p>Lorem Ipsum</p>
                            <p>But I must explain to you how all this mistaken idea of denouncing
                                pleasure and praising pain was born and I will give you a complete
                                account of the system
                            </p>
                            <p>4 giờ trước</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}"/>
                        <div>
                            <p>Lorem Ipsum</p>
                            <p>But I must explain to you how all this mistaken idea of denouncing
                                pleasure and praising pain was born and I will give you a complete
                                account of the system
                            </p>
                            <p>4 giờ trước</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!--Like and share-->
            <div id="like-and-share">
                <div class="like">
                    <img src="{{ asset('images/Trang_san_pham_mang_xh_03.png') }}">
                    <span>Chia sẻ</span>
                    <span id="sp-view">21,946 Lượt xem</span>
                </div>
                <div class="like">
                    <img src="{{ asset('images/Trang_san_pham_mang_xh_06.png') }}">
                    <span>3245 Yêu thích</span>
                </div>
                <div class="like">
                    <img src="{{ asset('images/Trang_san_pham_mang_xh_08.png') }}">
                    <span>Lưu liên kết</span>
                </div>
                <div id="sp-cung-nguoi-dang">
                    <p>Cũng đăng bởi Xuan Dung</p>
                    <img src="{{ asset('images/Trang_san_pham_cung_tg_03.jpg') }}"/>
                    <img src="{{ asset('images/Trang_san_pham_cung_tg_05.jpg') }}"/>
                    <img src="{{ asset('images/Trang_san_pham_cung_tg_09.jpg') }}"/>
                    <img src="{{ asset('images/Trang_san_pham_cung_tg_10.jpg') }}"/>
                </div>
            </div>
        </div><!--End Comment and like-->
    </div>
@endsection