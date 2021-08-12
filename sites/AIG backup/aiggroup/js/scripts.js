jQuery(function($) {
    "use strict";

    // Custom jQuery Code Here

    $('.portfolioslider').flexslider({
        animation:'slide',
        smoothHeight:true,
        controlNav: false
    });

    $('.newhomeslider').flexslider({
        animation:'slide',
        smoothHeight:true,
        controlNav: false
    });

});

Modernizr.addTest('ipad', function () {
    return !!navigator.userAgent.match(/iPad/i);
});

Modernizr.addTest('iphone', function () {
    return !!navigator.userAgent.match(/iPhone/i);
});

Modernizr.addTest('ipod', function () {
    return !!navigator.userAgent.match(/iPod/i);
});

Modernizr.addTest('appleios', function () {
    return (Modernizr.ipad || Modernizr.ipod || Modernizr.iphone);
});

Modernizr.addTest('positionfixed', function () {
    var test    = document.createElement('div'),
        control = test.cloneNode(false),
        fake = false,
        root = document.body || (function () {
            fake = true;
            return document.documentElement.appendChild(document.createElement('body'));
        }());

    var oldCssText = root.style.cssText;
    root.style.cssText = 'padding:0;margin:0';
    test.style.cssText = 'position:fixed;top:42px';
    root.appendChild(test);
    root.appendChild(control);

    var ret = test.offsetTop !== control.offsetTop;

    root.removeChild(test);
    root.removeChild(control);
    root.style.cssText = oldCssText;

    if (fake) {
        document.documentElement.removeChild(root);
    }

    /* Uh-oh. iOS would return a false positive here.
     * If it's about to return true, we'll explicitly test for known iOS User Agent strings.
     * "UA Sniffing is bad practice" you say. Agreeable, but sadly this feature has made it to
     * Modernizr's list of undectables, so we're reduced to having to use this. */
    return ret && !Modernizr.appleios;
});


// Modernizr.load loading the right scripts only if you need them
Modernizr.load([
    {
        // Let's see if we need to load selectivizr
        test : Modernizr.borderradius,
        // Modernizr.load loads selectivizr and Respond.js for IE6-8
        nope : [ale.template_dir + '/js/libs/selectivizr.min.js', ale.template_dir + '/js/libs/respond.min.js']
    },{
        test: Modernizr.touch,
        yep:ale.template_dir + '/css/touch.css'
    }
]);



