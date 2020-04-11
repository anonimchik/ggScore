$(function () {

    /**
     * Асинхронная пагинация турниров на шлавной странице
     */
    $(".tournaments_pagination_link").click(function (e) { 
        e.preventDefault();
        $page = $(this).data("page");
        $limit = $(this).parent().parent().data('limit');
        $(".tournaments_pagination_list").data("activepage", $page+1);
        console.log($(".tournaments_pagination_list").data("activepage"));
        $(".tournaments_pagination_list").data("activepage")==true ? $("li.previos").hide() : $("li.previos").show();
        $(".tournaments_pagination_link").removeClass("__active");
        $(this).toggleClass("__active");
        $.ajax({
            type: "GET",
            url: "/ajax/pagination",
            data: {"offset" : $page * $limit, 'limit' : $limit},
            success: function (response) {
                $(".tournament").remove();
                $(".tournaments_title").after(response);
            }
        });
    });

    /**
     *  Пагинация
     */
    $(".entrance-registration_link, .entrance-registration_link__active").click(function (e) { 
        e.preventDefault();
        $(".entrance-registration_item a").removeClass("entrance-registration_link__active");
        $(".entrance-registration_item a").addClass("entrance-registration_link");
        $(this).removeClass("entrance-registration_link");
        $(this).addClass("entrance-registration_link__active");
        $(this).text() == 'Авторизация' ? $('title').text('Авторизация пользователя') : $('title').text('Регистрация пользователя')
        if($(this).text() == 'Регистрация'){
            $(".remember-password").hide();
            $(".require-field").css("opacity", 1);
            $("form label").hide();
            $("#email").val("");
            $("#password").val("");
            $("form").attr("name", "registr");
        }else{
            $(".remember-password").show();
            $(".require-field").css("opacity", 0);
            $("form label").show();
            $("#email").val("");
            $("#password").val("");
            $("form").attr("name", "auth");
        }
    });

    /**
     * Регистрация / авторизация
     */
    $("form label").click(function (e) { 
        e.preventDefault();
        $(this).children("i").toggleClass("far fa-square");
        $(this).children("i").toggleClass("far fa-check-square");
        $(".far.fa-check-square").css('color', '#19b086');
        $(".far.fa-square").css('color', 'white');
        console.log($("label input[type=checkbox]").is(':checked'));
        $("label input[type=checkbox]").is(':checked') ? $("label input[type=checkbox]").prop('checked', false) : $("label input[type=checkbox]").prop('checked', true);
    });

    /**
     * 
     */
    $('form input[type=submit]').click(function (e) {
        e.preventDefault();
        console.log($(this).parent().attr('name') == 'auth');
        if($(this).parent().attr('name') == 'auth')
        {
            $('label i').hasClass('far fa-check-square') ? $token = $('input[name=_token]').val() : $token = '';
            $.ajax({
                type: "POST",
                url: "/ajax/auth",
                headers: {
                    'X-CSRF-TOKEN':  $('#_token').val()
                },  
                data: {'email' : $('input[type=email]').val(),
                    'password': $('input[type=password]').val(),
                },
                success: function (response) {
                    console.log(response);
                }
            });     
        }else{
            $.ajax({
                type: "POST",
                url: "/ajax/registr",
                headers: {
                    'X-CSRF-TOKEN': $('#_token').val()
                },  
                data: $(this).parent().serialize(),
                success: function (response) {
                    console.log(response);
                }
            });
        }
    });
});