				$(document).ready(function() {
					$('.list-main__title').click(function(event) {
						$(this).toggleClass('active')
					});
				
					$('.slider').slick({
						arrows: false,
						dots:true,
						appendDots: $('.slider-nav'),
						infinite: false, //небесконечный слайдер
						draggable: false, //no-swipe
						waitForAnimate:false
						}

					);
					$('.products-slider').slick({
						infinite: false, //небесконечный слайдер
						draggable: false, //no-swipe
						slidesToShow: 4,
						//autoplay: true,
						//centerMode: true,
  						variableWidth: true
						
						}

					);
					$("button[aria-controls=slick-slide00]").text("О магазине");
					$("button[aria-controls=slick-slide01]").text("Оплата");
					$("button[aria-controls=slick-slide02]").text("Доставка");
					$("button[aria-controls=slick-slide03]").text("Поддержка");
					$("button[aria-controls=slick-slide04]").text("Новости");
					$("button[aria-controls=slick-slide05]").text("Контакты");

					$('.slick-dots li button').click(function(event) {
						event.preventDefault();
						$(".slick-dots li button").css({
							'color':'inherit',
							'background':'inherit'
						});
						$(this).css({
							'color':'white',
							'background':'red'
						});
					
					});

						
					//$('.slider-nav').clone().appendTo(".footer-nav");
						            
				});
		