jQuery(function($) {
    var is_single = $('#post').length;
    var posts = $('article.post');
    var is_mobile = parseInt(ale.is_mobile);

    var slider_settings = {
        animation: "slide",
        slideshow: false,
        controlNav: false
    }

    $(document).ajaxComplete(function(){
        try{
            if (!posts.length) {
                return;
            }
            FB.XFBML.parse();
            gapi.plusone.go();
            twttr.widgets.load();
            pin_load();
        }catch(ex){}
    });

    // open external links in new window
    $("a[rel$=external]").each(function(){
        $(this).attr('target', '_blank');
    });

    $.fn.init_posts = function() {
        var init_post = function(data) {
            // close other posts
            data.post.siblings('.open-post').find('a.toggle').trigger('click', {
                hide:true
            });

            var loading = data.post.find('span.loading');

            if (data.more.is(':empty')) {
                data.post.addClass('post-loading');
                loading.css('visibility', 'visible');
                data.more.load(ale.ajax_load_url, {
                    'action':'aletheme_load_post',
                    'id':data.post.data('post-id')
                }, function(){
                    loading.remove();
                    data.more.slideDown(400, function(){
                        data.post.addClass('open-post');
                        data.toggler.text('Close Post');
                        $('.video', data.more).fitVids();
                        if (data.scroll) {
                            data.scroll.scrollTo('fast');
                        }
                    });
                    init_comments(data.post);
                });
            } else {
                data.more.slideDown(400, function(){
                    data.post.addClass('open-post');
                    data.toggler.text('Close Post');
                    if (data.scroll) {
                        data.scroll.scrollTo('fast');
                    }
                });
            }
        }

        var load_post = function(e, _opts) {
            e.preventDefault();
            var data  = {
                toggler:$(this),
                scroll:false
            };
            var opts = $.extend({
                comments:false,
                hide:false,
                add_comment:false
            }, _opts);
            data.post = data.toggler.parents('article.post');
            data.more = data.post.find('.full');

            if (data.more.is(':visible')) {
                if (opts.hide == true) {
                    // quick hide for multiple posts
                    data.more.hide();
                } else {
                    data.more.slideUp(400);
                }
                data.toggler.text('Open Post');
                data.post.removeClass('open-post');
            } else {
                if (typeof(e.originalEvent) != 'undefined' ) {
                    data.scroll = data.post;
                }
                init_post(data);
            }
        }

        var init_comments = function(post) {
            var respond = $('section.respond', post);
            var respond_form = $('form', respond);
            var respond_form_error = $('p.error', respond_form);
            //var respond_cancel = $('.cancel-comment-reply a', respond);
            var comments = $('section.comments', post);

            /*$('a.comment-reply-link', post).on('click', function(e){
             e.preventDefault();
             var comment = $(this).parents('li.comment');
             comment.find('>div').append(respond);
             respond_cancel.show();
             respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
             respond.find('input[name=comment_parent]').val(comment.data('comment-id'));
             respond.find('input:first').focus();
             }).attr('onclick', '');

             respond_cancel.on('click', function(e){
             e.preventDefault();
             comments.after(respond);
             respond.find('input[name=comment_post_ID]').val(post.data('post-id'));
             respond.find('input[name=comment_parent]').val(0);
             $(this).hide();
             });
             */
            respond_form.ajaxForm({
                'beforeSubmit':function(){
                    respond_form_error.text('').hide();
                },
                'success':function(_data){
                    var data = $.parseJSON(_data);
                    if (data.error) {
                        respond_form_error.html(data.msg).slideDown('fast');
                        return;
                    }
                    var comment_parent_id = respond.find('input[name=comment_parent]').val();
                    var _comment = $(data.html);
                    var list;
                    _comment.hide();

                    if (comment_parent_id == 0) {
                        list = comments.find('ol');
                        if (!list.length) {
                            list = $('<ol class="commentlist "></ol>');
                            comments.find('.scrollbox .jspContainer .jspPane').append(list);
                        }
                    } else {
                        list = $('#comment-' + comment_parent_id).parent().find('ul');
                        if (!list.length) {
                            list = $('<ul class="children"></ul>');
                            $('#comment-' + comment_parent_id).parent().append(list);
                        }
                        respond_cancel.trigger('click');
                    }
                    list.append(_comment);
                    _comment.fadeIn('fast');
                    //.scrollTo();

                    respond.find('textarea').clearFields();
                },
                'error':function(response){
                    var error = response.responseText.match(/\<p\>(.*)<\/p\>/)[1];
                    if (typeof(error) == 'undefined') {
                        error = 'Something went wrong. Please reload the page and try again.';
                    }
                    respond_form_error.html(error).slideDown('fast');
                }
            });
        }
        $(this).each(function(){
            var post = $(this);
            // init post galleries
            $(window).load(function(){
                $('.preview .flexslider', post).flexslider(slider_settings);
            });
            // do not init ajax posts & comments for mobile
            if (!is_mobile) {
                // ajax posts enabled
                if (ale.ajax_posts) {
                    $('a.toggle', post).click(load_post);
                    $('.video', post).fitVids();
                    $('.preview figure a', post).click(function(e){
                        e.preventDefault();
                        $(this).parents('article.post').find('a.toggle').trigger('click');
                    });
                }
            }
        });
        // init ajax comments on a single post if ajax comments are enabled
        if (is_single && parseInt(ale.ajax_comments)) {
            init_comments(posts);
        }
        // open single post on page
        if (parseInt(ale.ajax_open_single) && !is_single && posts.length == 1) {
            posts.find('a.toggle').trigger('click');
        }
    }
    posts.init_posts();

    $.fn.init_gallery = function() {
        $(this).each(function(){
            var gallery = $(this);
            $(window).load(function(){
                $('.flexslider', gallery).flexslider(slider_settings);
            });

        })
    }
    $('#gallery').init_gallery();

    $.fn.init_archives = function()
    {
        $(this).each(function(){
            var archives = $(this);
            var year = $('#archives-active-year');
            var months = $('div.months div.year-months', archives);
            var arrows = $('a.up, a.down', archives);
            var activeMonth;
            var current, active;
            var animated = false;
            if (months.length == 1) {
                arrows.remove();
                activeMonth = months.filter(':first').addClass('year-active').show();
                year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
                return;
            }
            arrows.click(function(e){
                e.preventDefault();
                if (animated) {
                    return;
                }
                var fn = $(this);
                animated = true;
                arrows.css('visibility', 'visible');
                var current = months.filter('.year-active');
                if (fn.hasClass('up')) {
                    active = current.prev();
                    if (!active.length) {
                        active = months.filter(':last');
                    }
                } else {
                    active = current.next();
                    if (!active.length) {
                        active = months.filter(':first');
                    }
                }
                current.removeClass('year-active').fadeOut(150, function(){
                    active.addClass('year-active').fadeIn(150, function(){
                        animated = false;
                    });
                    year.text(active.attr('id').replace(/[^0-9]*/, ''));

                    if (fn.hasClass('up')) {
                        if (!active.prev().length) {
                            arrows.filter('.up').css('visibility', 'hidden');
                        }
                    } else {
                        if (!active.next().length) {
                            arrows.filter('.down').css('visibility', 'hidden');
                        }
                    }
                });
            });
            activeMonth = months.filter(':first').addClass('year-active').show();
            year.text(activeMonth.attr('id').replace(/[^0-9]*/, ''));
            arrows.filter('.up').css('visibility', 'hidden');
        });
    }
    $('#archives .ale-archives').init_archives();
		var ajax_path = '/wp-admin/admin-ajax.php';

//ФУНКЦИИ ОТКРЫТИЯ ЗАКРЫТИЯ ЭЛЕМЕНТОВ ПО CLICK
        $( ".button-item a" ).click(function( event ) {
          event.preventDefault();
        });




	  $( ".get_buy_popup" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
        var all_form_field = $(this).siblings();
        console.log(all_form_field);
        $('#buyForm #programm_title').html(all_form_field[0].innerText);

        if(all_form_field[3].innerText != ''){
            var the_cost = all_form_field[3].innerText;
        }
        else {
            var the_cost = all_form_field[2].innerText;
        }
        
        $('#buyForm #coast_programm_buy').val(the_cost);
        $('#buyForm #programm_title_input').val(all_form_field[0].innerText);
	    $( "#buy_pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
	  });
	  
	  $( ".get_buy_popup_service" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
        // var all_form_field = $(this).siblings();
        // $('#buyForm #programm_title').html(all_form_field[1].innerText);
        $('#buyForm #programm_title').html( get_product_title( $(this) ));
        $( "#buy_pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
      });
      
      function get_product_title(e_target) {
        // var all_form_field = $(e_target);
        var block = e_target.closest('.about_small_inside');
        console.log(e_target.html());
        if (e_target.attr("data-title")) {
            return e_target.attr("data-title");
        } else if (block.find('h4')) {
            return block.find('h4').text();
        } else return false;
      }
	  
	  $( "#buyForm #closePopUp" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
	    $( "#buy_pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
	  });
	  
	  $( "#show_menu" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
	    $( ".mobile_menu" ).toggle(); //  скрываем, или отображаем все элементы <div>
	  });

        $( ".fon_pop_up_buy" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
            $( "#buy_pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
        });

        $( ".fon_pop_up_thank" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
            $( "#pop_up_thank" ).toggle(); //  скрываем, или отображаем все элементы <div>
        });

        $( "#callBackForm #closePopUp" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
	    $( "#pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
	  });

        $( "#closePopUpThank" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
            $( "#pop_up_thank" ).toggle(); //  скрываем, или отображаем все элементы <div>
        });
	  
	  $( ".fon_pop_up" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
	    $( "#pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
	  });
	  
	  $( "#get_sale_phone" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
	    $( "#pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
		let new_input = document.getElementById('jira_project_sale');
		$("#jira_project_hot").remove();
		if(!new_input)
		{
			$( "#callBackForm" ).append('<input type="hidden" value="1" id="jira_project_sale">');
		}
	  });
	  
	  $( "#get_consultation_phone" ).click(function(){ // задаем функцию при нажатиии на элемент с классом toggle
	    $( "#pop_up_block" ).toggle(); //  скрываем, или отображаем все элементы <div>
		let new_input = document.getElementById('jira_project_hot');
		$("#jira_project_sale").remove();
		if(!new_input)
		{
			$( "#callBackForm" ).append('<input type="hidden" value="0" id="jira_project_hot">');
		}
	  });
		
      function show_callback_responsed_issue(response){ // показываем принятые данные заявки на обратный звонок
        
        if( response ) {
            jQuery(document).ready( function($) {
                $( '#pop_up_thank .your_issue .issue_id span' ).text(response);
                if (response.new !== undefined) {
                    $pop_up = $( '#pop_up_thank' );
                    $pop_up.find( '.your_issue .issue_id span' ).text(response.new);
                    
                    if (!response.current || response.current === undefined ) {
                        $pop_up.find( '.issue_numbers' ).addClass( 'have_not_current_issue' );
                        $pop_up.find( '.current_issue' ).addClass( 'hidden' );
                    } else {
                        $pop_up.find( '.number_in_queue .number' ).text( (response.count + 1) );
                        $pop_up.find( '.current_issue .issue_id span' ).text(response.current);
                    }
                    $pop_up.find( '.number_in_queue' ).removeClass( 'hidden' );

                    $pop_up.find('.issue_numbers').removeClass( 'hidden' );
                }
            });
        } else {
            console.log("Error: Bad data " + response);
        }
      }
      var recaptcha_token;
      
      function getRecaptcha() {
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeqYt4UAAAAAAvOa5Qtd50tcfOWppt_jSJmsxvh', {action: 'homepage'}).then(function(token) {
                recaptcha_token = token; 
            });
        });
      }
		
		$(':input').on('click', function (e) {
			$(this).removeClass('error_input');
		});
		
		$(':input').on('focus', function (e) {
			$(this).removeClass('error_input');
		});
		
		var reg_number = new RegExp('^[0-9]+$'); //проверка Только цифры без пробелов
		var reg_string = new RegExp('^[А-яа-яЁё ]+$'); //проверка Только киррилица и пробелы
		var reg_mail = new RegExp('^[0-9a-zA-Z-\._-]+\@[0-9a-z-]{2,}\.[a-z]{2,}$'); //проверка mail
		
	  $( "#get_call_back" ).click(function(event){
		event.preventDefault();
		
		$('#callBackForm').each(function(){
            var all_inputs = $(this).find(':input');
            
            var error = false;
            let phone = all_inputs[0].value;
            phone = phone.replace(/(-)/g, '');
            phone = phone.replace(/(_)/g, '');

            if ((all_inputs[0].value == '') || phone.length != 11) {
                $(all_inputs[0]).addClass('error_input');
                error = true;
            }
            
            if ((all_inputs[1].value == '') || !reg_string.test(all_inputs[1].value)) {
            $(all_inputs[1]).addClass('error_input');
                error = true;
            }
            
            if (all_inputs[2].value == '') {
            $(all_inputs[2]).addClass('error_input');
                error = true;
            }

            if (error) {
                return false;
            }
			
			jQuery(document).ready(function($) {
                
                $("#get_call_back").after("<div class=\"please_wait\">Идет отправка заявки...</div>")
                $("#get_call_back").addClass("hidden");

                grecaptcha.ready(function () {
                    var site_key = $('#callBackForm [name=recaptcha-site-key]' ).val();
                    
                    grecaptcha.execute( site_key, {
                        action: 'sendform' 
                    }).then(function(token) {

                        var data = {
                            action: 'callBack',
                            phone : all_inputs[0].value,
                            name : all_inputs[1].value,
                            inn : all_inputs[2].value,
                            type_request : all_inputs[3].value,
                            project : 'HOTLINE',
                            executor :  all_inputs[5].value,
                            token : token
                        };

                        jQuery.post( ajax_path, data, function(response) {
                            if (response != 'error') {
                                if (response.error !== undefined) {
                                    $( '#pop_up_thank h2' ).text("Произошла ошибка!");
                                    $( '#pop_up_thank .will_contact' ).text(response.error);
                                } else {
                                    show_callback_responsed_issue(response);
                                }
                                    $( '#pop_up_thank' ).toggle();
                                    $( "#pop_up_block" ).toggle();
                                    $("#get_call_back ~ .please_wait").remove();
                                    $("#get_call_back").removeClass("hidden");
                            } else {
                                return false;
                            }
                        }, 'json');
                    });
                });
            });
        });
	}); 
            

	
    $( "#send_feedback" ).click(function(event){
    event.preventDefault();
        $('.feedback').each(function(){
            var all_inputs = $(this).find(':input');

            var error = false;
            
            if ((all_inputs[0].value == '') || !reg_string.test(all_inputs[0].value)) {
                $(all_inputs[0]).addClass('error_input');
                error = true;
            }
            
            if ((all_inputs[1].value == '') || !reg_mail.test(all_inputs[1].value)) {
            $(all_inputs[1]).addClass('error_input');
                error = true;
            }
            
            if (all_inputs[2].value == '') {
            $(all_inputs[2]).addClass('error_input');
                error = true;
            }

            if (error) {
                return false;
            }
            
            jQuery(document).ready(function($) {
                grecaptcha.execute( site_key, {
                    action: 'sendform' 
                }).then(function(token) {

                    var data = {
                        action: 'feedBack',
                        name : all_inputs[0].value,
                        mail : all_inputs[1].value,
                        message : all_inputs[2].value,
                        project : 'HOTLINE',
                        token : token
                    };

                    console.log("Token = " + data.token);

                    jQuery.post( ajax_path, data, function(response) {
                        
                        if (response != 'error') {
                            if (response.error !== undefined) {
                                $( '#pop_up_thank h2' ).text("Произошла ошибка!");
                                $( '#pop_up_thank .will_contact' ).text(response.error);
                            } else {
                                show_callback_responsed_issue(response);
                            }
                            $( '#pop_up_thank' ).toggle();
                            $("#get_call_back ~ .please_wait").remove();
                            $("#get_call_back").removeClass("hidden");
                        }
                        else {
                            return false;
                        }
                    }, 'json');
                });
            });
        });
	}); 
	
	$( "#get_buy" ).click(function(event){ 
		event.preventDefault();
		$('#buyForm').each(function(){
		var all_inputs = $(this).find(':input');

		var error = false;
		
		let phone = all_inputs[0].value;
		phone = phone.replace(/(-)/g, '');
		phone = phone.replace(/(_)/g, '');

        if ((all_inputs[0].value == '') || phone.length != 11) {
			$(all_inputs[0]).addClass('error_input');
            error = true;
        }
		
        if ((all_inputs[1].value == '') || !reg_string.test(all_inputs[1].value)) {
		$(all_inputs[1]).addClass('error_input');
		    error = true;
        }
		
        if (error) {
            return false;
        }
			
			jQuery(document).ready(function($) {
            var data = {
                action: 'programmBuy',
                phone : all_inputs[0].value,
                name : all_inputs[1].value,
                coast : all_inputs[2].value,
                title : all_inputs[3].value,
            };

            jQuery.post( ajax_path, data, function(response) {
                if (response != 'error') {
                    
                    $( "#pop_up_thank" ).toggle();
                    $( "#buy_pop_up_block" ).toggle();
				}
                else {
                    return false;
                }
            });
		});

		});
	});

    $( "#subscribe" ).click(function(event){
        event.preventDefault();
        $('#subscribe_form').each(function(){
            var all_inputs = $(this).find(':input');

            var error = false;

            if ((all_inputs[0].value == '') || !reg_mail.test(all_inputs[0].value)) {
                $(all_inputs[0]).addClass('error_input');
                error = true;
            }

            if (error) {
                return false;
            }

            jQuery(document).ready(function($) {
                var data = {
                    action: 'subscribe',
                    mail : all_inputs[0].value,
                };

                jQuery.post( ajax_path, data, function(response) {
                    if (response != 'error') {
                        $( "#pop_up_thank" ).toggle();
                    }
                    else {
                        return false;
                    }
                });
            });

        });
    });

    $( "#subscribe_form2" ).click(function(event){
        event.preventDefault();
        $('#subscribe_form2').each(function(){
            var all_inputs = $(this).find(':input');

            var error = false;
            //|| !reg_mail.test(all_inputs[0].value)
            if (all_inputs[0].value == '' ) {
                $('.call_form').addClass('error_input');
                error = true;
            }

            if (error) {
                return false;
            }

            jQuery(document).ready(function($) {
                var data = {
                    action: 'subscribe',
                    mail : all_inputs[0].value,
                };

                jQuery.post( ajax_path, data, function(response) {
                    if (response != 'error') {
                        $( "#pop_up_thank" ).toggle();
                    }
                    else {
                        return false;
                    }
                });
            });

        });
    });

    window.onload = function() {
        $("[data-mask]").inputmask();
        // $("#phone_search").keyup(function () {
            // const phone_length = $(this).val().replace(/[^0-9]/gi, '').length;
            // if (phone_length == 15) {
                // $('#phone_search').removeClass('error_input');
            // } else {
                // $('#phone_search').addClass('error_input');
            // }
        // });
    }

});




// HTML5 Fallbacks for older browsers
jQuery(function($) {
    // check placeholder browser support
    if (!Modernizr.input.placeholder) {
        // set placeholder values
        $(this).find('[placeholder]').each(function() {
            $(this).val( $(this).attr('placeholder') );
        });

        // focus and blur of placeholders
        $('[placeholder]').focus(function() {
            if ($(this).val() == $(this).attr('placeholder')) {
                $(this).val('');
                $(this).removeClass('placeholder');
            }
        }).blur(function() {
                if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder')) {
                    $(this).val($(this).attr('placeholder'));
                    $(this).addClass('placeholder');
                }
            });

        // remove placeholders on submit
        $('[placeholder]').closest('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                if ($(this).val() == $(this).attr('placeholder')) {
                    $(this).val('');
                }
            });
        });
    }
});

