<div id="bottom" class="cmsmasters_color_scheme_footer">
    <div class="bottom_bg">
        <div class="bottom_outer">
            <div class="bottom_inner sidebar_layout_14141414">
                <aside id="text-3" class="widget widget_text">
                    <h3 class="widgettitle">Liên Hệ</h3>
                    <div class="textwidget">
                        <ul class="styled_list">
                            @foreach($listConfig as $config)
                                <li><a href="#">{{@$config->value}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
                <aside id="text-3" class="widget widget_text">
                    <h3 class="widgettitle">Giới Thiệu</h3>
                    <div class="textwidget">
                        <ul class="styled_list">
                            <li><a href="{{route('aboutUs')}}">Giới thiệu</a></li>
                        </ul>
                    </div>
                </aside>
                <aside id="text-5" class="widget widget_text">
                    <h3 class="widgettitle">Tài khoản</h3>
                    <div class="textwidget">
                        <ul class="styled_list">
                            @if (!\Auth::check())
                                <li><a href="{{ route('myaccount.index') }}">Đăng nhập</a></li>
                                <li><a href="{{ route('myaccount.create') }}">Tạo tài khoản mới</a></li>
                            @else
                                <li><a href="{{ route('myaccount.edit') }}">Sửa thông tin tài khoản</a></li>
                                <li><a href="{{ route('customer.logout') }}">Đăng xuất</a></li>
                            @endif
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<footer id="footer" class="cmsmasters_color_scheme_footer cmsmasters_footer_small">
    <div class="footer_inner">
        <div class="footer_in_inner footer_ctr_align">
				<span class="footer_copyright copyright">
			{{\App\Models\Configuration::findOrFail(1)->value}}	</span>
        </div>
    </div>
</footer>