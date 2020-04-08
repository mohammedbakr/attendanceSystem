@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                {{-- stages--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ $students }}</h3>

                            <p>@lang('site.not enrolled students')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('dashboard.notenrolled')}}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--schools--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $schools_count }}</h3>

                            <p>@lang('site.schools')</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('dashboard.schools.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--clients--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $students_count }}</h3>

                            <p>@lang('site.clients')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                {{--users--}}
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $users_count }}</h3>

                            <p>@lang('site.users')</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div><!-- end of row -->

            <div class="box box-solid">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.schools summary')</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>المدارس الغير مكتملة (أقل من 5 طلاب) </strong></p>
                            @if ($schools->count() > 0)
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th>School Name</th>
                                    <th>enrolled students</th>
                                    <th>available</th>
                                    <th>show</th>
                                </tr>
                                @foreach ($schools as $school)
                                @if ($school->count() < 5)
                                <tr>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->students_count() }}</td>
                                    <td>{{ 18 - $school->students_count() }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.schools.show', $school->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('site.show')</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach                        
                            </table>
                            @else
                            <h2>@lang('site.no_data_found')</h2>
                            @endif
                            {{ $schools->links() }}
                        </div>
                        <div class="col-md-6">
                            <p><strong>range  5 - 18 </strong></p>
                            @if ($schools->count() > 0)
                            <table class="table table-stripped table-hover">
                                <tr>
                                    <th>School Name</th>
                                    <th>enrolled students</th>
                                    <th>available</th>
                                    <th>show</th>
                                </tr>
                                @foreach ($schools as $school)
                                @if ($school->count() >=5 && $school->count <= 18)
                                <tr>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->students_count() }}</td>
                                    <td>{{ 18 - $school->students_count() }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.schools.show', $school->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('site.show')</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach               
                            </table>
                            @else
                            <h2>@lang('site.no_data_found')</h2>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

@push('scripts')

@endpush