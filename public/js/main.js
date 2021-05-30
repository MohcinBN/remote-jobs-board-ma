$(document).ready(function () {
    // $(function () {
    //     var $jobs = $("#jobs");
    //     var $ul = $("ul.pagination");
    //     $ul.hide(); // Prevent the default Laravel paginator from showing, but we need the links...

    //     $(".see-more").click(function () {
    //         $.get($ul.find("a[rel='next']").attr("href"), function (response) {
    //             $jobs.append($(response).find("#jobs").html());
    //         });
    //     });
    // });
    $(".see-more").click(function () {
        $div = $($(this).data("div")); //div to append
        $link = $(this).data("link"); //current URL

        $page = $(this).data("page"); //get the next page #
        $href = $link + $page; //complete URL
        $.get($href, function (response) {
            //append data
            $html = $(response).find("#jobs").html();
            $div.append($html);
        });

        $(this).data("page", parseInt($page) + 1); //update page #
    });
});
