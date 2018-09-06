@extends('Admin.master')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=0; ?>
                            @foreach($data as $i)
                                <?php $stt++; ?>
                                <tr class="even gradeC" align="center">
                                    <td>{!! $stt !!}</td>
                                    <td>{!! $i['username'] !!}</td>
                                    <td>
                                        <?php
                                            if($i['level'] == 1 && $i['id'] == 3){ echo "SupperAdmin";}
                                            else{echo "Admin";}
                                        ?>
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a Onclick="return Xacnhanxoa('Bạn chắc chắn muốn xoá!')" href="{!! URL::Route('Admin.user.getDeleteAd',$i['id']) !!}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::Route('Admin.user.getEditAd',$i['id']) !!}">Edit</a></td>
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

@endsection