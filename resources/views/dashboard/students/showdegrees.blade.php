@extends('layouts.dashboard.app')

@section('content')

<div class="content-wrapper">

    <section class="content-header">

        <h3 class="box-title" style="margin-bottom: 15px">
            @lang('site.student_grades') <i class="fa fa-percent">{{$total_grades}}</i>
        </h3>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
            </li>
            <li class="active">@lang('site.student_grades')</li>
        </ol>
    </section>

    <section class="content">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        @if(auth()->user()->type == 'head master' || auth()->user()->type == 'head assistant')
                             <h5 class="modal-title" id="exampleModalLabel">@lang('site.add_degree')<span style="color:red"> (@lang('stm2'))</span></h5>
                        @else
                          <h5 class="modal-title" id="exampleModalLabel">@lang('site.add_degree')<span style="color:red"> (@lang('stm3'))</span></h5>
                        @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('dashboard.addDegree')}}" method="POST">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="grades" class="col-form-label">الدرجة: </label>
                                @if(auth()->user()->type == 'head master' || auth()->user()->type == 'head assistant')
                                <input type="number" class="form-control" id="grades" name="grades" required min="0" max="15">
                                @else
                                     <input type="number" class="form-control" id="grades" name="grades" required min="0" max="20">
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">@lang('site.add')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('site.close')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="box box-primary">

            <div class="box-header with-border">

                <p> @lang('site.total')  {{$total_grades}} @lang('site.from') 100</p>

                @if(auth()->user()->type != 'super' && auth()->user()->type != 'control' )
                <button type="button" class="btn btn-info float-right" data-toggle="modal"
                    data-target="#exampleModal">@lang('site.add_degree')</button>
                @endif

            </div><!-- end of box header -->

            <div class="box-body">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.student_grades')</th>
                            <th>@lang('site.evaluator')</th>
                            <th>@lang('site.role')</th>
                            <th>@lang('site.date')</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($student->users as $index=>$std)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$std->pivot->grades}}</td>
                            @if($std->type == 'super')
                             <td>------</td>
                            @else
                              <td>{{$std->name}}</td>
                            @endif
                            @if($std->type == 'super')
                            <td>@lang('site.leader')</td>
                            @else
                             <td>{{$std->type}}</td>
                           @endif
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
