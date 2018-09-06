@extends('font-end.master')
@section('slider')
  @include('font-end.pages.slider')
@endsection
@section('other-detail')
  @include('font-end.layouts.other-detail')
@endsection
@section('home')
  <section id="featured" class="row mt40">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Sản phẩm nổi bật</span></h1>
      <ul class="thumbnails">
        @foreach($items as $item)
        <li class="col-lg-3  col-sm-6">
          <a class="prdocutname" href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}">{!!$item->name!!}</a>
          <div class="thumbnail" style="height: 360px;">
            <span class="sale tooltip-test">Sale</span>
            <a href="{!!url('chi-tiet-san-pham',[$item->id,$item->alias])!!}"><img alt="" src="{!!url('upload/'.$item->image)!!}"></a>
            <!-- <div class="shortlinks">
              <a class="details" href="#">DETAILS</a>
              <a class="wishlist" href="#">WISHLIST</a>
              <a class="compare" href="#">COMPARE</a>
            </div> -->
           </div> 
          <div class="pricetag">
              <span class="spiral"></span><a href="{{url('mua-hang',[$item->id,$item->name])}}" class="productcart">MUA HÀNG</a>
              <div class="price">
                <div class="pricenew">{{number_format($item->price)}}</div>
                <div class="priceold"></div>
              </div>
            </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section>
  
  <!-- Latest Product-->
  {{-- <section id="latest" class="row">
    <div class="container">
      <h1 class="heading1"><span class="maintext">Sản phẩm mới</span><span class="subtext"> See Our  Latest Products</span></h1>
      <ul class="thumbnails">
        @foreach($product_new as $item_n)
        <li class="col-lg-3 col-sm-6">
          <a class="prdocutname" href="{{url('chi-tiet-san-pham',[$item_n->id,$item_n->alias])}}">{!!$item_n->name!!}</a>
          <div class="thumbnail" style="height: 360px">
            <a href="{{url('chi-tiet-san-pham',[$item_n->id,$item_n->alias])}}"><img alt="" src="{{URL('upload/'.$item_n->image)}}"></a>

            <div class="shortlinks">
              <a class="details" href="#">DETAILS</a>
              <a class="wishlist" href="#">WISHLIST</a>
              <a class="compare" href="#">COMPARE</a>
            </div>
            
          </div>
          <div class="pricetag">
            <span class="spiral"></span><a href="{{url('mua-hang',[$item_n->id,$item_n->name])}}" class="productcart">MUA HÀNG</a>
            <div class="price">
              <div class="pricenew">{{number_format($item_n->price)}}</div>
              <div class="priceold"></div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </section> --}}
  
  <!-- Section  Banner Start-->
  <!-- <section class="container smbanner">
    <div class="row">
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
      <div class="col-lg-3 col-sm-6"><a href="#"><img src="img/smbanner.jpg" alt="" title=""></a>
      </div>
    </div>
  </section> -->
  <!-- Section  End-->
</div>

@endsection()