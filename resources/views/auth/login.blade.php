<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Log in</title>

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

        .my-forms {
            margin: 10px auto;
            /* transform: translate(-25%, 40%); */
        }
        .my-forms .nav-tabs {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .my-forms .nav-tabs .btn {
            padding: 10px 40px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        .page-header>small {display: inline-block}
        .page-header {margin: 0%}
        .login-box, .register-box {margin: 0% auto}
    </style>
    @else
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body class="login-page">



    <div class="my-forms">
        <div class="container mt-3">
            <h1 class="page-header text-center" style="margin-top: 20px;">
                <B><span style="color: #f06b2c;">نظام   </span></B>
                <B><span style="color: #1595c2;"></span> لإدارة الحضور و الغياب</span></B>
            </h1>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active btn btn-warning btn-lg" data-toggle="tab" href="#home">Employes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-info btn-lg" data-toggle="tab" href="#menu1">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-lg" data-toggle="tab" href="#menu2">Admin</a>
                </li>
            </ul>
    
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <div class="login-box">
                        <div class="login-logo">
                            <a href="#"><b>Employes</b></a>
                        </div><!-- end of login lgo -->
                    
                        <div class="login-box-body">
                            <p class="login-box-msg">Sign in to start your session</p>
                    
                            <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                    
                        @include('partials._errors')
                    
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    
                        <div class="form-group">
                            <label style="font-weight: normal;"><input type="checkbox" name="remember"> @lang('site.remember_me')</label>
                        </div>
                    
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>
                    
                        </form><!-- end of form -->
                    
                        </div><!-- end of login body -->
                    
                        </div><!-- end of login-box -->
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <div class="login-box">
                        <div class="login-logo">
                            <a href="#"><b>Students</b></a>
                        </div><!-- end of login lgo -->
                    
                        <div class="login-box-body">
                            <p class="login-box-msg">Sign in to start your sessionv st</p>
                    
                            <form action="{{ route('student.login') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                    
                        @include('partials._errors')
                    
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    
                        <div class="form-group">
                            <label style="font-weight: normal;"><input type="checkbox" name="remember"> @lang('site.remember_me')</label>
                        </div>
                    
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>
                    
                        </form><!-- end of form -->
                    
                        </div><!-- end of login body -->
                    
                        </div><!-- end of login-box -->
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <div class="login-box">
                        <div class="login-logo">
                            <a href="#"><b>Admin</b></a>
                        </div><!-- end of login lgo -->
                    
                        <div class="login-box-body">
                            <p class="login-box-msg">Sign in to start your session</p>
                    
                            <form action="{{ route('login') }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                    
                        @include('partials._errors')
                    
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                    
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    
                        <div class="form-group">
                            <label style="font-weight: normal;"><input type="checkbox" name="remember"> @lang('site.remember_me')</label>
                        </div>
                    
                        <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>
                    
                        </form><!-- end of form -->
                    
                        </div><!-- end of login body -->
                    
                        </div><!-- end of login-box -->
                </div>
            </div>
        </div>
    </div>





    {{-- <div class="login-box">

    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div><!-- end of login lgo -->

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
    {{ csrf_field() }}
    {{ method_field('post') }}

    @include('partials._errors')

    <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="@lang('site.email')">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="@lang('site.password')">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="form-group">
        <label style="font-weight: normal;"><input type="checkbox" name="remember"> @lang('site.remember_me')</label>
    </div>

    <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('site.login')</button>

    </form><!-- end of form -->

    </div><!-- end of login body -->

    </div><!-- end of login-box --> --}}

    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

    {{--icheck--}}
    <script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

    {{--<!-- FastClick -->--}}
    <script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>

</body>

</html>
