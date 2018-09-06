@extends('Admin.master')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category Parent</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 0 ?>
                            @foreach ($data as $value)
                                <tr class="odd gradeX" align="center">
                                    <td> {!! $stt !!}</td>
                                    <td>{!! $value['name'] !!}</td>
                                    <td>
                                        
                                        @if($value['parent_id'] == 0)
                                            {!! "None" !!}
                                         @else
                                            <?php $parent = DB::table('cates')->where('id',$value['parent_id'])->first(); ?>
                                            {!! $parent->name !!}
                                            
                                        @endif
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! URL::route('Admin.cate.getDelete',$value['id']) !!}"> Delete </a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('Admin.cate.getEdit',$value['id']) !!}">Edit </a></td>
                                </tr>
                                <?php $stt = $stt +1 ?>
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