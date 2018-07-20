function getURLVar(key) {
	var value = [];

	var query = String(document.location).split('?');

	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');

			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}

		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
}
$(document).ready(function() {
	setTimeout(function() {$('.alert').fadeOut(1000)},3000)
	var url = $(location).attr('href').split("/");
	// Adding the clear Fix
	cols1 = $('#column-right, #column-left').length;
	
	if (cols1 == 2) {
		$('#content .product-layout:nth-child(2n+2)').after('<div class="clearfix visible-md visible-sm"></div>');
	} else if (cols1 == 1) {
		//$('#content .product-layout:nth-child(3n+3)').after('<div class="clearfix hidden-xs"></div>');
	} else {
		$('#content .product-layout:nth-child(4n+5)').addClass('last');
	}
	// Highlight any found errors
	$('.text-danger').each(function() {
		var element = $(this).parent().parent();
		
		if (element.hasClass('form-group')) {
			element.addClass('has-error');
		}
	});
		
	// Currency
	$('#currency .currency-select').on('click', function(e) {
		e.preventDefault();

		$('#currency input[name=\'code\']').attr('value', $(this).attr('name'));

		$('#currency').submit();
	});

	// Language
	$('#language a').on('click', function(e) {
		e.preventDefault();

		$('#language input[name=\'code\']').attr('value', $(this).attr('href'));

		$('#language').submit();
	});

	/* Search */
	$('#search input[name=\'search\']').parent().find('button').on('click', function() {
		url = $('base').attr('href') + 'index.php?route=product/search';

		var value = $('header input[name=\'search\']').val();

		if (value) {
			url += '&search=' + encodeURIComponent(value);
		}

		location = url;
	});

	$('#search input[name=\'search\']').on('keydown', function(e) {
		if (e.keyCode == 13) {
			$('header input[name=\'search\']').parent().find('button').trigger('click');
		}
	});

	// Menu
	$('#menu .dropdown-menu').each(function() {
		var menu = $('#menu').offset();
		var dropdown = $(this).parent().offset();

		var i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());

		if (i > 0) {
			$(this).css('margin-left', '-' + (i + 5) + 'px');
		}
	});

	// Product List
	$('#list-view').click(function() {
		$('#content .product-layout > .clearfix').remove();
		$(this).addClass('active');
		$('#grid-view').removeClass('active');
		$('#content .product-layout').attr('class', 'product-layout product-list col-xs-12');

		localStorage.setItem('display', 'list');
	});

	// Product Grid
	$('#grid-view').click(function() {
		$(this).addClass('active');
		$('#list-view').removeClass('active');
		$('#content .product-layout > .clearfix').remove();

		// What a shame bootstrap does not take into account dynamically loaded columns
		cols = $('#column-right, #column-left').length;

		if (cols == 2) {
			$('#content .product-layout').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-12 col-xs-12');
		} else if (cols == 1) {
			$('#content .product-layout').attr('class', 'product-layout product-grid col-lg-4 col-md-4 col-sm-4 col-xs-12');
		} else {
			$('#content .product-layout').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12');
		}

		 localStorage.setItem('display', 'grid');
	});

	if (localStorage.getItem('display') == 'list') {
		$('#list-view').trigger('click');
	} else {
		$('#grid-view').trigger('click');
	}

	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});
});

