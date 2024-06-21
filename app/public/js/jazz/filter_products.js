$(document).ready(function () {
    document.getElementById('keywords').onkeyup = function () {
        searchFilter()
    };
    document.getElementById('datepicker-input').onchange = function () {
        searchFilter()
    };


    // Handles search and filter operations, display the filtered result.
    function searchFilter(page_num) {
        page_num = page_num ? page_num : 0;
        const keywords = $('#keywords').val();
        const date = $('#datepicker-input').val();
        var minPrice = document.getElementsByClassName('noUi-handle noUi-handle-lower')[0].getAttribute('aria-valuenow');
        var maxPrice = document.getElementsByClassName('noUi-handle noUi-handle-upper')[0].getAttribute('aria-valuenow');

        $.ajax({
            type: 'POST',
            url: '/jazz/getproducts',
            data: 'page=' + page_num + '&keywords=' + keywords + '&date=' + date + '&minPrice=' + minPrice + '&maxPrice=' + maxPrice,
            success: function (html) {
                $('#datacontainer').html(html);
            }
        });
    }
});