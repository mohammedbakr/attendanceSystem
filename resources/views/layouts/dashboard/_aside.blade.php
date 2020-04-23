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

            @if (auth()->user()->type != 'مدير المدرسة' && auth()->user()->type != 'وكيل المدرسة')
            @if (auth()->user()->hasPermission('read_students'))
            
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>@lang('site.students')</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>

                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('dashboard.postgraduate')}}"><i class="fa fa-dashcube"></i>@lang('site.Postgraduate')</a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.diploma')}}"><i class="fa fa-dashcube"></i>@lang('site.Generaldiploma')</a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashcube"></i> @lang('site.general')
                        </a>

                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('dashboard.general3')}}"><i class="fa fa-dashcube"></i>@lang('stage3')</a>
                                <a href="{{ route('dashboard.general4')}}"><i class="fa fa-dashcube"></i>@lang('stage4')</a>
                            </li>
                        </ul>

                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashcube"></i> @lang('site.primary')
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('dashboard.primary3')}}"><i class="fa fa-dashcube"></i>@lang('stage3')</a>
                                <a href="{{ route('dashboard.primary4')}}"><i class="fa fa-dashcube"></i>@lang('stage4')</a>
                            </li>
                        </ul>
                    </li>
                    

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashcube"></i> @lang('site.kg')
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('dashboard.kg1')}}"><i class="fa fa-dashcube"></i>@lang('stage1')</a>
                                <a href="{{ route('dashboard.kg3')}}"><i class="fa fa-dashcube"></i>@lang('stage3')</a>
                                <a href="{{ route('dashboard.kg4')}}"><i class="fa fa-dashcube"></i>@lang('stage4')</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.notenrolled')}}"><i class="fa fa-dashcube"></i>@lang('site.notenrolled')</a>
                    </li>
                </ul>
            </li>
            @endif

            @if (auth()->user()->hasPermission('read_schools'))
            <li><a href="{{ route('dashboard.schools.index') }}"><i
                        class="fa fa-th"></i><span>@lang('site.schools')</span></a></li>
            @endif
            @endif

            @if (auth()->user()->hasPermission('read_users'))
            <li><a href="{{ route('dashboard.users.index') }}"><i
                        class="fa fa-th"></i><span>@lang('site.users')</span></a>
            </li>
            @endif

            @if (auth()->user()->type == 'مدير المدرسة' || auth()->user()->type == 'وكيل المدرسة')
            <li>
                <a href="{{ route('dashboard.schools.show', auth()->user()->schools()->first()->pivot->school_id) }}"><i
                class="fa fa-th"></i><span>طلاب المدرسة</span></a>
            </li>
            @endif
            
        </ul>
    </section>

</aside>
