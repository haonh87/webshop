<aside id="column-left" class="col-sm-3 ">
	<div class="box account info">
		<div class="box-heading">
			<h3>{{ trans('lang.account') }}</h3>
		</div>
		<div class="box-content">
			<ul>
				@if(Auth::check())
				<li>
					<a href="{{route('myaccount.index')}}">{{ trans('lang.my_account') }}</a>
				</li>
				<li>
					<a href="{{route('myaccount.edit',[Auth::user()->id])}}">{{ trans('lang.edit_account') }}</a>
				</li>
				<li>
					<a href="{{route('myaccount.old.orders')}}">{{ trans('lang.order_history') }}</a>
				</li>
				<li>
					<a href="{{ route('wishlist.index') }}">{{ trans('lang.wish_list') }}</a>
				</li>
					<li>
						<a href="{{ route('cart.index') }}">
							<span>{{ trans('lang.shopping_cart') }}</span>
						</a>
					</li>
					<li>
						<a href="{{ route('cart.checkout') }}" title="Checkout">
							<span>{{ trans('lang.checkout') }}</span>
						</a>
					</li>
				<li>
					<a href="{{route('myaccount.edit.password',['myaccount' => Auth::user()->id])}}">Password</a>
				</li>
				<li>
					<a href="{{ route('logout') }}">{{ trans('lang.logout') }}</a>
				</li>
					@else
					<li>
						<a href="{{ route('cart.index') }}">
							<span>{{ trans('lang.shopping_cart') }}</span>
						</a>
					</li>
					<li>
						<a href="{{ route('cart.checkout') }}" title="Checkout">
							<span>{{ trans('lang.checkout') }}</span>
						</a>
					</li>
					<li>
						<a href="#" data-toggle="modal" data-target="#login-modal">{{ trans('lang.login') }}</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</aside>