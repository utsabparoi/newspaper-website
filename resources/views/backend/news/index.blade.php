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
                    <a href="#">Tables</a>
                </li>
                <li class="active">Simple &amp; Dynamic</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    Tables
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Static &amp; Dynamic Tables
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th>#</th>
                                        <th>title</th>
                                        <th>short_description</th>
                                        <th>link</th>
                                        <th>category</th>
                                        <th>sub_category</th>
                                        <th>is_slider</th>
                                        <th>tags</th>
                                        <th>created_by</th>
                                        <th>photo</th>
                                        <th>status</th>
                                        <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_adds as $all_add)
                                        <tr>
                                                <th>{{ $loop->index+1 }}</th>
                                                <td>{{ $all_add->title }}</td>
                                                <td>{{ $all_add->short_description }}</td>
                                                <td>{{ $all_add->link }}</td>
                                                <td>{{ $all_add->fk_category_id }}</td>
                                                <td>{{ $all_add->fk_sub_category_id }}</td>
                                                <td>{{ $all_add->is_slider }}</td>
                                                <td>{{ $all_add->tags }}</td>
                                                <td>{{ $all_add->created_by }}</td>
                                                <td>
                                                    @if ( strpos($all_add->photo,'assets') )
                                                        <img src="{{ asset($all_add->photo) }}" alt="not found" width="80px">
                                                    @else
                                                        <img src="{{asset('img/news/'.$all_add->photo)}}" alt="not found" width="80px">
                                                    @endif
                                                </td>
                                            <td>
                                                <div class="div" style="margin-top:-2px">
                                                    @if ($all_add->status == 1)
                                                        <a href="{{ route('news_status',$all_add->id) }}"><i class="fa fa-toggle-on" style="font-size: 24px"></i></a>
                                                    @else
                                                        <a href="{{ route('news_status',$all_add->id) }}"><i class="fa fa-toggle-off" style="font-size: 24px"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td style="display: flex">
                                                <a href="{{ route('manage-news.edit',$all_add->id) }}" style="margin-bottom: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-top: 0px; margin-right: 5px; font-size:22px;"></i></a>
                                                <form action="{{ route('manage-news.destroy',$all_add->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border:none;"><i class="fa fa-trash-o" aria-hidden="true"  style=" font-size:22px;margin-top: -2px;
                                                        color: red; cursor:pointer"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50">
                                                <div class="alert alert-danger text-center">
                                                    No News to Show
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                              </table>
                              {{-- {{ $all_adds->links() }} --}}
                              {{$all_adds->links('pagination::bootstrap-4')}}
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
