@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h3 class="box-title" style="margin-bottom: 15px">
                الدرجات <i class="fa fa-percent">{{$total_grades}}</i>
            </h3>
   
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active">الدرجات</li>
            </ol>
        </section>

        <section class="content">

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
                                    <th>التاريخ</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($student->users as $index=>$std)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$std->pivot->grades}}</td>
                                    <td>{{$std->name}}</td>
                                    <td>{{$std->pivot->created_at->format('l , j/M/Y')}}</td>   
                                </tr>
                                @endforeach

                            </tbody>

                        </table><!-- end of table -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
