@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.students')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.students.index') }}"> @lang('site.students')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.students.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        
                        <div class="form-group">
                            <label>@lang('site.name')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>


                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input name="email" class="form-control" value="{{old('email')}}"/>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control" value="{{old('password')}}"/>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        

                        <div class="form-group">
                            <label>@lang('site.schools')</label>
                            <select name="school_id" class="form-control">
                                <option value="">@lang('site.schools')</option>
                                @foreach ($schools as $school)
                                    @if($school->students_count() < 18)
                                         <option value="{{ $school->id }}" {{ old('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                                    @else
                                         <option class="text-danger" value="" disabled>{{ $school->name }} مكتملة</option>
                                    @endif    
                                @endforeach
                            </select>
                        </div>

                          <div class="form-group">
                            <label>@lang('site.majors')</label>
                            <select name="major" class="form-control">
                                <option value="">@lang('site.majors')</option>
                                <option value="postgraduate">@lang('postgraduate')</option>
                                <option value="diploma">@lang('diploma')</option>
                                <option value="primary3">@lang('primary3')</option>
                                <option value="primary4">@lang('primary4')</option>
                                <option value="general3">@lang('general3')</option>
                                <option value="general4">@lang('general4')</option>
                                <option value="kg1">@lang('kg1')</option>
                                <option value="kg3">@lang('kg3')</option>
                                <option value="kg4">@lang('kg4')</option>
                            </select>
                        </div>

                         
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
