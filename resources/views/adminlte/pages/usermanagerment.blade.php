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
                    User Managerment
                </h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard.getDashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    {{--<li><a href="#">Examples</a></li>--}}
                    <li class="active">User Managerment</li>
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
                                <th>Confirmed</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @include('adminlte.blocks.errors')
                            @include('adminlte.blocks.alerts')
                            @if(!empty($users))
                                @foreach($users as $userData => $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.dashboard.getUserProfile', [$user->id]) }}">{{ $user->id }}</a>
                                        </td>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->username }}</td>
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
                                            @if($user->confirmed === 1)
                                                TRUE
                                            @else
                                                FALSE
                                            @endif
                                        </td>
                                        <td>
                                            <a id="btnUpdate" data-id="{{$user->id}}"
                                               class="btn btn-block btn-xs btn-flat btn-primary btnUpdate" data-target="#modal-update"
                                               data-toggle="modal">Update</a>
                                        </td>
                                        <td>
                                            <a id="btnDelete" data-id="{{ $user->id }}"
                                               class="btn btn-block btn-xs btn-flat btn-danger btnDelete"
                                            >Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">1</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">2</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">3</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">4</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">5</a>
                    <a type="button" id="viewAllUser" class="btn btn-sm btn-default btn-flat pull-right">View All
                        Users</a>
                </div>
                <!-- /.box-footer -->
            </div>

            <div class="modal fade" id="modal-update" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Update Information User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box box-primary">
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form id="formUpdateUser" role="form" action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputFullName">Full Name</label>
                                            <input type="text" class="form-control" id="exampleInputFullName"
                                                   placeholder="Full Name" value="" name="fullname" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email Address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail"
                                                   placeholder="Enter Email" value="" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAddress">Address</label>
                                            <input type="text" class="form-control" id="exampleInputAddress"
                                                   placeholder="Address" value="" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputConfirmed">Confirmed</label>
                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input id="confirmedChecked1" value="1" type="radio"
                                                           name="confirmed">
                                                    Actived</label>
                                                <label class="radio-inline">
                                                    <input id="confirmedChecked0" value="0" type="radio"
                                                           name="confirmed" checked="checked" required>
                                                    Not Active</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputLevel">Level</label>
                                            <div class="form-group">
                                                <label class="radio-inline"><input id="levelChecked1"
                                                                                   value="1"
                                                                                   type="radio"
                                                                                   name="level">Admin</label>
                                                <label class="radio-inline"><input id="levelChecked2"
                                                                                   value="2"
                                                                                   type="radio"
                                                                                   name="level">Mod</label>
                                                <label class="radio-inline"><input id="levelChecked3"
                                                                                   value="3"
                                                                                   type="radio"
                                                                                   name="level">Gangster</label>
                                                <label class="radio-inline"><input id="levelChecked4"
                                                                                   value="4"
                                                                                   type="radio"
                                                                                   name="level"
                                                                                   checked="checked"
                                                                                   required>Member</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputGender">Level</label>
                                            <div class="form-group">
                                                <label class="radio-inline"><input id="genderChecked1" value="1"
                                                                                   type="radio"
                                                                                   name="gender">Male</label>
                                                <label class="radio-inline"><input id="genderChecked2" value="2"
                                                                                   type="radio"
                                                                                   name="gender">Female</label>
                                                <label class="radio-inline"><input id="genderChecked3" value="3"
                                                                                   type="radio"
                                                                                   name="gender">Gay</label>
                                                <label class="radio-inline"><input id="genderChecked4" value="4"
                                                                                   type="radio"
                                                                                   name="gender" checked="checked"
                                                                                   required>Les</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left"
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
    @endsection
    <!-- /.content-wrapper -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')

@endpush