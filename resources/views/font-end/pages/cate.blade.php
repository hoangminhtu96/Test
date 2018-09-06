@extends('font-end.master')
@section('cate')
<div id="maincontainer">
	<section id="product">
		<div class="container">
			<!--  breadcrumb -->  
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a>
					<span class="divider">/</span>
				</li>
				<li class="active">Category</li>
			</ul>
			<div class="row">        
				<!-- Sidebar Start-->
				<aside class="col-lg-3">
					<!-- Category-->  
					<div class="sidewidt">
						<h2 class="heading2"><span>Sản phẩm liên quan</span></h2>
						<ul class="nav nav-list categories">
							@foreach($menu_cate as $item_cate)
							<li>
								<a href="{!!url('loai-san-pham',[$item_cate->id,$item_cate->alias])!!}">{!!$item_cate->name!!}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<!--  Best Seller -->  
					<div class="sidewidt">
						<h2 class="heading2"><span>Sản phẩm bán chạy</span></h2>
						<ul class="bestseller">
							<li>
								<img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
								<a class="productname" href="product.html"> Product Name</a>
								<span class="procategory">Women Accessories</span>
								<span class="price">$250</span>
							</li>
							<li>
								<img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
								<a class="productname" href="product.html"> Product Name</a>
								<span class="procategory">Electronics</span>
								<span class="price">$250</span>
							</li>
							<li>
								<img width="50" height="50" src="img/prodcut-40x40.jpg" alt="product" title="product">
								<a class="productname" href="product.html"> Product Name</a>
								<span class="procategory">Electronics</span>
								<span class="price">$250</span>
							</li>
						</ul>
					</div>
					<!-- Latest Product -->  
					<div class="sidewidt">
						<h2 class="heading2"><span>Sản phẩm mới</span></h2>
						<ul class="bestseller">
							@foreach($product_new as $item_new)
							<li>
								<img width="50" height="50" src="{{asset('upload/'.$item_new->image)}}" alt="product" title="product">
								<a class="productname" href="{{url('chi-tiet-san-pham',[$item_new->id,$item_new->alias])}}">{!!$item_new->name!!}</a>
								<span class="procategory">{!!$name_cate_product->name!!}</span>
								<span class="price">{!!number_format($item_new->price)!!}</span>
							</li>
							@endforeach
						</ul>
					</div>
					<!--  Must have -->  
					<div class="sidewidt">
						<h2 class="heading2"><span>Must have</span></h2>
						<div class="flexslider" id="mainslider">
							<ul class="slides">
								<li>
									<img src="{{asset('font-end/img/product1.jpg')}}" alt="" />
								</li>
								<li>
									<img src="{{asset('font-end/img/product2.jpg')}}" alt="" />
								</li>
							</ul>
						</div>
					</div>
				</aside>
				<!-- Sidebar End-->
				<!-- Category-->
				<div class="col-lg-9">          
					<!-- Category Products-->
					<section id="category">
						<!-- Sorting-->
						<div class="sorting well">
							<form class=" form-inline pull-left">
								Sort By :
								<select>
									<option>Default</option>
									<option>Name</option>
									<option>Pirce</option>
									<option>Rating </option>
									<option>Color</option>
								</select>
								&nbsp;&nbsp;
								Show:
								<select>
									<option>10</option>
									<option>15</option>
									<option>20</option>
									<option>25</option>
									<option>30</option>
								</select>
							</form>
							<div class="btn-group pull-right">
								<button class="btn" id="list"><i class="icon-th-list"></i>
								</button>
								<button class="btn btn-orange" id="grid"><i class="icon-th icon-white"></i></button>
							</div>
						</div>
						<!-- Category-->
						<section id="categorygrid">
							<ul class="thumbnails grid">
								@foreach($product_cate as $item_product)
								<li class="col-lg-4 col-sm-6">
									<a class="prdocutname" href="{{url('chi-tiet-san-pham',[$item_product->id,$item_product->alias])}}">{!!$item_product->name!!}</a>
									<div class="thumbnail" style="height: 360px;">
										<span class="sale tooltip-test">Sale</span>
										<a href="{{url('chi-tiet-san-pham',[$item_product->id,$item_product->alias])}}"><img alt="" src="{{ asset('upload/'.$item_product->image)}}"></a>
										<!-- <div class="shortlinks">
											<a class="details" href="#">DETAILS</a>
											<a class="wishlist" href="#">WISHLIST</a>
											<a class="compare" href="#">COMPARE</a>
										</div> -->
										
									</div>
									<div class="pricetag">
										<span class="spiral"></span><a href="{{url('mua-hang',[$item_product->id,$item_product->name])}}" class="productcart">ADD TO CART</a>
										<div class="price">
											<div class="pricenew">{!!number_format($item_product->price)!!}</div>
											<div class="priceold"></div>
										</div>
									</div>
								</li>
								@endforeach
							</ul>
							<ul class="thumbnails list row">
								<li>
									<div class="thumbnail">
										<div class="row">
											<div class="col-lg-4 col-sm-4">
												<span class="offer tooltip-test" >Offer</span>
												<a href="#"><img alt="" src="img/product1.jpg"></a>
											</div>
											<div class="col-lg-8 col-sm-8">
												<a class="prdocutname" href="product.html">Product Name Here</a>
												<div class="productdiscrption"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.<br>
													<br>
													Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan </div>
												<div class="pricetag">
													<span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
													<div class="price">
														<div class="pricenew">$4459.00</div>
														<div class="priceold">$5000.00</div>
													</div>
												</div>
												<div class="shortlinks">
													<a class="details" href="#">DETAILS</a>
													<a class="wishlist" href="#">WISHLIST</a>
													<a class="compare" href="#">COMPARE</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="thumbnail">
										<div class="row">
											<div class="col-lg-4 col-sm-4">
												<span class="offer tooltip-test" >Offer</span>
												<a href="#"><img alt="" src="img/product1.jpg"></a>
											</div>
											<div class="col-lg-8 col-sm-8">
												<a class="prdocutname" href="product.html">Product Name Here</a>
												<div class="productdiscrption"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.<br>
													<br>
													Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan </div>
												<div class="pricetag">
													<span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
													<div class="price">
														<div class="pricenew">$4459.00</div>
														<div class="priceold">$5000.00</div>
													</div>
												</div>
												<div class="shortlinks">
													<a class="details" href="#">DETAILS</a>
													<a class="wishlist" href="#">WISHLIST</a>
													<a class="compare" href="#">COMPARE</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="thumbnail">
										<div class="row">
											<div class="col-lg-4 col-sm-4">
												<span class="offer tooltip-test" >Offer</span>
												<a href="#"><img alt="" src="img/product1.jpg"></a>
											</div>
											<div class="col-lg-8 col-sm-8">
												<a class="prdocutname" href="product.html">Product Name Here</a>
												<div class="productdiscrption"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.<br>
													<br>
													Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan </div>
												<div class="pricetag">
													<span class="spiral"></span><a href="#" class="productcart">ADD TO CART</a>
													<div class="price">
														<div class="pricenew">$4459.00</div>
														<div class="priceold">$5000.00</div>
													</div>
												</div>
												<div class="shortlinks">
													<a class="details" href="#">DETAILS</a>
													<a class="wishlist" href="#">WISHLIST</a>
													<a class="compare" href="#">COMPARE</a>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
							<div>
								<ul class="pagination pull-right">
									@if($product_cate->currentPage() != 1)
										<li><a href="{!!$product_cate->previousPageUrl()!!}">Prev</a></li>
									@endif	
									@for($i =1; $i <= $product_cate->lastPage(); $i++)
										<li class="
											@if($product_cate->currentPage() == $i)
											active
											@endif
										">
											<a href="{!!$product_cate->url($i)!!}">{!!$i!!}</a>
										</li>
									@endfor
									@if($product_cate->currentPage() != $product_cate->lastPage())
										<li><a href="{!!$product_cate->nextPageUrl()!!}">Next</a></li>
									@endif
								</ul>
							</div>
						</section>
					</section>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection()