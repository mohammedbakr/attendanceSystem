<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image" style="margin-bottom:100px">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <ul class="sidebar-menu" data-widget="tree">

            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-th"></i><span>@lang('site.dashboard')</span></a></li>

            <li class="treeview">  
                    <a href="#">
                        <i class="fa fa-users"></i>  <span>@lang('students')</span> <span class="pull-right-container">   <i class="fa fa-angle-left pull-right"></i>   </span>  
                    </a>  
    
                    <ul class="treeview-menu">  
                        <li>  
                            <a href="{{ route('dashboard.postgraduate')}}"><i class="fa fa-dashcube"></i>@lang('Postgraduate')</a>  
                        </li>  

                         <li>  
                            <a href="{{ route('dashboard.diploma')}}"><i class="fa fa-dashcube"></i>@lang('Generaldiploma')</a>  
                        </li>  

                        <li>  
                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-dashcube"></i> @lang('general')
                                    </a>

                                    <ul class="treeview-menu">  
                                        <li>  
                                            <a href="{{ route('dashboard.general3')}}"><i class="fa fa-dashcube"></i>@lang('stage3')</a>  
                                            <a href="{{ route('dashboard.general4')}}"><i class="fa fa-dashcube"></i>@lang('stage4')</a>  
                                        </li>  
                                    </ul>


                                </li>
                        </li>  

                        <li>  
                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-dashcube"></i> @lang('primary')
                                    </a>

                                    <ul class="treeview-menu">  
                                        <li>  
                                            <a href="{{ route('dashboard.primary3')}}"><i class="fa fa-dashcube"></i>@lang('stage3')</a>  
                                            <a href="{{ route('dashboard.primary4')}}"><i class="fa fa-dashcube"></i>@lang('stage4')</a>  
                                        </li>  
                                    </ul>


                                </li>
                        </li>  

                       
                        <li>  
                                <li class="treeview">  
                                    <a href="#">
                                        <i class="fa fa-dashcube"></i> @lang('kg')
                                    </a>

                                    <ul class="treeview-menu">  
                                        <li>  
                                            <a href="{{ route('dashboard.kg1')}}"><i class="fa fa-dashcube"></i>@lang('stage1')</a>  
                                            <a href="{{ route('dashboard.kg3')}}"><i class="fa fa-dashcube"></i>@lang('stage3')</a>  
                                            <a href="{{ route('dashboard.kg4')}}"><i class="fa fa-dashcube"></i>@lang('stage4')</a>  
                                        </li>  
                                    </ul>


                                </li>
                        </li>  

                       



                    </ul>  
                </li>   
        </ul>    
        
        




    

        <ul class="sidebar-menu" data-widget="tree">


                
          @if (auth()->user()->hasPermission('read_users'))
                <li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-th"></i><span>@lang('site.users')</span></a></li>
          @endif
  
         

            @if (auth()->user()->hasPermission('read_schools'))
                <li><a href="{{ route('dashboard.schools.index') }}"><i class="fa fa-th"></i><span>@lang('site.schools')</span></a></li>
            @endif

     

            <li><a href="{{ route('dashboard.stages.index') }}"><i class="fa fa-book"></i><span>@lang('site.stages')</span></a></li>
        
            
            {{-- {{an class="pull-right-container">--}} --}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul c--<li><a href="{{ route('dashboard.users.index') }}"><i class="fa fa-users"></i><span>@lang('site.users')</span></a></li>--}}

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-pie-chart"></i>--}}
            {{--<span>الخرائط</span>--}}
            {{--<splass="treeview-menu">--}}
            {{--<li>--}}
            {{--<a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a>--}}
            {{--</li>--}}
            {{--<li>--}}
            {{--<a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a>--}}
            </li>
            </ul>
            {{-- </li>
        </ul>

    </section>

</aside>

