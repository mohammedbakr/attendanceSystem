@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.schools')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.schools')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.schools') </h3>


                </div><!-- end of box header -->

                <div class="box-body">


                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                            <th>{{$school->name}} @lang('site.school students')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                               
                                    @foreach ($school->students as $index=>$student)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>{{ $student->name}}</td>
                                    </tr>
                                    @endforeach
                                   
                          
                                    {{-- <td>
                                        <a href="{{ route('dashboard.schools.show', $school->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('site.show')</a>

                                        @if (auth()->user()->hasPermission('update_schools'))
                                            <a href="{{ route('dashboard.schools.edit', $school->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                            <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_schools'))
                                            <form action="{{ route('dashboard.schools.destroy', $school->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                        @endif
                                    </td> --}}
                            
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
