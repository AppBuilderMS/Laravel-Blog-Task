<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background: #0f172a !important;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li class="{{ request()->is('dashboard') ? 'mm-active' : '' }}">
                    <a href="{{route('dashboard.dashboard')}}" class="waves-effect">
                        <i class="bx bxs-dashboard"></i>
                        <span key="t-multi-level">Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->isAdmin())
                    <li class="{{ request()->is('dashboard/users*') ? 'mm-active' : '' }}">
                        <a href="{{route('dashboard.users')}}" class="waves-effect">
                            <i class="bx bx-group"></i>
                            <span key="t-multi-level">Users</span>
                        </a>
                    </li>
                @endif
                <li class="{{ request()->is('dashboard/posts') ? 'mm-active' : '' }}">
                    <a href="{{route('dashboard.posts')}}" class="waves-effect">
                        <i class="bx bx-detail"></i>
                        <span key="t-multi-level">posts</span>
                    </a>
                </li>
                @if(auth()->user()->isAdmin())
                <li class="{{ request()->is('dashboard/posts/archived') ? 'mm-active' : '' }}">
                    <a href="{{route('dashboard.posts.archived')}}" class="waves-effect">
                        <i class="bx bx-archive-in"></i>
                        <span key="t-multi-level">Archived Posts</span>
                    </a>
                </li>
                @endif

                <li class="{{ request()->is('dashboard/comments') ? 'mm-active' : '' }}">
                    <a href="{{route('dashboard.comments')}}" class="waves-effect">
                        <i class="bx bx-comment-dots"></i>
                        <span key="t-multi-level">Comments</span>
                    </a>
                </li>
                @if(auth()->user()->isAdmin())
                    <li class="{{ request()->is('dashboard/comments/archived') ? 'mm-active' : '' }}">
                        <a href="{{route('dashboard.comments.archived')}}" class="waves-effect">
                            <i class="bx bx-archive-in"></i>
                            <span key="t-multi-level">Archived Comments</span>
                        </a>
                    </li>
                @endif

                <li class="">
                    <a href="/" class="waves-effect">
                        <i class="bx bx-world"></i>
                        <span key="t-multi-level">Blog</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