// Cart add remove functions
var url = $(location).attr('href').split("/");
var cart = {
	'add': function(url){
		location=url;
	},
	'update': function(url,key) {
		$.ajax({
			url: url,
			type: 'PUT',
			data: 'quantity=' + $('#quantity'+key).val(),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('');
			},
			success: function(json) {
				$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$('#cart > button').button('reset');
				$('#cart-total').html(json['total']);
				var url      = window.location.href;
				$('#cart').load(url+' #cart');
				$('#content').load(url+' #sub-content');
				$('.tooltip.fade.top.in').remove();
				setTimeout(function() {$('.alert').fadeOut(1000)},3000)
			}
		});
	},
	'remove': function(url,key) {
		console.log(url);
		$.ajax({
			url: url,
			type: 'DELETE',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('');
			},
			success: function(json) {
				$('#content').parent().before('<div class="alert alert-warning"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				$('#cart > button').button('reset');

				$('#cart-total').html(json['total']);
				// var pathname = window.location.pathname;
				var url      = window.location.href;
				$('#cart').load(url+' #cart');
				$('#content').load(url+' #sub-content');
				$('.tooltip.fade.top.in').remove();
				setTimeout(function() {$('.alert').fadeOut(1000)},3000)
			}
			
		});
	}
}
var wishlist = {
	'add': function(url, product_id) {
		$.ajax({
			url: url,
			type: 'POST',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				console.log(json);
				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

				if (json['info']) {
					$('#content').parent().before('<div class="alert alert-info"><i class="fa fa-info-circle"></i> ' + json['info'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

				$('#wishlist-total').html('<i class="fa fa-heart"></i> <span> Wish List ( '+json['total']+' )</span>');
				$('#wishlist-total').attr('title', 'Wish List ('+json['total']+')');

				/*$('html, body').animate({ scrollTop: 0 }, 'slow');*/
				setTimeout(function() {$('.alert').fadeOut(1000)},2000)
			},
			error: function(json){
				console.log(json);
			}
		});
	},
	'remove': function(url, product_id) {
		
		var msg_err = "";
		if(url[3] == "ru"){
			msg_err = 'ошибка';
		}else{
			msg_err = 'Error!';
		}
		$.ajax({
			url: url,
			type: 'DELETE',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				console.log(json);
				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

				$('#wishlist-total').html('<i class="fa fa-heart"></i> <span> Wish List ( '+json['total']+' )</span>');
				$('#wishlist-total').attr('title', 'Wish List ('+json['total']+')');
				$('#tblRow'+product_id).remove();
				$('.tooltip.fade.top.in').remove();
				/*$('html, body').animate({ scrollTop: 0 }, 'slow');*/
				setTimeout(function() {$('.alert').fadeOut(1000)},2000)
			},
			error: function(){
				$('#content').parent().before('<div class="alert alert-error"><i class="fa fa-check-circle"></i>'+msg_err+'<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			}
		});
	}
}
var compare = {
	'add': function(url, product_id) {
		$.ajax({
			url: url,
			type: 'PUT',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				console.log(json);
				$('.alert').remove();

				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					$('#compare-total').html(json['total']);

					/*$('html, body').animate({ scrollTop: 0 }, 'slow');*/
					setTimeout(function() {$('.alert').fadeOut(1000)},3000)
				}
			}
		});
	},
	'remove': function() {
	
	}
}

/* Agree to Terms */
$(document).delegate('.agree', 'click', function(e) {
	e.preventDefault();

	$('#modal-agree').remove();

	var element = this;

	$.ajax({
		url: $(element).attr('href'),
		type: 'get',
		dataType: 'html',
		success: function(data) {
			html  = '<div id="modal-agree" class="modal">';
			html += '  <div class="modal-dialog">';
			html += '    <div class="modal-content">';
			html += '      <div class="modal-header">';
			html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			html += '        <h4 class="modal-title">' + $(element).text() + '</h4>';
			html += '      </div>';
			html += '      <div class="modal-body">' + data + '</div>';
			html += '    </div';
			html += '  </div>';
			html += '</div>';

			$('body').append(html);

			$('#modal-agree').modal('show');
		}
	});
});

/* Autocomplete */
(function($) {
	function Autocomplete(element, options) {
		this.element = element;
		this.options = options;
		this.timer = null;
		this.items = new Array();

		$(element).attr('autocomplete', 'off');
		$(element).on('focus', $.proxy(this.focus, this));
		$(element).on('blur', $.proxy(this.blur, this));
		$(element).on('keydown', $.proxy(this.keydown, this));

		$(element).after('<ul class="dropdown-menu"></ul>');
		$(element).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));
	}

	Autocomplete.prototype = {
		focus: function() {
			this.request();
		},
		blur: function() {
			setTimeout(function(object) {
				object.hide();
			}, 200, this);
		},
		click: function(event) {
			event.preventDefault();

			value = $(event.target).parent().attr('data-value');

			if (value && this.items[value]) {
				this.options.select(this.items[value]);
			}
		},
		keydown: function(event) {
			switch(event.keyCode) {
				case 27: // escape
					this.hide();
					break;
				default:
					this.request();
					break;
			}
		},
		show: function() {
			var pos = $(this.element).position();

			$(this.element).siblings('ul.dropdown-menu').css({
				top: pos.top + $(this.element).outerHeight(),
				left: pos.left
			});

			$(this.element).siblings('ul.dropdown-menu').show();
		},
		hide: function() {
			$(this.element).siblings('ul.dropdown-menu').hide();
		},
		request: function() {
			clearTimeout(this.timer);

			this.timer = setTimeout(function(object) {
				object.options.source($(object.element).val(), $.proxy(object.response, object));
			}, 200, this);
		},
		response: function(json) {
			html = '';

			if (json.length) {
				for (i = 0; i < json.length; i++) {
					this.items[json[i]['value']] = json[i];
				}

				for (i = 0; i < json.length; i++) {
					if (!json[i]['category']) {
						html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
					}
				}

				// Get all the ones with a categories
				var category = new Array();

				for (i = 0; i < json.length; i++) {
					if (json[i]['category']) {
						if (!category[json[i]['category']]) {
							category[json[i]['category']] = new Array();
							category[json[i]['category']]['name'] = json[i]['category'];
							category[json[i]['category']]['item'] = new Array();
						}

						category[json[i]['category']]['item'].push(json[i]);
					}
				}

				for (i in category) {
					html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

					for (j = 0; j < category[i]['item'].length; j++) {
						html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
					}
				}
			}

			if (html) {
				this.show();
			} else {
				this.hide();
			}

			$(this.element).siblings('ul.dropdown-menu').html(html);
		}
	};

	$.fn.autocomplete = function(option) {
		return this.each(function() {
			var data = $(this).data('autocomplete');

			if (!data) {
				data = new Autocomplete(this, option);

				$(this).data('autocomplete', data);
			}
		});
	}
})(window.jQuery);

