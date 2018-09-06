@extends('Admin.master')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>

                    <form action="{!! url('/Admin/product/add') !!}" method="POST" enctype="multipart/form-data">
                        <!-- /.col-lg-12 -->
                        <div class="col-lg-7" style="padding-bottom:120px">
                        @include('Admin.errors');
                        
                            <input type='hidden' name='_token' value='{{csrf_token()}}' />
                            <select class="form-control" name ="sltParent">
                                <option value="" >Please Choose Category</option>
                                {{ cate_parent($parent,0,'--',old('sltParent')) }}
                            </select>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName"  value="{!! old('txtName') !!}" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" value="{!! old('txtPrice') !!}" placeholder="Please Enter Price" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro') !!} </textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent') !!} </textarea>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div>
                            <div class="form-group">
                                <label>Product Keywords</label>
                                <input class="form-control" name="txtKeyword" value="{!! old('txtKeyword') !!}" placeholder="Please Enter Product Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name='txtDescript'>{!! old('txtDescript') !!} </textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            
                        
                    </div>

                    <div class="col-md-1"></div>
                        <div class="col-md-4">
                        @for($i =0; $i <= 5; $i++ )
                            <div class="form-group">
                                <label>Product Description {!! $i !!}</label>
                                <input type="file" name="fProduc-detail[]" />
                            </div> 
                        @endfor
                    </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection()