<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header login_modal_header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h2 class="modal-title" id="myModalLabel">{{ trans('lang.login_to_your_account') }}</h2>
      		</div>
      		<div class="modal-body login-modal">
      			<div class="clearfix"></div>
				<p><center style="color:red" id="error-login"></center></p>
      			<div id='social-icons-conatainer'>
	        		<div class='modal-body-left'>
	        			<div class="form-group">
		              		<input type="text" id="login-email" placeholder="Enter your email" value="" class="form-control login-field" name="email">
		              		<i class="fa fa-user login-field-icon"></i>
		            	</div>
		
		            	<div class="form-group">
		            	  	<input type="password" id="login-pass" placeholder="Password" value="" class="form-control login-field" name="password">
		              		<i class="fa fa-lock login-field-icon"></i>
		            	</div>
		            	<button class="btn1 btn-success modal-login-btn" style="background-color: #5cb85c; color:#fff" id="btnLogin">{{ trans('lang.login') }}</button>
		            	<a href="{{route('myaccount.password.email')}}" class="login-link text-center">{{ trans('lang.lost_your_password') }}?</a>
	        		</div>
	        	
	        		<div class='modal-body-right'>
	        			<div class="modal-social-icons">
	        				<a href='{{route('social.login',['facebook'])}}' class="btn1 facebook"> <i class="fa fa-facebook modal-icons"></i> {{ trans('lang.sign_in_with_facebook') }} </a>
	        				<a href='#' class="btn1 twitter"> <i class="fa fa-twitter modal-icons"></i> {{ trans('lang.sign_in_with_twitter') }} </a>
	        				<a href='{{route('social.login',['google'])}}' class="btn1 google"> <i class="fa fa-google-plus modal-icons"></i> {{ trans('lang.sign_in_with_google') }} </a>
	        				<a href='#' class="btn1 linkedin"> <i class="fa fa-linkedin modal-icons"></i> {{ trans('lang.sign_in_with_linkedin') }} </a>
	        			</div> 
	        		</div>	
	        		<div id='center-line'> {{ trans('lang.or') }} </div>
	        	</div>																												
        		<div class="clearfix"></div>
        		
        		<div class="form-group modal-register-btn">
        			<a href="{{route('myaccount.create')}}" class="btn1"> {{ trans('lang.new_user_please_register') }}</a>
        		</div>
      		</div>
      		<div class="clearfix"></div>
      		<div class="modal-footer login_modal_footer">
      		</div>
    	</div>
  	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('#btnLogin').click(function(){
    $.ajax({
      url: "{{ route('authLogin') }}",
      type: "POST",
      data: {'email':$('input[name=email]').val(), 'password':$('input[name=password]').val()},
      success: function(data){
        if(data.error)
        {
            $('#error-login').css("display", "block");
        	$('#error-login').text( data.massage);
            setTimeout(function() {$('#error-login').fadeOut(500)},2000)
        }
        else if(data.success)
        {
          window.location.reload();
        }
      }
    });      
  }); 
});
</script>