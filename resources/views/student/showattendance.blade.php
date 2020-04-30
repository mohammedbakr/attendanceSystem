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
        margin-bottom: 15px;
      }
      .header .cover {
        background-color: #8cbeea;
        padding: 70px 20px;
        position: relative;
      }
      .header .cover .name {
        display: flex;
        position: relative;
        top: 65px;
        right: 10%;
      }
      .header .cover .name h4 {
        color: #000;
      }
      .header .data {
        background-color: #EEE;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
      }
      .header .data .college {
        position: relative;
        right: 10%;
      }
      .header .data .logout-signature {
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        justify-content: flex-start;
      }
      .header .data .logout-signature .logout {
        margin-right: 10px;
      }
      .header .data .logout-signature .logout a {
        font: inherit;
        padding: 0.5rem 1rem;
        background: #dd4b39;
        border: 1px solid #d73925;
        color: white;
        border-radius: 6px;
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.26);
        cursor: pointer;
        transition: all .3s ease;
      }
      .header .data .logout-signature .logout a:hover {
        background: #c13725;
        border: 1px solid #841a0c;
      }
      .header .data .logout-signature .signature p {
        margin: 0;
      }
      .header img {
        width: 100px;
        height: 100px;
        vertical-align: middle;
        border-radius: 50%;
        position: absolute;
        top: 70%;
      }

      .header div.float-right:last-child span {
        color: #575bba;
      }
      aside {
        border-left: 4px solid #316897;
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
      .school-sec {
        background: #FFF;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
        padding: 20px;
        margin: 10px auto;
      }
      @media (max-width: 575.98px) {
        aside {
          border-left: none;
          border-bottom: 4px solid #316897;
        }
        .header .cover .name {
          right: 28%;
        }
        .header .data .college {
          right: -13%;
        }
        .header .data {
          flex-direction: column;
        }
        .header .data {
          padding: 5px 20px;
        }
        .header .data .logout-signature {
          width: 100%;
          padding: 10px;
          justify-content: space-between;
          margin-top: 10px;
        }
      }

      @media (min-width: 576px) and (max-width: 767.98px) {
        aside {
          border-left: none;
          border-bottom: 4px solid #316897;
        }
        .header .cover .name {
          right: 22%;
        }
        .header .data .college {
          right: -21%;
        }
        .header .data {
          flex-direction: column;
        }
        .header .data {
          padding: 5px 20px;
        }
        .header .data .logout-signature {
          width: 100%;
          padding: 10px;
          justify-content: space-between;
          margin-top: 10px;
        }
      }

      @media (min-width: 768px) and (max-width: 991.98px) {
        .header .cover .name {
          right: 16.5%;
        }
        .header .data .college {
          right: 16.5%;
        }
      }

      @media (min-width: 992px) and (max-width: 1199.98px) {
        .header .cover .name {
          right: 12%;
        }
        .header .data .college {
          right: 12%;
        }
      }

      .name-num {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
        margin-bottom: 5px;
      }
      .name-num p {
        margin: 0;
      }
      .box-header {
        background: #FFF;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
        padding: 20px;
        margin: 10px auto;
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

@include('partials._session')
@include('partials._errors')
<div class="header">
  <div class="cover">
    <img class="img-thumbnail img-rounded" src="{{ asset('images/avatar-profile.jpg') }}" alt="Profile Picture">
    <div class="name">
      <h4><strong>{{auth()->user()->name}}</strong></h4>
    </div>
  </div>
  <div class="data">
    <div class="college">
      <h4><strong>{{auth()->user()->major}}</strong></h4>
    </div>
    <div class="logout-signature">
      <div class="logout">
        <a href="{{ route('logout') }}" class="btn btn-danger btn-flat" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">@lang('site.logout')</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
      <div class="signature">
        <p>All Right Reserved &copy; <span style="color: #316897;"><strong>Damietta University</strong></span></p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <div class="name-num">
        <h4><strong>اسم الطالب</strong>: {{ $student->name }}</h4>
        @if ($student->attendances->count() == 0)
        <p class="bbadge badge-pill badge-primary">عدد أيام الحضور <span class="badge badge-light">0</span></p>
        @else
        <p>عدد أيام الحضور {{$student_attendance}} من أصل {{$student->attendances->count()}}</p>
        @endif
      </div>
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
</div>


<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

</body>
</html>