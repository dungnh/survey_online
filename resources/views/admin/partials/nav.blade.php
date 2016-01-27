    <!-- Start: Sidebar Menu -->
<?php
$array_access = array();
if($info_user) {
    $RouteName = Route::current()->getName();
    $ModuleName = '';
    if ($RouteName) {
        $arrRoute = explode('.', $RouteName);
        if (count($arrRoute) > 2) {
            $ModuleName = $arrRoute[1];
        }
    }
    $list_access = $info_user->hasAccess();
    foreach ($list_access as $key => $value) {
        $array = explode('_', $value);
        if (!in_array($array[0], $array_access)) {
            $array_access[] = $array[0];
        }
    }
}
?>
    <ul class="nav sidebar-menu">
        <li class="sidebar-label pt20">{{ trans('cpanel.menu')}}</li>
        <li>
            <a href="/cpanel/dashboard">
                <span class="glyphicon glyphicon-home"></span>
                <span class="sidebar-title">{{ trans('cpanel.dashboard')}}</span>
            </a>
        </li>
        @if(in_array('config', $array_access) || in_array('groupuser', $array_access) || in_array('user', $array_access))
        <li class="sidebar-label pt15"> {{ trans('cpanel.administrator')}} </li>
        @if(in_array('groupuser', $array_access))
        <li>
            <a href="/cpanel/groupuser">
                <span class="fa fa-users"></span>
                <span class="sidebar-title"> {{ trans('cpanel.group_user')}} </span>
            </a>
        </li>
        @endif
        @if(in_array('user', $array_access))
        <li>
            <a href="/cpanel/user">
                <span class="glyphicon glyphicon-user"></span>
                <span class="sidebar-title"> {{ trans('cpanel.user')}} </span>
            </a>
        </li>
        @endif
        @if(in_array('survey', $array_access))
        <li>
            <a href="{{route('cpanel.survey.index')}}">
                <span class="glyphicon glyphicon-question-sign"></span>
                <span class="sidebar-title"> {{ trans('cpanel.survey')}} </span>
            </a>
        </li>
        @endif
        @if(in_array('module', $array_access))
        <li>
            <a href="/cpanel/module">
                <span class="glyphicon glyphicon-user"></span>
                <span class="sidebar-title"> {{ trans('cpanel.module')}} </span>
            </a>
        </li>
        @endif
        @if(in_array('config', $array_access))
        <li>
            <a class="accordion-toggle @if (in_array($ModuleName, array('languages'))) menu-open @endif" href="#">
                <span class="glyphicon glyphicon-fire"></span>
                <span class="sidebar-title"> {{ trans('cpanel.setting')}} </span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li @if ($ModuleName == 'languages')class="active" @endif>
                    <a href="/cpanel/languages">
                        <span class="glyphicon glyphicon-book"></span> {{ trans('cpanel.languages')}} </a>
                </li>
                <!-- <li @if ($ModuleName == 'translate')class="active" @endif>
                    <a href="/cpanel/translate">
                        <span class="glyphicon glyphicon-modal-window"></span> Translate </a>
                </li> -->
                <li @if ($ModuleName == 'config')class="active" @endif>
                    <a href="/cpanel/config">
                        <span class="fa fa-cogs"></span> {{ trans('cpanel.configuration')}}</a>
                </li>
            </ul>
        </li>
        @endif
        @endif
    </ul>
    <!-- End: Sidebar Menu -->
