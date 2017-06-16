@extends('adminlte.app')
@section('content')
    <!-- Main content -->
    <section class="content">
    {{--{{ dd($eightNewMemberRegisters) }}--}}
    <!-- Info boxes -->
    @include('adminlte.blocks.errors')
    @include('adminlte.blocks.alerts')

    <!-- Content Wrapper. Contains page content -->

        @section('content-header')
            <section class="content-header">
                <h1>
                    User Permission
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard.getDashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    {{--<li><a href="#">Examples</a></li>--}}
                    <li class="active">User Permission</li>
                </ol>
            </section>
    @endsection

    @section('content')
        <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Users</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Emails</th>
                                <th>Level</th>
                                <th>Gender</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--{{ dd($showUserLevel) }}--}}
                            @foreach($showUserLevel as $user)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.dashboard.getUserProfile',[$user->id]) }}">{{ $user->id }}</a>
                                    </td>
                                    <td>{{ $user->fullname }}</td>
                                    <td><span class="label label-success">{{ $user->email }}</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                            @if($user->level === 1)
                                                Amin
                                            @elseif($user->level === 2)
                                                Mod
                                            @elseif($user->level === 3)
                                                Gangster
                                            @elseif($user->level === 4)
                                                Member
                                            @else
                                                Not Human
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($user->gender === 1)
                                            Male
                                        @elseif($user->gender === 2)
                                            Female
                                        @elseif($user->gender === 3)
                                            Gay
                                        @else
                                            Les
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-xs btn-flat btn-default"
                                                data-toggle="modal" data-target="#modal-update">
                                            <a href="#">Update</a>
                                        </button>
                                        <div class="modal fade" id="modal-update" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Update Information User</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="box box-primary">
                                                            <!-- /.box-header -->
                                                            <!-- form start -->
                                                            <form role="form"
                                                                  action="{{ route('admin.dashboard.postUpdateUser', [$user->id]) }}"
                                                                  method="post">
                                                                {{ csrf_field() }}
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputFullName">Full
                                                                            Name</label>
                                                                        <input type="text`" class="form-control"
                                                                               id="exampleInputFullName"
                                                                               placeholder="Full Name"
                                                                               value="{{ $user->fullname }}"
                                                                               name="fullname">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Email
                                                                            Address</label>
                                                                        <input type="email" class="form-control"
                                                                               id="exampleInputEmail"
                                                                               placeholder="Enter Email"
                                                                               value="{{ $user->email }}" name="email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputAddress">Address</label>
                                                                        <input type="text" class="form-control"
                                                                               id="exampleInputAddress"
                                                                               placeholder="Address"
                                                                               value="{{ $user->address }}"
                                                                               name="address">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputConfirmed">Confirmed</label>
                                                                        <div class="form-group">
                                                                            <label class="radio-inline"><input
                                                                                        value="true" type="radio"
                                                                                        name="confirmed">Actived</label>
                                                                            <label class="radio-inline"><input
                                                                                        value="false" type="radio"
                                                                                        name="confirmed">Not
                                                                                Active</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputLevel">Level</label>
                                                                        <div class="form-group">
                                                                            <label class="radio-inline"><input value="1"
                                                                                                               type="radio"
                                                                                                               name="level">Admin</label>
                                                                            <label class="radio-inline"><input value="2"
                                                                                                               type="radio"
                                                                                                               name="level">Mod</label>
                                                                            <label class="radio-inline"><input value="3"
                                                                                                               type="radio"
                                                                                                               name="level">Gangster</label>
                                                                            <label class="radio-inline"><input value="4"
                                                                                                               type="radio"
                                                                                                               name="level">Member</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputGender">Level</label>
                                                                        <div class="form-group">
                                                                            <label class="radio-inline"><input value="1"
                                                                                                               type="radio"
                                                                                                               name="gender">Male</label>
                                                                            <label class="radio-inline"><input value="2"
                                                                                                               type="radio"
                                                                                                               name="gender">Female</label>
                                                                            <label class="radio-inline"><input value="3"
                                                                                                               type="radio"
                                                                                                               name="gender">Gay</label>
                                                                            <label class="radio-inline"><input value="4"
                                                                                                               type="radio"
                                                                                                               name="gender">Les</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-default pull-left"
                                                                            data-dismiss="modal">Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">Update
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </td>
                                    <td>
                                        {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-danger">Delete</button>--}}
                                        <a class="btn btn-block btn-xs btn-flat btn-danger"
                                           href="{{ route('admin.dashboard.getDeleteUser',[$user->id]) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{--<tr>--}}
                            {{--<td><a href="pages/examples/invoice.html">OR1848</a></td>--}}
                            {{--<td>Samsung Smart TV</td>--}}
                            {{--<td><span class="label label-warning">Pending</span></td>--}}
                            {{--<td>--}}
                            {{--<div class="sparkbar" data-color="#f39c12" data-height="20">--}}
                            {{--90,80,-90,70,61,-83,68--}}
                            {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-primary">Update</button>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-danger">Delete</button>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><a href="pages/examples/invoice.html">OR7429</a></td>--}}
                            {{--<td>iPhone 6 Plus</td>--}}
                            {{--<td><span class="label label-danger">Delivered</span></td>--}}
                            {{--<td>--}}
                            {{--<div class="sparkbar" data-color="#f56954" data-height="20">--}}
                            {{--90,-80,90,70,-61,83,63--}}
                            {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-primary">Update</button>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-danger">Delete</button>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><a href="pages/examples/invoice.html">OR7429</a></td>--}}
                            {{--<td>Samsung Smart TV</td>--}}
                            {{--<td><span class="label label-info">Processing</span></td>--}}
                            {{--<td>--}}
                            {{--<div class="sparkbar" data-color="#00c0ef" data-height="20">--}}
                            {{--90,80,-90,70,-61,83,63--}}
                            {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-primary">Update</button>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-danger">Delete</button>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><a href="pages/examples/invoice.html">OR1848</a></td>--}}
                            {{--<td>Samsung Smart TV</td>--}}
                            {{--<td><span class="label label-warning">Pending</span></td>--}}
                            {{--<td>--}}
                            {{--<div class="sparkbar" data-color="#f39c12" data-height="20">--}}
                            {{--90,80,-90,70,61,-83,68--}}
                            {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-primary">Update</button>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-danger">Delete</button>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><a href="pages/examples/invoice.html">OR7429</a></td>--}}
                            {{--<td>iPhone 6 Plus</td>--}}
                            {{--<td><span class="label label-danger">Delivered</span></td>--}}
                            {{--<td>--}}
                            {{--<div class="sparkbar" data-color="#f56954" data-height="20">--}}
                            {{--90,-80,90,70,-61,83,63--}}
                            {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-primary">Update</button>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-danger">Delete</button>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><a href="pages/examples/invoice.html">OR9842</a></td>--}}
                            {{--<td>Call of Duty IV</td>--}}
                            {{--<td><span class="label label-success">Shipped</span></td>--}}
                            {{--<td>--}}
                            {{--<div class="sparkbar" data-color="#00a65a" data-height="20">--}}
                            {{--90,80,90,-70,61,-83,63--}}
                            {{--</div>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-primary">Update</button>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                            {{--<button type="button" class="btn btn-block btn-xs btn-flat btn-danger">Delete</button>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New User</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All
                        Users</a>
                </div>
                <!-- /.box-footer -->
            </div>
    @endsection
    <!-- /.content-wrapper -->
    </section>
    <!-- /.content -->
@endsection