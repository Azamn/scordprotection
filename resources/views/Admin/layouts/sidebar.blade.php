<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div class="logo-wrapper" style="box-shadow: none"><a href="/admin/dashboard"><img class="img-fluid"
                                                                                       src="{{asset('Assets/Admin/images/feimages/FELogo.png')}}"
                                                                                       alt=""></a></div>
    <div class="logo-icon-wrapper"><a href="/admin/dashboard"><img class="img-fluid"
                                                                   src="{{asset('Assets/Admin/images/feimages/FELogo.png')}}"
                                                                   alt=""></a></div>
    <nav>
        <div class="sidebar-main">
            <div id="sidebar-menu">
                <ul class="sidebar-links custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-right"><span>Back</span><i
                                class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-list"><a class="nav-link " href="/admin/dashboard">
                        <i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/orders"><i data-feather="truck"></i><span>Orders</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/products"><i data-feather="box"></i><span>Products</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link" href="/admin/categories"><i
                                data-feather="git-merge"></i><span>Categories</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link " href="/admin/users"><i data-feather="users"></i><span>Users</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/coupons"><i data-feather="tag"></i><span>Coupons</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link " href="/admin/blogs"><i data-feather="film"></i><span>Blogs</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link " href="/admin/stores"><i data-feather="database"></i><span>Stores</span></a>
                    </li>
                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/tags"><i data-feather="tag"></i><span>Tags</span></a>
                    </li>

                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/features"><i data-feather="tag"></i><span>Features</span></a>
                    </li>

                    <li class="sidebar-list">
                        <a class="nav-link  " href="/admin/instructions"><i data-feather="tag"></i><span>Instructions</span></a>
                    </li>

                @if( auth()->user()->is_super_admin)
                        <li class="sidebar-list">
                            <a class="nav-link  " href="/admin/admins"><i
                                    data-feather="users"></i><span>Admins</span></a>
                        </li>
                    @endif


                    <li class="sidebar-list">
                        <a class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout' ) }}"><i data-feather="log-out"></i><span>Log out</span></>
                        <form method="POST"  id="logout-form" action="{{ Route('logout') }}" >
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Page Sidebar Ends-->
