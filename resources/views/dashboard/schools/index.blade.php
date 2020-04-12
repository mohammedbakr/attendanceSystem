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

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.schools') <small>{{ $schools->total() }}</small></h3>

                    <form action="{{ route('dashboard.schools.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                            </div>
                            
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                @if (auth()->user()->hasPermission('create_schools'))
                                    <a href="{{ route('dashboard.schools.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($schools->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.head')</th>
                                <th>الوكيل</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>

                            @foreach ($schools as $index=>$school)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->users->first()->name }}</td>
                                    <td>
                                        @if ($school->users->first()->name != $school->users->last()->name && $school->users->last()->name)
                                            {{ $school->users->last()->name }}
                                        @else
                                            <a href="{{ route('dashboard.getAgent', $school->id) }}">اضف وكيل للمدرسة</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.schools.show', $school->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> @lang('site.show')</a>

                                        @if (auth()->user()->hasPermission('delete_schools'))
                                            <form action="{{ route('dashboard.schools.destroy', $school->id) }}" method="post" style="display: inline-block">
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
                        
                        {{ $schools->appends(request()->query())->links() }}
                        
                    @else
                        
                        <h2>@lang('site.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
