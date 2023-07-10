<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section">
                <a href="index.html"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
            </div>
            <div class="right_topbar">
                <div class="icon_info">

                    <ul class="user_profile_dd">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle"
                                    src="{{ URL::asset('images/60111.jpg') }}" alt="#" /><span
                                    class="name_user">{{ Auth::user()->name }}</span></a>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="help.html">Help</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">تسجيل الخروج <i
                                            class="fa fa-sign-out"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
