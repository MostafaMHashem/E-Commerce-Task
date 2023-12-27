 <!---------------------- start main content -------------------------------------------->

 <section class="index_cards">
    <!---------------------- start nav -------------------------------------------->
    <nav class="nav_top navbar">
        <div class="container-fluid">
            <div class="menu">
                <i class="bi bi-list"></i>
            </div>
            <div class="info">
{{--                <div class="notfication" onclick="showNotification()">--}}
{{--                    <i class="bi bi-bell"></i>--}}
{{--                    <span class="alerts">--}}
{{--                        3--}}
{{--                    </span>--}}
{{--                </div>--}}

                <div class="img">
                    <img src="{{ auth('admin')->user()->image_link }}" alt="person">
                </div>
                <div class="btn-group">
                    <button class="btn  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ auth('admin')->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        {{-- <li> <a href="{{ route('admin.settings.create') }}">اعدادات الحساب</a> </li> --}}
                        {{-- <li> <a href="{{route('admin.auth.logout')}}" style="cursor: pointer"  title="logout" >  تسجيل الخروج </a> </li> --}}
                    </ul>
                </div>


            </div>

        </div>
    </nav>
    <ul class="notfication_list">
        <h2>الأشعارات</h2>
        <i class="bi bi-x close-icon" onclick="hideNotification()"></i>

        <li class="unread" onclick="convertToRead(this)">
            <div class="info">
                <h6> text</h6>
                <span> 22/6/1993</span>
            </div>
            <div class="delete">
                <i class="bi bi-trash"></i>
            </div>
        </li>
        <li class="read">
            <div class="info">
                <h6> text</h6>
                <span> 22/6/1993</span>
            </div>
            <div class="delete">
                <i class="bi bi-trash"></i>
            </div>
        </li>
    </ul>
    <!---------------------- finish nav -------------------------------------------->
    <!---------------------- start content -------------------------------------------->


    @yield('content')



    <!---------------------- finish  content -------------------------------------------->
</section>
<!---------------------- finish main content -------------------------------------------->
