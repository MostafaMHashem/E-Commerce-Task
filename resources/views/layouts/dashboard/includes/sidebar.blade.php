<body>
    <main class="d-flex sidemobile p-0">
        <!---------------------- start sidebar -------------------------------------------->
        <section class="sidebar open">
            <ul class=" nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                <!-- <div class="image_logo">
                    <img src="{{ asset('dashboardAssets/image/logo.png') }}" alt="logo_sidebar" class="logo" />
                </div> -->
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link align-middle">
                        <img src="{{ asset('dashboardAssets/image/home-icon.png') }}" alt="icon" />
                        <span>الرئيسية</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.orders.index') }}" class="nav-link align-middle">
                        <img src="{{ asset('dashboardAssets/image/note-icon.png') }}" alt="icon" />
                        <span>الطلبات</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a onclick="acceptLogoutAlert()" style="cursor: pointer" class="nav-link align-middle">
                        <img src="{{ asset('dashboardAssets/image/logout-icon.png') }}" alt="icon" />
                        <span> تسجيل الخروج</span>
                    </a>
                </li>


            </ul>
        </section>
        <!---------------------- end sidebar -------------------------------------------->
