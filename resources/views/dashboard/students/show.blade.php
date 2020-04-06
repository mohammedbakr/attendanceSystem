@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.students')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.students')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">
                        @lang('site.students') 
                    </h3>

                </div><!-- end of box header -->

                <div class="box-body">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.email')</th>
                                <th>@lang('site.school')</th>
                                <th>@lang('site.Attendance') %</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                    
                       
                                <tr>
                    
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    
                                    <td>{{ $student->school->name }}</td>
                                    
                                    <td class="Bold"><a href="{{route('dashboard.showattendance', $student->id)}}">{{ $attendance_percentage}}<i class="fa fa-percent"></i></a></td>
                                    
                                    
                             
                                    <td>
                                    
                                        @if (auth()->user()->hasPermission('delete_students'))
                                            <form action="{{ route('dashboard.students.destroy', $student->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>

                        </table><!-- end of table -->
                                                
                        
                        

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
