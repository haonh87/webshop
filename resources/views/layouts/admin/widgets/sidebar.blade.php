<div class="sidebar">
    <ul class="widget widget-menu list-unstyled">
        <li class="active">
            <a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard</a>
        </li>
        {{--Product manager--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#productManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý sản phẩm</a>
            <ul id="productManagement" class="collapse list-unstyled">
                <li><a href="{{ route('products.index') }}"><i class="icon-inbox"></i>Danh mục sản phẩm</a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>Thêm mới sản phẩm</a></li>
            </ul>
        </li>
        {{--categories manager--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#categoryManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý loại sản phẩm</a>
            <ul id="categoryManagement" class="collapse list-unstyled">
                <li><a href="{{ route('admin.category-management') }}"><i class="icon-inbox"></i>Danh mục sản phẩm</a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Danh sách sản phẩm</a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>Thêm mới sản phẩm</a></li>
            </ul>
        </li>
        {{--user manager--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#userManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý người dùng</a>
            <ul id="userManagement" class="collapse list-unstyled">
                <li><a href="{{ route('admin.user.index') }}"><i class="icon-inbox"></i>Danh sách người dùng</a></li>
                <li><a href="{{ route('admin.user.create') }}"><i class="icon-inbox"></i>Thêm mới người dùng</a></li>
            </ul>
        </li>
        {{--order manager--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#orderManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý đơn hàng</a>
            <ul id="orderManagement" class="collapse list-unstyled">
                <li><a href="{{ route('admin.order.index') }}"><i class="icon-inbox"></i>Danh sách đơn hàng</a></li>
            </ul>
        </li>


        <li><a href="message.html"><i class="menu-icon icon-inbox"></i>Inbox <b
                        class="label green pull-right">
                    11</b> </a></li>
        <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b
                        class="label orange pull-right">
                    19</b> </a></li>
    </ul>
    <!--/.widget-nav-->


    <ul class="widget widget-menu list-unstyled">
        <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
        <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
        <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
        <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
        <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
    </ul>
    <!--/.widget-nav-->
    <ul class="widget widget-menu list-unstyled">
        <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i
                        class="menu-icon icon-cog">
                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                </i>More Pages </a>
            <ul id="togglePages" class="collapse list-unstyled">
                <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
            </ul>
        </li>
        <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
    </ul>
</div>
<!--/.sidebar-->