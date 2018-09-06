@extends('Admin.master')
@section('content')
<style type="text/css" media="screen">
    .icon_del{margin-top: -130px;margin-left: -20px}
</style>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <form action="" method="POST" enctype="multipart/form-data" name="edit">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('Admin.errors')
                        
                            <input type='hidden' name='_token' value='{{csrf_token()}}' />
                            <select class="form-control" name ="sltParent">
                                <option value="" >Please Choose Category</option>
                                {{ cate_parent($cate,0,'--',$product['cate_id']) }}
                            </select>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" value="{!! $product['name'] !!}" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" value="{!! $product['price'] !!}"placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! $product['intro'] !!}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! $product['content'] !!}</textarea>
                            </div>
                            <div class="form-group" >
                                <label>Images Curent</label></br>
                                <img name="img-current" style="width:150px; height: 150px" src="{!! asset('resources/upload/'.$product['image']) !!}" >
                                <input type="hidden" name="img-current" value="{!! $product['image'] !!}">
                            </div><div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeyword" value="{!! $product['keyword'] !!}" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="txtDescription">{!! $product['description'] !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        
                    </div>

                    <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <label>Images Detail Crrent</label></br></br>
                            @foreach($product_img as $key => $item)
                                <div class="form-group" id="{!! $key !!}" >
                                    <img style="width:150px; height: 150px"  id="{!! $key !!}" idHinh="{!! $item['id'] !!}" src="{!! asset('resources/upload/detail/'.$item['image']) !!}">
                                    <a href="javascript:void(0)" onclick="return Xacnhanxoa('Bạn muốn xoá !')" type="button" class="btn btn-danger icon_del" id="del-img"><i class="fa fa-times"></i></a>
                                    <input type="hidden" name="f-name-current[]" value="{!! $item['image'] !!}" />
                                    <input type="file" name="fEdit-detail[]" style="margin-top:5px">
                                </div> 
                            @endforeach

                        <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
                        <div id="insert" style="margin-top:20px"></div>
                    </div>
                </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection()