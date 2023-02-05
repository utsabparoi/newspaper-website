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

                <li>
                    <a href="{{ route('ads-management.index') }}">Ads Management</a>
                </li>
                <li class="active">Add Ads</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-plus"></i> Add New Ads
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('ads-management.index') }}" class="">
                        <i class="fa fa-list-alt"></i> View <span class="hide-in-sm">Ads</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('ads-management.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" no-padding-right" for="form-field-1"> Ads Script </label>
                                    <div >
                                        <textarea name="script" placeholder="Ads Script" class="form-control" id="inputImagePath"></textarea>
                                    </div>
                                </div>
                                <div class="file-upload form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose New Image </label>
                                    <div class="file-upload-select">
                                        <div class="file-select-button" >Choose File</div>
                                        <div class="file-select-name">No file chosen...</div>
                                        <input type="file" name="ads_image" id="file-upload-input">
                                    </div>
                                    <small class="text-danger">* Image maximum width and height (1000 X 120)</small>
                                </div>
                                <div class="form-group">
                                    <div >
                                        <label class=" control-label no-padding-right" for="position_id"> Select Ads Position <span class="text-danger">*</span></label>
                                        <select name="position_id" type="number" class="form-control" >
                                            <option value="" >-Select a Position-</option>
                                            @foreach ($ads_position as $position)
                                                <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Ads Serial Number </label>
                                    <div >
                                        <input name="serial_num" type="number" id="form-field-1" placeholder="Ads Serial Number" class="form-control">
                                        @if ($errors->has('serial_num'))
                                            <span class="text-danger">{{ $errors->first('serial_num') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group width-100">
                                        <span class="input-group-addon width-20" style="text-align: left">
                                            Status
                                        </span>
                                        <div class="toggle-btn active">
                                            <input type="checkbox" name="status" checked class="cb-value" />
                                            <span class="round-btn"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group width-100">
                                        <span class="input-group-addon width-20" style="text-align: left">
                                            Is active file Image or Script
                                        </span>
                                        <div class="toggle-btn active">
                                            <input type="checkbox" name="script_image_status" checked class="cb-value" />
                                            <span class="round-btn"></span>
                                        </div>
                                    </div>
                                    <small class="text-danger">* Status ON(1) for show Script and OFF(0) for show Image</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right" style="margin-top: 40px; margin-right:6%">
                            <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Submit</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
