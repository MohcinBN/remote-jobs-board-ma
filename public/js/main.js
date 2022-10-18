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
    let container = document.getElementById('search');
    let buttonToShowInput = document.querySelector('.search-btn');

    buttonToShowInput.addEventListener('click', () => {
        //alert('btn clicked');

        if (!container.classList.contains('active')) {
            container.classList.add('active');
            container.style.width = "100%";
        } else {
            container.classList.remove('active')
            /** Set the height as 0px to trigger the slide up animation. */
            //container.style.width = "auto"
            
            /** Remove the `active` class when the animation ends. */
            container.addEventListener('transitionend', () => {
                container.classList.remove('active')
            }, {once: true})
        }
    })
});
