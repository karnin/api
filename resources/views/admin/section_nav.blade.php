<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" {{--id="side-menu"--}}>
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a href="index.html#"> api</a>
                </div>
            </li>


            <li>
                <a href="{{ url('admin/project') }}"><i class="fa fa-sitemap"></i> <span class="nav-label">项目 </span><span
                            class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse in">
                    @if($nav)
                    @foreach($nav as $key=>$value)
                        <li>
                            <a href="{{ url('admin/version',[$value['project_id']]) }}">{{ $value['project_name'] }}<span class="fa arrow"></span></a>
                            @if($value['version'])

                                <ul class="nav nav-third-level in">
                                    @foreach($value['version'] as $k=>$v)
                                    <li>
                                        <a href="{{ url('admin/api',[$v['version_id']]) }}">{{ $v['version_name'] }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @endforeach
                    @endif
                  {{--  <li>
                        <a href="index.html#">知府机构版<span class="fa arrow"></span></a>

                    </li>
                    <li>
                        <a href="index.html#">知府用户版<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level"></ul>
                    </li>
                    <li><a href="index.html#">Second Level Item</a></li>--}}
                </ul>
            </li>
            <li>
                <a href="{{ url('admin/errorCode') }}"><i class="fa fa-sitemap"></i> <span class="nav-label">错误码 </span><span
                            class="fa arrow"></span></a>

            </li>

         {{--   <li>
                <a href="index.html#"><i class="fa fa-sitemap"></i> <span class="nav-label">数据字典 </span><span
                            class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse in">
                    <li><a href="index.html#">db1</a></li>
                    <li><a href="index.html#">db2</a></li>
                </ul>
            </li>--}}
        </ul>
    </div>
</nav>
