$(function () {
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
            url: "/ajax",
            data: {"offset" : $page * $limit, 'limit' : $limit},
            success: function (response) {
                $(".tournament").remove();
                $(".tournaments_title").after(response);
            }
        });
    });
});