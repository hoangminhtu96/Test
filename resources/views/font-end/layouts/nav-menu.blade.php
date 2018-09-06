<div id="categorymenu">
    <nav class="subnav">
        <ul class="nav-pills categorymenu">
             <li><a href="{!!url('/')!!}">Trang chủ</a>
                <?php $menu_lv1 = App\Cate::select('id','name','parent_id','alias')->where('parent_id',0)->get()?>
                @foreach($menu_lv1 as $item1)
                    <?php $menu_lv2 = App\Cate::select('id','name','parent_id','alias')->where('parent_id',$item1->id)->get()?>
                    <li><a  href="{!!URL('loai-san-pham',[$item1->id,$item1->alias])!!}">{!!$item1->name!!}</a>
                    <div>
                        <ul>
                           @foreach($menu_lv2 as $item2)
                           <li><a href="{!!url('loai-san-pham',[$item2->id,$item2->alias])!!}">{!!$item2->name!!}</a> </li>
                           @endforeach
                       </ul>
                     </div>
                @endforeach
                
            </li>
            <li><a href="myaccount.html">My Account & other</a>
                <div>
                    <ul>
                        @if(Auth::check())
                        <li><a href="myaccount.html">Xin chào: {{Auth::user()->username}}</a> </li>
                        <li><a href="{!!route('thanhtoan-Logout')!!}">Đăng Xuất</a> </li>
                        @else
                        <li><a href="{!!route('getLogin')!!}">Đăng nhập</a> </li>
                        <li><a href="{!!route('getRegister')!!}">Đăng ký</a> </li>
                        @endif
                        <li><a href="{{url('lien-he')}}">Liên hệ</a> </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>