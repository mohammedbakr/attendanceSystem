@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h3 class="box-title" style="margin-bottom: 15px">
                @lang('site.attendance percentage') <i class="fa fa-percent">{{$attendance_percentage}}</i>
            </h3>
   
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.attendance percentage')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <a href="{{route('dashboard.notenrolled')}}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>


                </div><!-- end of box header -->

                <div class="box-body">

                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>التاريخ</th>
                                    <th>الحضور</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($student->attendances as $index=>$attendance)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$attendance->created_at->format('l , j/M/Y')}}</td>
                                        <td>
                                            @if ($attendance->attended == 1)
                                            <div class="label label-success"> <i class="fa fa-check"></i> Yes</div>
                                            @else
                                            <div class="label label-danger"><i class="fa fa-times"></i>  No </div>
                                            @endif
                                        </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table><!-- end of table -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
