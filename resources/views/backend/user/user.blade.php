@extends('layouts.app')
@section('main_content')
    <div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="active">User</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                               autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        {{-- main content start from here --}}
        <div class="page-content">
            <div class="row">

                <div class="col-sm-12">
                    <div class="widget-box" style="border: none">
                        <div class="widget-header">
                            <h4 class="widget-title">
                                <div class="d-flex" style="display: flex;justify-content: space-between">
                                    <span>
                                        <i class="fa fa-list"></i> User
                                    </span>
                                    <a href="{{ route('createUserForm') }}" class="float-right">
                                        <i class="fa fa-pencil-square-o"></i>Create User
                                    </a>
                                </div>
                            </h4>
                            <span class="widget-toolbar">
                            </span>
                        </div>

                        <div class=" mt-2">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover new-table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Username</th>
                                        <th>Email</th>
{{--                                        <th>Status</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $serialNo = 1; @endphp
                                    @foreach ($allUser as $allUsers)
                                            <tr>
                                                <td>@php echo $serialNo; @endphp</td>
                                                <td>{{ $allUsers->name }} <br> </td>
                                                <td>{{ $allUsers->email }}</td>

                                                <td class="text-center">

                                                    @if($allUsers->id != Auth::id())
                                                        <!---------------  EDIT---------------->
                                                        <a href="/editUserForm/{{ $allUsers->id }}" role="button"
                                                            class="btn btn-xs btn-success bs-tooltip padding-icon" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <a href="/userDelete/{{ $allUsers->id }}" role="button"
                                                        class="btn btn-xs btn-danger bs-tooltip" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    @else
                                                        <!---------------  EDIT---------------->
                                                        <a href="/editUserForm/{{ $allUsers->id }}" role="button"
                                                            class="btn btn-xs btn-success bs-tooltip" title="Edit" style="margin-left:-28px;">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                    @endif


                                                </td>
                                            </tr>
                                            @php $serialNo++; @endphp
                                    @endforeach

                                    </tbody>
                                </table>
                                <div align="center">
                                    {{$allUser->links()}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        {{-- main content end  --}}
    </div>
    </div>
@endsection
