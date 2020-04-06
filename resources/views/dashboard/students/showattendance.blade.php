@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h3 class="box-title" style="margin-bottom: 15px">
              نسبة الحضور    <i class="fa fa-percent">{{$attendance_percentage}}</i>
            </h3>
   
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
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
                               
                                    @foreach ($student->attendances as $index=>$student)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{$student->created_at->format('l , j/M/Y')}}</td>
                                         @if($student->attended == 1)
                                            <td><div class="label label-success"> <i class="fa fa-check"></i> Yes</div></td>
                                         @else
                                             <td><div class="label label-danger"><i class="fa fa-times"></i>  No </div></td>
                                         @endif
                                    </tr>
                                    @endforeach

                            </tbody>

                        </table><!-- end of table -->
                        
                        
                    {{-- @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif --}}

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
