@extends('Admin.master')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    @include('Admin.errors')
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" value="{!!$user->username!!}"disabled />
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="repass" placeholder="Please Enter RePassword" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{!!$user->email!!}"placeholder="Please Enter Email" />
                            </div>

                            @if(Auth::guard('admin')->user()->level == 1 && Auth::guard('admin')->user()->id != $id)
                                <div class="form-group">
                                    <label>User Level</label>
                                    <label class="radio-inline">
                                        <input name="rdoLevel" value="1" type="radio"
                                            @if($user['level'] == 1)
                                                checked = "checked"
                                            @endif
                                        >Admin
                                    </label>
                                    <label class="radio-inline">
                                        <input name="rdoLevel" value="2" type="radio"
                                            @if($user->level == 2)
                                                checked = "checked"
                                            @endif
                                        >Member
                                    </label>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->    
@endsection

        