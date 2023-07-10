<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png"
                        alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive" src="{{ URL::asset('images/60111.jpg') }}"
                        alt="#" />
                </div>
                <div class="user_info">
                    <h6>{{ Auth::user()->name }}</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>مسؤول النظام</h4>
        <ul class="list-unstyled components">
            <li class="active">
                <a href="{{route('home')}}"><i
                        class="fa fa-home white_color"></i> <span>الرئيسية</span></a>
            </li>
            @if (Auth::user()->type == 2 || Auth::user()->type == 1)
                <li class="active">
                    <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fa fa-users yellow_color"></i> <span>الافراد</span></a>
                    <ul class="collapse list-unstyled" id="dashboard">
                        <li>
                            <a href="{{ route('users.index') }}"><i class="fa fa-cog yellow_color"></i> <span>ادارة
                                    الافراد</span></a>
                        </li>
                        <li>
                            <a href="{{ route('users.create') }}"><i class="fa fa-plus green_color"></i> <span>اضافة فرد
                                    جديد</span></a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#exc" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fa fa-user-times green_color"></i> <span>المستثنين</span></a>
                    <ul class="collapse list-unstyled" id="exc">
                        <li>
                            <a href="{{ route('excluded.index') }}"><i class="fa fa-user-times green_color"></i>
                                <span>ادارة
                                    المستثنين</span></a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#box" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fa fa-money green_color"></i> <span>الصندوق</span></a>
                    <ul class="collapse list-unstyled" id="box">
                        <li>
                            @if (Auth::user()->type == 1)
                                <a href="{{ route('box.index') }}"><i class="fa fa-money red_color"></i> <span>ادارة
                                        الصناديق</span></a>
                                <a href="{{ route('box.create') }}"><i class="fa fa-money blue_color"></i> <span>انشاء
                                        صندوق</span></a>
                            @endif
                            @if (Auth::user()->type == 2 || Auth::user()->type == 1)
                                <a href="{{ route('box.users') }}"><i class="fa fa-money blue_color"></i> <span>سداد
                                        للصندوق</span></a>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#blood" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fa fa-money green_color"></i> <span>صندوق الدية</span></a>
                    <ul class="collapse list-unstyled" id="blood">
                        <li>
                            @if (Auth::user()->type == 1)
                                <a href="{{ route('blood.index') }}"><i class="fa fa-money red_color"></i> <span>ادارة
                                        الصناديق</span></a>
                                <a href="{{ route('blood.create') }}"><i class="fa fa-money blue_color"></i> <span>انشاء
                                        صندوق</span></a>
                            @endif
                            @if (Auth::user()->type == 2 || Auth::user()->type == 1)
                                <a href="{{ route('blood.users') }}"><i class="fa fa-money blue_color"></i> <span>سداد
                                        للصندوق</span></a>
                            @endif
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#meeting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fa fa-clock-o  green_color"></i> <span> الاجتماع</span></a>
                    <ul class="collapse list-unstyled" id="meeting">
                        <li>
                            <a href="{{ route('meeting.index') }}"><i class="fa fa-clock-o red_color"></i> <span>
                                    الاجتماع</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            <li>
                <a > <span>
                        ادارة بياناتي</span></a>
            </li>
            <li class="active">
                <a href="#ubox" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-money green_color"></i> <span> الصناديق</span></a>
                <ul class="collapse list-unstyled" id="ubox">
                    <li>
                        <a href="{{ route('user.box') }}"><i class="fa fa-money red_color"></i> <span>
                                ادارة مدفوعاتي</span></a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#ublood" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-money red_color"></i> <span> الدية</span></a>
                <ul class="collapse list-unstyled" id="ublood">
                    <li>
                        <a href="{{ route('user.blood') }}"><i class="fa fa-money red_color"></i> <span>
                                ادارة مدفوعاتي</span></a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#umeeting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa  fa-clock-o yallow_color"></i> <span> الاجتماع</span></a>
                <ul class="collapse list-unstyled" id="umeeting">
                    <li>
                        <a href="{{ route('user.meeting') }}"><i class="fa  fa-clock-o red_color"></i> <span>
                                الاجتماع</span></a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#pass" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa  fa-key yallow_color"></i> <span> كلمة المرور</span></a>
                <ul class="collapse list-unstyled" id="pass">
                    <li>
                        <a href="{{ route('change_password') }}"><i class="fa  fa-clock-o red_color"></i> <span>تغيير كلمة المرور</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- end sidebar -->
