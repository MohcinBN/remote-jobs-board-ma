$(document).ready(function () {
    $(".toggle-class").change(function () {
        var status = $(this).prop("checked") == true ? 1 : 0;
        var job_id = $(this).data("id");

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/job/chnage-status",
            data: { status: status, job_id: job_id },
            success: function (data) {
                console.log(data.success);
            },
        });
    });

    // search slide
    var container = document.querySelector('filter-box');
    var buttonToShowInput = document.querySelector('.search-btn');

    buttonToShowInput.addEventListener('click', () => {
        alert('btn clicked');
    })
});
