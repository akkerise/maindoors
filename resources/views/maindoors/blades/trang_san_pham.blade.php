@extends('master')

@section('content')
<!-- END Header -->
<div class="content">
	<div class="dcontainer">
		<div id="sp-depart-name"><!--ten can ho-->
			<a href="#"><img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" alt=""/></a>
			<h1>Căn hộ Hateco Hoàng Mai</h1>
			<p>Đăng bởi <span>Xuan Dung</span> 23 tháng 5 lúc 21:20</p>
		</div><!--ENd ten can ho-->
		<div id="sp-introduce">
			<div id="video-360">
				<img src="images/Trang_san_pham_VIdeo_07.jpg">
			</div>
			<div id="sp-anh-noi-that">
				<a href="#"><img src="{{ asset('images/Trang_san_pham_anh_nt_03.jpg') }}"/></a>
				<a href="#"><img src="{{ asset('images/Trang_san_pham_anh_nt_06.jpg') }}"/></a>
				<a href="#"><img src="{{ asset('images/Trang_san_pham_anh_nt_08.jpg') }}"/></a>
			</div>
			<div id="sp-map">
				<div id="gg-earch">
					<img src="{{ asset('images/Trang_san_pham_GG_earch_05.jpg') }}"/>
				</div>
				<div id="sp-img-3d">
					<img src="{{ asset('images/Trang_san_pham_anh_360_10.jpg') }}"/>
				</div>
				<div id="gg-map">
					<img src="{{ asset('images/Trang_san_pham_GG_map_11.jpg') }}"/>
				</div>
			</div>
		</div>
		<!--tham dinh bds-->
		<div id="tham-dinh-bds">
			<div id="tong-quan">
				<h2>Thẩm định Bất Động Sản</h2>
				<p id="chi-duong">Đi đến 72 Ngọc Khánh, Q.Hoàng Mai, HN</p>
				<img src="{{ asset('images/Trang_san_pham_video_bar_03.jpg') }}" />
				<h2>Tổng Quan</h2>
				<table id="chi-tiet">
					<tr>
						<td class="first-title">Chủ đầu tư:</td>
						<td>Công ty cổ phần Hateco Hà Nội</td>
					</tr>
					<tr>
						<td class="first-title">Tổng thuầu thi công:</td>
						<td>Công ty cổ phần đầu tư và xây dựng Xuân Mai</td>
					</tr>
					<tr>
						<td class="first-title">Vị trí:</td>
						<td>Mặt đường vành đai 3, liền kề công viên Yên Sở,Hà Nội</td>
					</tr>
					<tr>
						<td class="first-title">Đơn vị phân phối:</td>
						<td>Công ty cổ phần dịch vụ địa ốc Đất Xanh Miền Bắc</td>
					</tr>
					<tr>
						<td class="first-title">Tổng diện tích:</td>
						<td>17.592m2</td>
					</tr>
					<tr>
						<td class="first-title">Diện tích xây dựng:</td>
						<td>4.937m2</td>
					</tr>
					<tr>
						<td class="first-title">Xu hướng phát triển:</td>
						<td>But I must explain to you how all this mistaken idea of denouncing
							pleasure and praising pain was born and I will give you a complete
							account of the system
						</td>
					</tr>
					
				</table>
			</div><!--End tong quan-->
			<div id="cong-cu">
				<div id="all-cong-cu">
					<div class="item-cong-cu">
						<a href="#"><img src="{{ asset('images/Trang_san_pham_4_icon_03.png') }}"></a>
						<h3>Tính lãi vay</h3>
					</div>
					<div class="item-cong-cu">
						<a href="#"><img src="{{ asset('images/Trang_san_pham_4_icon_05.png') }}"></a>
						<h3>So sánh giá, vị trí,...</h3>
					</div>
					<div class="item-cong-cu">
						<a href="#"><img src="{{ asset('images/Trang_san_pham_4_icon_09.png') }}"></a>
						<h3>Hợp đồng mẫu</h3>
					</div>
					<div class="item-cong-cu">
						<a href="#"><img src="{{ asset('images/Trang_san_pham_4_icon_11.png') }}"></a>
						<h3>Tư vấn chat</h3>
					</div>
				</div>
				<button>Tải xuống bộ tài liệu <img src="{{ asset('images/Trang_san_pham_download_03.png') }}"/></button>
			</div>
		</div><!--END tham dinh bds-->
		<!--Comment-->
		<div id="comment-and-like">
			<div id="comment">
				<div id="add-comment">
					<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
					<textarea name="add-cmt" placeholder="Viet Binh Luan..."></textarea>
				</div>
				<p class="total-cmt">21 Bình luận</p>
				<ul>
					<li>
						
						<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
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
						<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
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
						<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
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
						<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
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
						<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
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
						<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
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
						<img src="{{ asset('images/Trang_san_pham_Anh_dai_dien_03.png') }}" />
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

</div>
<!-- END class Content -->
@endsection