//User function

function postReview(url,product_id)
{
		
		var comment = $('textarea[name=\'text\']').val();
		var msg_err = "";
		var msg_vote = "";
		var msg_write = "";
		if(url[3] == "ru"){
			msg_err = 'ошибка';
			msg_vote = 'Голосов. Пожалуйста!';
			msg_write = "написать больше. Пожалуйста!";
		}else{
			msg_err = 'Error!';
			msg_vote = 'vote. please!ote. please!';
			msg_write = "write more. please!";
		}
		var star = $('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : 0;
		$.ajax({
			url: url,
			type: 'post',
			dataType: 'json',
			data: {product_id: product_id, comment: comment, star:star},
			beforeSend: function() {
				$('#button-review').button('loading');
				$('.alert-success, .alert-danger').remove();
				if(comment.trim().length < 5)
				{
					$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>'+msg_write+'</div>');
					$('textarea[name=\'text\']').focus();
					$('#button-review').button('reset');
					return false;
				}
				if(star == 0)
				{
					$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>'+msg_vote+'</div>');
					$('input[name=\'rating\']:first').focus();
					$('#button-review').button('reset');
					return false;
				}
			},
			complete: function() {
				$('#button-review').button('reset');
			},
			success: function(json) {
				console.log(json);
				$('.alert-success, .alert-danger').remove();
				if (json['error']) {
					$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
				}
				
				if (json['success']) {
					$('#review').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');
					$('textarea[name=\'text\']').val('');
					$('input[name=\'rating\']:checked').prop('checked', false);
				}
				var url      = window.location.href;
				$('#rating').load(url+' #rating');
				$('#tab-review').load(url+' #tab-review');
				setTimeout(function() {$('.alert-success, .alert-danger').fadeOut(1000)},1000);
				$('#reviews_form').fadeOut('slow');
			},
			error: function(){
				$('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i>'+msg_err+'</div>');
				$('#reviews_form').fadeOut('slow');
			}
		});
}

