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
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
        </style>
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
        .mr-2{
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
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

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تسجيل الحضور و الغياب</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="{{ route('storeattendance', $student->id) }}" method="POST">
              @csrf
              <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">
              <div class="modal-body">
                <div class="form-group">
                  <label>تسجيل الحضور و الغياب</label>
                  <select name="attended" class="form-control">
                    <option value="">قم بالاختيار</option>
                      <option value="0">غائب</option>
                      <option value="1">حاضر</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-info">@lang('site.save')</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.exit')</button>
              </div>
          </form>
      </div>
  </div>
</div>

<h1 class="text-center" style="color:red; margin-top: 10px;">Welcome Student {{auth()->user()->name}}</h1>
@include('partials._session')
@include('partials._errors')
<div class="header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-9">
        <img class="img-thumbnail" src="{{ asset('images/avatar-profile.jpg') }}" alt="Profile Picture">
        <span>
          <h4>{{auth()->user()->name}}</h4>
          &nbsp;
          <h4>Four Year - Information And Tecnology - Faculty Of Engineering</h4>
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
              <p>All Right Reserved &copy; <span>Mansoura University</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="box box-primary">
  <div class="box-header with-border">
    <h4>اسم الطالب: {{ $student->name }}</h4>
    @if ($student->attendances->count() == 0)
    <p>عدد أيام الحضور 0</p>
    @else
    <p>عدد أيام الحضور {{$student_attendance}} من أصل {{$student->attendances->count()}}</p>
    @endif
    <button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#exampleModal">تسجيل الحضور و الغياب</button>
    <a href="{{ route('student.index') }}" class="pull-right btn btn-info">رجوع</a>

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
          
            @foreach ($student->attendances as $index=>$attendance)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$attendance->created_at->format('l , j/M/Y')}}</td>
                    <td>
                        @if ($attendance->attended == 1)
                        <div class="label label-success"> <i class="fa fa-check"></i> Yes</div>
                        @else
                        <div class="label label-danger"><i class="fa fa-times"></i>  No </div>
                        @endif
                    </td>
            </tr>
            @endforeach

        </tbody>

    </table><!-- end of table -->

  </div><!-- end of box body -->

</div><!-- end of box -->


<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

</body>
</html>