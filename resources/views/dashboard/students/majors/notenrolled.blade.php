@extends('layouts.dashboard.app') @section('content')

<div class="content-wrapper">

    <section class="content-header">

        <h1>@lang('site.students')</h1>

        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard.welcome') }}">
                    <i class="fa fa-dashboard"></i>
                    @lang('site.dashboard')</a>
            </li>
            <li class="active">@lang('site.not enrolled students')</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header with-border">

                <h3 class="box-title" style="margin-bottom: 15px">
                    @lang('site.not enrolled students')
                    <small>{{ $students->total() }}</small>
                </h3>

                <form action="{{ route('dashboard.notenrolled') }}" method="get">
                    <div class="row">

                        <div class="col-md-4">
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="@lang('site.search')"
                                value="{{ request()->search }}">
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                                @lang('site.search')</button>
                            @if (auth()->user()->hasPermission('create_students'))
                            <a href="{{ route('dashboard.students.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                @lang('site.add')</a>
                            @else
                            <a href="#" class="btn btn-primary disabled">
                                <i class="fa fa-plus"></i>
                                @lang('site.add')</a>
                            @endif
                        </div>

                    </div>
                </form>
                <!-- end of form -->

            </div>
            <!-- end of box header -->

            <div class="box-body">

                @if ($students->count() > 0)

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.email')</th>
                            <th>@lang('site.major')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($students as $index=>$student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->major }}</td>
                            <td>
                                @if (auth()->user()->hasPermission('delete_students'))
                                <form
                                    action="{{ route('dashboard.students.destroy', $student->id) }}"
                                    method="post"
                                    style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm">
                                        <i class="fa fa-trash"></i>
                                        @lang('site.delete')</button>
                                </form>
                                <!-- end of form -->
                                @else
                                <button class="btn btn-danger btn-sm disabled">
                                    <i class="fa fa-trash"></i>
                                    @lang('site.delete')</button>
                                @endif @if (auth()->user()->hasPermission('delete_students'))
                                <a
                                    href="{{ route('dashboard.students.edit', $student->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>
                                    @lang('site.Add to a school')</a>
                                @else
                                <button href="#" class="btn btn-info btn-sm disabled">
                                    <i class="fa fa-edit"></i>
                                    @lang('site.Add to a school')</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <!-- end of table -->

                {{ $students->appends(request()->query())->links() }}

                @else

                <h2>@lang('site.no_data_found')</h2>

                @endif

            </div>
            <!-- end of box body -->

        </div>
        <!-- end of box -->

    </section>
    <!-- end of content -->

</div>
<!-- end of content wrapper -->

@endsection