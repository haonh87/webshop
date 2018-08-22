<div class="sidebar">
    <ul class="widget widget-menu list-unstyled">
        <li class="active">
            <a href="index.html"><i class="menu-icon icon-dashboard"></i>Dashboard</a>
        </li>
        {{--Product Management--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#productManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý sản phẩm</a>
            <ul id="productManagement" class="collapse list-unstyled">
                <li><a href="{{ route('admin.category-management') }}"><i class="icon-inbox"></i>Danh mục sản phẩm</a></li>
                <li><a href="{{ route('products.index') }}"><i class="icon-inbox"></i>Danh sách sản phẩm</a></li>
                <li><a href="{{ route('admin.product.color-management') }}"><i class="icon-inbox"></i>Màu sắc sản phẩm</a></li>
                <li><a href="{{ route('admin.product.size-management') }}"><i class="icon-inbox"></i>Kích cỡ sản phẩm</a></li>
            </ul>
        </li>
        {{--Post Management--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#postManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý bài viết</a>
            <ul id="postManagement" class="collapse list-unstyled">
                <li><a href="{{ route('admin.post-category-management') }}"><i class="icon-inbox"></i>Danh mục bài viết</a></li>
                <li><a href="{{ route('admin.post-management') }}"><i class="icon-inbox"></i>Bài viết</a></li>
            </ul>
        </li>
        {{--user manager--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#userManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý người dùng</a>
            <ul id="userManagement" class="collapse list-unstyled">
                <li><a href="{{ route('admin.user.index') }}"><i class="icon-inbox"></i>Danh sách người dùng</a></li>
                <li><a href="{{ route('admin.user.create') }}"><i class="icon-inbox"></i>Thêm mới người dùng</a></li>
                <li><a href="{{ route('admin.configuration-management') }}"><i class="icon-inbox"></i>Quản lí cấu hình</a></li>
            </ul>
        </li>
        {{--order manager--}}
        <li>
            <a class="collapsed" data-toggle="collapse" href="#orderManagement"><i class="menu-icon icon-bullhorn"></i>Quản lý đơn hàng</a>
            <ul id="orderManagement" class="collapse list-unstyled">
                <li><a href="{{ route('admin.order.index') }}"><i class="icon-inbox"></i>Danh sách đơn hàng</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--/.sidebar-->