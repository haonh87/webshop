<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/common.js') }}" type="text/javascript"></script>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="footer_box">
					<h5>{{ trans('lang.information') }}</h5>
					<ul class="list-unstyled">
						<li><a href="#">{{ trans('lang.about_us') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="footer_box">
					<h5>{{ trans('lang.customer_service') }}</h5>
					<ul class="list-unstyled">
						<li><a href="#">{{ trans('lang.contact_us') }}</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="footer_box">
					<h5>{{ trans('lang.my_account') }}</h5>
					<ul class="list-unstyled">
						<li><a href="{{route('myaccount.index')}}">{{ trans('lang.my_account') }}</a></li>
						<li><a href="{{ route('wishlist.index') }}">{{ trans('lang.wish_list') }}</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<ul class="social-list list-unstyled">
				<li>
					<a href='//www.youtube.com'> 
						<i class="fa fa-twitter"></i>
						<span>Twitter</span>
					</a>
				</li>
				<li>
					<a href='//www.youtube.com'> 
						<i class="fa fa-facebook"></i> <span>Facebook</span>
					</a>
				</li>
				<li><a href='#'> <i class="fa fa-rss"></i> <span>RSS</span></a></li>
			</ul>
		</div>
	</div>
</footer>
