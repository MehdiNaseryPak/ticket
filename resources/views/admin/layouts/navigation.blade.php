<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="دسته بندی ها">
                <a href="#categories" title=" دسته بندی ها">
                    <i class="icon ti-layout-list-thumb-alt"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="اسلایدر ها">
                <a href="#sliders" title="اسلایدر ها">
                    <i class="icon ti-image"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="جایگاه ها">
                <a href="#positions" title="جایگاه ها">
                    <i class="icon ti-layers"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="فیلم ها">
                <a href="#movies" title="فیلم ها">
                    <i class="icon ti-video-clapper"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title="کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <a href="login.html" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="categories">
            <li>
                <a href="#">دسته بندی</a>
                <ul>
                    <li><a href="{{ route('admin.categories.create') }}">ایجاد دسته بندی</a></li>
                    <li><a href="{{ route('admin.categories.index') }}">لیست دسته بندی ها</a></li>
                </ul>
            </li>
        </ul>
        <ul id="sliders">
            <li>
                <a href="#">اسلایدر</a>
                <ul>
                    <li><a href="{{ route('admin.sliders.create') }}">ایجاد اسلایدر</a></li>
                    <li><a href="{{ route('admin.sliders.index') }}">لیست اسلایدر ها</a></li>
                </ul>
            </li>
        </ul>
        <ul id="positions">
            <li>
                <a href="#">جایگاه ها</a>
                <ul>
                    <li><a href="{{ route('admin.positions.create') }}">ایجاد جایگاه</a></li>
                    <li><a href="{{ route('admin.positions.index') }}">لیست جایگاه ها</a></li>
                </ul>
            </li>
        </ul>
        <ul id="movies">
            <li>
                <a href="#">فیلم</a>
                <ul>
                    <li><a href="#">ایجاد فیلم</a></li>
                    <li><a href="#">لیست فیلم ها</a></li>
                </ul>
            </li>
        </ul>
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{ route('admin.users.create') }}">ایجاد کاربر</a></li>
                    <li><a href="{{ route('admin.users.index') }}">لیست کاربران</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
