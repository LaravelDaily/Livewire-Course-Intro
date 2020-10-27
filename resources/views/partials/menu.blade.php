<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        @can('profile_password_edit')
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}"
                   href="{{ route('profile.password.edit') }}">
                    <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                    </i>
                    My profile
                </a>
            </li>
        @endcan

        @livewire('menu-notifications')

        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
               onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
