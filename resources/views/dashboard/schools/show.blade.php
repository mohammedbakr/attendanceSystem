@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>{{$school->name}}</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">@lang('site.students')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div>@lang('site.stm1')</div>
             
                <div class="box-header with-border">

                        @if($school->students_count() < 15)
                            @if(auth()->user()->hasPermission('update_students'))
                                <a href="{{route('dashboard.notenrolled')}}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                            @endif
                        @else
                          <button class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        @endif

                </div><!-- end of box header -->

                <div class="box-body" style="margin-bottom:20px;">

                    @if ($school->students->count() > 0)

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
                                    <td>
                                        {{$student->name}}
                                        @if($student->type == 'leader')
                                            <span class="badge badge-info"><i class="fa fa-star"></i>@lang('site.Leader')</span>
                                       @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.students.show', $student->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('site.show')</a>
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
                                @endforeach

                            </tbody>

                        </table><!-- end of table -->
                                               
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif


                </div><!-- end of box body -->

                @if (auth()->user()->type == 'super' || auth()->user()->type == 'faculty supervisor')
                <form action="{{ route('dashboard.schools.update', $school->id ) }}" method="post"  class="pull-left">

                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    
                    <div class="form-group">
                        <label>@lang('site.assign_leader')</label>
                        <select name="leader" class="form-control">
                             @foreach ($school->students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> @lang('site.assign_leader')</button>
                    </div>

                </form><!-- end of form -->
                @endif

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
@endsection
