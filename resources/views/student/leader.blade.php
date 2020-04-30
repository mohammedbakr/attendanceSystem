<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">

    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Cairo', sans-serif !important;
        }

    </style>
    @else
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>
        .mr-2 {
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite;
            /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .header {
            border-top: 4px solid #83B2DC;
            border-bottom: 4px solid #316897;
            padding: 10px 0;
            background-color: #E6EFFB;
        }

        .header img {
            width: 60px;
            height: 60px;
            vertical-align: middle;
            margin-right: 10px;
        }

        .header span {
            display: inline-block;
            color: #575bba;
        }

        .header span h4 {
            display: inline-block;
        }

        .header span h4:last-child {
            display: inline-block;
            color: #b8041c;
        }

        .header button {
            float: left;
            margin-left: 10px;
        }

        .header div.float-left {
            display: inline-block;
            color: #000;
            vertical-align: bottom;
            margin-top: 10px;
            margin-left: 10px;
        }

        .header div.float-right:last-child span {
            color: #575bba;
        }

        aside {
            border-left: 4px solid #316897;
            /* height: 430px; */
        }

        aside .my-navtabs-v {
            border: 1px solid #CCC;
            border-radius: 10px;
            margin: 10px 20px;
        }

        aside .my-navtabs-v h4 {
            margin-top: 0;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: #316897;
            color: #FFF;
        }

        aside .my-navtabs-v ul li {
            display: block;
            float: none;
            border-bottom: 1px solid #DDD;
        }

        main {
            padding-top: 10px;
        }

        @media (min-width: 320px) and (max-width: 767px) {
            aside {
                border-left: none;
                border-bottom: 4px solid #316897;
            }
        }

    </style>

</head>

<body>

    @include('partials._session')
    @include('partials._errors')
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                    <img class="img-thumbnail" src="{{ asset('images/avatar-profile.jpg') }}" alt="Profile Picture">
                    <span>
                        <h4>{{auth()->user()->name}}</h4>
                        <h4>{{auth()->user()->type}}</h4>
                    </span>
                </div>
                <div class="col-sm-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('logout') }}" class="btn btn-danger btn-flat" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">@lang('site.logout')</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <div class="col-sm-12">
                            <div class="float-left">
                                <p>All Right Reserved &copy; <span>Damietta University</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-sm-4 col-md-3">
                <aside class="text-center">
                    <div class="my-navtabs-v">
                        <h4>الطالب</h4>
                        <!-- Nav pills -->
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#result">الدرجات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#absence">الحضور</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#attendance">تسجيل الحضور للمجموعة</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#registry">تسجيل المدرسة</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pass">تغيير كلمة السر</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-6 col-sm-8 col-md-9">
                <!-- Tab panes -->
                <div class="tab-content">

                    {{-- result tab --}}
                    <div class="tab-pane active" id="result">

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <p>مجموع درجات الطالب {{$total_grades}} من 100</p>
                            </div><!-- end of box header -->

                            <div class="box-body">
                                <table class="table table-hover">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>الدرجة</th>
                                            <th>المقيٌم</th>
                                            <th>الوظيفة</th>
                                            <th>التاريخ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                
                                        @foreach (auth()->user()->users as $index=>$std)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$std->pivot->grades}}</td>
                                            <td>{{$std->name}}</td>
                                            <td>{{$std->type}}</td>
                                            <td>{{$std->pivot->created_at->format('l , j/M/Y')}}</td>
                                        </tr>
                                        @endforeach
                
                                    </tbody>
                
                                </table><!-- end of table -->
                
                            </div><!-- end of box body -->

                        </div><!-- end of box -->

                    </div><!-- end of degrees -->

                    {{-- absence tab --}}
                    <div class="tab-pane fade" id="absence">

                        <div class="box box-primary">

                            <div class="box-header with-border">

                                @if (auth()->user()->attendances->count() == 0)
                                <p>عدد أيام الحضور </p>
                                @else
                                <p>عدد أيام الحضور {{$student_attendance}} من أصل
                                    {{auth()->user()->attendances->count()}}</p>
                                @endif

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

                                        @foreach (auth()->user()->attendances as $index=>$attendance)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$attendance->created_at->format('l , j/M/Y')}}</td>
                                            <td>
                                                @if ($attendance->attended == 1)
                                                <div class="label label-success"> <i class="fa fa-check"></i> Yes</div>
                                                @else
                                                <div class="label label-danger"><i class="fa fa-times"></i> No </div>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table><!-- end of table -->

                            </div><!-- end of box body -->

                        </div><!-- end of box -->

                    </div><!-- end of absence -->

                    {{-- تسجيل الحضور للمجموعة --}}
                    <div class="tab-pane fade" id="attendance">
                      <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{auth()->user()->school()->first()->name}} @lang('site.school
                                            students')</th>
                                        <th>@lang('site.action')</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach (auth()->user()->school()->first()->students as $index=>$student)
                                    <tr>
                                        <td>{{$index + 1}}</td>
                                        <td>
                                            {{$student->name}}
                                            @if($student->type == 'leader')
                                            <span class="badge badge-info"><i class="fa fa-star"></i> قائد
                                                المجموعة</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a
                                                href="{{route('showattendance', $student->id)}}">@lang('site.show')</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table><!-- end of table -->

                        </div><!-- end of box-body -->

                      </div><!-- end of box -->

                    </div><!-- end of attendance -->

                    {{-- pass tab --}}
                    <div class="tab-pane fade" id="pass">

                        <div class="box box-primary">

                            <div class="box-body">

                                <form action="{{ route('students.update', auth()->user()->id) }}" method="post">

                                    {{ csrf_field() }}
                                    {{ method_field('post') }}

                                    <div class="form-group">
                                        <input type="password" placeholder="اكتب كلمة السر الجديدة " name="password"
                                            id="password" class="form-control">

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                                            تغيير كلمة السر</button>
                                    </div>

                                </form><!-- end of form -->

                            </div><!-- end of box body -->

                        </div><!-- end of box -->

                    </div><!-- end of pass -->

                    <div class="tab-pane fade" id="registry">
                        @if (!auth()->user()->school_id)
                        <form action="{{ route('students.update', auth()->user()->id) }}" method="post">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                            <div class="form-group">
                                <label>@lang('site.schools')</label>
                                <select name="school_id" class="form-control">
                                    <option value="">اختر مدرسة</option>
                                    @foreach ($schools as $school)
                                    @if ($school->students_count() < 15) <option value="{{ $school->id }}"
                                        {{ old('school_id') == $school->id ? 'selected' : '' }}>{{ $school->name }}
                                        </option>
                                        @endif
                                        @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                                    @lang('site.select')</button>
                            </div>

                        </form><!-- end of form -->
                        @else
                        School Name : {{ auth()->user()->school()->first()->name }}
                        @endif

                    </div><!-- end of registry -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

</body>

</html>
