@extends('Admin.master')
@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>

                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt =0 ?>
                            @foreach($data as $item)
                            <?php $stt++ ?>
                            <tr class="odd gradeX" align="center">
                                <td>{!! $stt !!} </td>
                                <td>{!! $item['name'] !!}</td>
                                <td>{!! number_format($item['price'],0,',','.') !!} VNĐ</td>
                                <td>
                                    {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans() !!}
                                </td>
                                <td>
                                    <?php $cat = DB::table('cates')->where('id',$item['cate_id'])->first(); ?>
                                    {{ $cat->name }}
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::Route('Admin.product.getDelete',$item['id']) !!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::Route('Admin.product.getEdit',$item['id']) !!}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection()