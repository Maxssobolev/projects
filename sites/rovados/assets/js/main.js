/* Липкое меню 
window.onscroll = function () { myFunction() };

const navbar = document.getElementById("navbar");
let sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
}
---------*/

/* Подчеркивание активной ссылки */
$(".menu-list__item").click(function () {
    $(".menu-list__item").each(function () {
        $(this).removeClass("menu_active")
    })
    $(this).addClass("menu_active")

})
/*-----------------*/




/* Показываем расширенное меню */
const extMenu = $(".external-menu > .info");
const extMenuBtn = $(".external-menu > .open");
const extMenuBtn2 = $(".external-menu > .open img"); //Чтоб не заморачиваться с потомками 

//Обрабатываем показ номеров
const appartBtn = $("[appartments]");
const appartMenu = $(".external-menu > .info-about-apparts")

appartBtn.on('click', function () {
    if (extMenuBtn.hasClass('open-opened')) {
        extMenuBtn.removeClass('open-opened');
        appartMenu.slideUp(function () {
            appartMenu.css({ display: 'none' })
        });
        extMenu.slideUp(function () {
            extMenu.css({ display: 'none' })
        });

    } else {

        extMenuBtn.addClass('open-opened');
        appartMenu.slideDown();
        appartMenu.css({ display: 'flex' })

    }
});

extMenuBtn.on('click', function () {
    if ($(this).hasClass('open-opened')) {
        $(this).removeClass('open-opened');
        extMenu.slideUp(function () {
            extMenu.css({ display: 'none' })
        });
        appartMenu.slideUp(function () {
            appartMenu.css({ display: 'none' })
        });

    } else {
        $(this).addClass('open-opened');
        extMenu.slideDown();
        extMenu.css({ display: 'flex' })

    }
});



/*------------------*/


/*Мобильное меню*/

const burgerBtn = $(".mobile-burger-menu");
const extMenuBurger = $(".external-menu > .mobile-menu");
const appartMobileBtn = $("[appartments-mobile]");

burgerBtn.click(function () {
    if ($(this).hasClass('open-opened-mobile')) {
        $(this).removeClass('open-opened-mobile');
        extMenuBurger.slideUp(function () {
            extMenuBurger.css({ display: 'none' })
        });

        if (appartMobileBtn.hasClass('open-opened-mobile-apparts')) {
            appartMobileBtn.removeClass('open-opened-mobile-apparts');
            appartMenu.slideUp(function () {
                appartMenu.css({ display: 'none' })
            });

        }
        $("body").css({ overflow: 'auto' })

    } else {
        $(this).addClass('open-opened-mobile');
        extMenuBurger.slideDown();
        extMenuBurger.css({ display: 'flex' })
        $("body").css({ overflow: 'hidden' })


    }
})


//"номера" в мобильной версии

appartMobileBtn.click(function () {
    if ($(this).hasClass('open-opened-mobile-apparts')) {
        $(this).removeClass('open-opened-mobile-apparts');
        appartMenu.slideUp(function () {
            appartMenu.css({ display: 'none' })
        });


    } else {
        $(this).addClass('open-opened-mobile-apparts');
        appartMenu.slideDown();
        appartMenu.css({ display: 'flex' })


    }
})



//Закрытие меню по клику вне элемента
$(document).click(function (e) {
    if (!appartMobileBtn.is(e.target) && !appartBtn.is(e.target) && !extMenuBtn.is(e.target) && !extMenuBtn2.is(e.target) && !extMenu.is(e.target) && extMenu.has(e.target).length === 0) {
        extMenu.slideUp();
        appartMenu.slideUp(function () {
            appartMenu.css({ display: 'none' })
        });
        extMenuBtn.removeClass('open-opened');

    };
});

/*--------------*/

//Кнопка оставить отзыв
const makeReviewBtn = $("#makeReview_btn")
const hiddenForm = $(".hidden-form")

makeReviewBtn.click(function () {
    if ($(this).hasClass('open-opened-makereview')) {
        $(this).removeClass('open-opened-makereview');
        hiddenForm.slideUp(function () {
            hiddenForm.css({ display: 'none' })
        });
        $(this).text('ОСТАВИТЬ ОТЗЫВ')

    } else {
        $(this).addClass('open-opened-makereview');
        $(this).text('✖')
        hiddenForm.slideDown();
    }
})

//Закрытие меню по клику вне элемента (ОТЗЫВЫ)
$(document).click(function (e) {
    if (!makeReviewBtn.is(e.target) && !hiddenForm.is(e.target) && hiddenForm.has(e.target).length === 0) {

        hiddenForm.slideUp();
        $(this).text('ОСТАВИТЬ ОТЗЫВ')
        makeReviewBtn.removeClass('open-opened-makereview');

    };
});




/*Модальное окно "заказать"*/
const modalOpen = $('.menu-button');
const modalOpenMobile = $(".menu-button-mobile");

