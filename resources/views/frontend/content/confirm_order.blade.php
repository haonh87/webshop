<div id="content" class="col-sm-9">
		<h1>{{ trans('lang.order_replace') }}</h1>
      <p>{{ trans('lang.order_success') }}</p>
      <p>{{ trans('lang.order_question') }} 
      	<a href="{{route('contact')}}">{{ trans('lang.store_owner') }}</a>.</p>
        <p>{{trans('lang.thanks_shopping_online')}}
      </p>
      <div class="buttons">
        <div class="pull-right">
        	<a href="{{ route('index') }}" class="btn btn-primary">{{ trans('lang.continue') }}</a>
        </div>
      </div>
</div>