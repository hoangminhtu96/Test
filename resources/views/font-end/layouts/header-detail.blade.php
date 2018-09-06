
<div class="headerdetails">
    <div class="pull-right">
        <ul class="nav topcart pull-left">
            <li class="dropdown hover carticon "> <a href="#" class="dropdown-toggle" >Giỏ Hàng <span class="label label-orange font14">{{Cart::count()}} item(s)</span> - {{cart::total()}} VNĐ <b class="caret"></b></a>
                @if(cart::count() > 0)
                <ul class="dropdown-menu topcartopen ">
                    <li>
                        <table>
                            <tbody>
                                @foreach(Cart::content() as $item)
                                <tr ">
                                    <td class="" style="line-height: 70px"><img width="50px" height="50px" src="{{asset('upload/'.$item->options->image)}}" alt=""></td>
                                    <td class="name" style="line-height: 70px"><a href="{{url('chi-tiet-san-pham',[$item->id,$item->name])}}">{{$item->name}}</a></td>
                                    
                                    <td class="quantity" style="line-height: 70px">*&nbsp;{{$item->qty}}</td>
                                    <td class="total" style="line-height: 70px">{{number_format($item->price)}}</td>
                                    <td class="remove" style="line-height: 70px"><i class="icon-remove"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="textright"><b>Total:</b></td>
                                    <td class="textright">
                                        @if(Cart::count() > 0)
                                            {{cart::total()}}
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="well pull-right buttonwrap"> <a class="btn btn-orange" href="{!!route('giohang')!!}">Giỏ hàng</a> <a class="btn btn-orange" href="{!!route('thanhtoan')!!}">Thanh toán</a> </div>
                    </li>
                </ul>
                @endif
            </li>
        </ul>
    </div>
</div>