const dateRanger = () => {
    if (!$("#date-range0").val()) {
        $("#date-range0").next().css({
            top: '15px',
            fontSize: '1.2rem',
            color: '#5F5F5F',
        })
    }

    $.dateRangePickerLanguages['russian'] =
    {
        'selected': 'Выбрано:',
        'days': 'дней',
        'apply': 'Готово',
        'week-1': 'Пн',
        'week-2': 'Вт',
        'week-3': 'Ср',
        'week-4': 'Чт',
        'week-5': 'Пт',
        'week-6': 'Сб',
        'week-7': 'Вс',
        'month-name': ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        'shortcuts': 'Shortcuts',
        'past': 'Past',
        '7days': '7days',
        '14days': '14days',
        '30days': '30days',
        'previous': 'Previous',
        'prev-week': 'Неделя',
        'prev-month': 'Месяц',
        'prev-quarter': 'Quarter',
        'prev-year': 'Год',
        'less-than': 'Date range should longer than %d days',
        'more-than': 'Date range should less than %d days',
        'default-more': 'Please select a date range longer than %d days',
        'default-less': 'Please select a date range less than %d days',
        'default-range': 'Please select a date range between %d and %d days',
        'default-default': 'Пожалуйста, выберите предполагаемую дату поездки'
    };

    $('#date-range0').dateRangePicker(
        {
            language: 'russian',
            startOfWeek: 'monday',
            separator: ' до ',
            format: 'DD.MM.YYYY',
            autoClose: true,

        }).on('datepicker-close', function () {
            if (!$(this).val()) {
                $(this).next().css({
                    top: '15px',
                    fontSize: '1.2rem',
                    color: '#5F5F5F',
                })
            } else {
                $(this).next().css({
                    top: '-15px',
                    fontSize: '.92rem',
                    color: '#5264AE',
                })
            }
        });
}

$(document).ready(function ($) {
    modalOpen.click(function () {
        dateRanger();

        $('.popup-fade').fadeIn(0);
        if ($(this).find('button').attr('data')) {
            //Если мы на странице с номером, то сразу заносим его название в заявку
            const apart_cat = $(this).find('button').attr('data');
            $('[name="appart_category"]').val(apart_cat).next().css({
                top: '-15px',
                fontSize: '.92rem',
                color: '#5264AE',
            })
        }
        return false;
    });
    modalOpenMobile.click(function () {
        dateRanger();
        $("body").css({ overflow: 'hidden' })
        $('.popup-fade').fadeIn(0);
        return false;
    });
    // Клик по ссылке "Закрыть".
    $('.popup-close').click(function () {
        $(this).parents('.popup-fade').fadeOut(0);
        $("body").css({ overflow: 'auto' })
        return false;
    });

    // Закрытие по клавише Esc.
    $(document).keydown(function (e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $("body").css({ overflow: 'auto' })
            $('.popup-fade').fadeOut();
        }
    });

    // Клик по фону, но не по окну.
    $('.popup-fade').click(function (e) {
        if ($(e.target).closest('.popup').length == 0) {
            $("body").css({ overflow: 'auto' })
            $(this).fadeOut();
        }
    });




    //WOW.js анимация при прокрутке

    if ($(window).width() > 768) {
        new WOW().init();
    }
});

//Анимация инпутов в модальном окне

$(".group > input").focus(function () {
    $(this).next().css({
        top: '-15px',
        fontSize: '.92rem',
        color: '#5264AE',
    })
})

$(".group > input").focusout(function () {
    if (!$(this).val()) {
        $(this).next().css({
            top: '15px',
            fontSize: '1.2rem',
            color: '#5F5F5F',
        })
    }
})


//Обработка формы заявки
function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

var formTicket = $(".popup-fade .form > form");


$(".popup-fade .form > form").submit(function (e) {
    e.preventDefault();
    const send_data = getFormData(formTicket);
    /*
    data = {
        adults_amount: ""
        appart_category: ""
        children_age: ""
        children_amount: ""
        comment: ""
        daterange: ""
        email: ""
        fio: ""
        tel: ""
        transfer: ""
    }
    */

    $.ajax({
        url: '/',
        type: 'POST',
        data: JSON.stringify(send_data),
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        success: function (msg) {
            $('.popup-close').trigger('click');
            formTicket[0].reset();
            Swal.fire({
                title: 'Прекрасно!',
                text: 'Ваша заявка отправлена',
                icon: 'success',
                confirmButtonText: 'Хорошо'
            })
        },
        error: function (xhr, status, error) {
            Swal.fire({
                title: 'Что-то пошло не так...',
                text: 'Ваша заявка не была отправлена, пожалуйста, проверьте введенные данные',
                icon: 'error',
                confirmButtonText: 'Хорошо'
            })
        }
    });


})

//Открыть-закрыть гармошку на странице с категориями
$(".appart > .title").click(function () {
    $(this).next().slideToggle();


    //Поменять стрелочку
    const srcDown = $(this).find('.flag img').attr("src");
    const srcUp = $(this).find('.flag img').attr("src-open");

    if ($(this).find('.flag img').attr('src').includes('down')) {
        $(this).find('.flag img').attr('src-open', srcDown)
        $(this).find('.flag img').attr('src', srcUp)
    } else {
        $(this).find('.flag img').attr('src-open', srcDown)
        $(this).find('.flag img').attr('src', srcUp)
    }
})

/*
$(".overlay").mousemove(function (event) {

    $(".overlay > .text-inner").css({ transform: `translateX(${event.clientX / 200}px)` })
})

*/



//Планый скролл к якорям
$(document).ready(function () {
    $("a.scrollto").click(function () {
        var elementClick = $(this).attr("href").replace(/\/$/, '')
        console.log(elementClick)
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated),body:not(:animated)").animate({
            scrollTop: destination - 120
        }, 800);
        extMenu.slideUp(function () {
            extMenu.css({ display: 'none' })
        });

        return false;
    });
});