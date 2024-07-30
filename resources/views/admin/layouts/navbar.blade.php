<nav class="navbar clearHeader">
    <div class="col-12">
        <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand"
                href="index.html"><img class="logo-sidebar" src="{{ asset('logo-transparent.png') }}" alt="profile img">
                <br>
                <small class="font-bold d-none d-lg-block" style="margin-left: 65px">Trang Quản Trị</small>
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right mt-1">
            <li class="dropdown menu-app">
                @auth
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <img
                            class="mr-1" src="{{ asset(auth()->user()->image) }}" alt="" width="25px">
                        Xin chào {{ auth()->user()->name }} !<i class="material-icons">arrow_drop_down</i>
                    </a>
                @endauth

                <ul class="dropdown-menu">
                    <li class="body" style="width: 280px; height: 170px;">
                        <ul class="menu">
                            <li>
                                <ul>
                                    <li><a href="javascript:void(0)"><i class="material-icons">person</i><span>Tài
                                                khoản</span></a></li>
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf

                                            <a href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();"><i
                                                    class="material-icons">exit_to_app</i><span>Đăng
                                                    xuất</span></a>
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i
                        class="zmdi zmdi-sort-amount-desc"></i></a></li>
        </ul>
    </div>
</nav>
