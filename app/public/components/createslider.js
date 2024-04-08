// Default slider
var slider = document.getElementById('slider');

if (slider !== null) {
    noUiSlider.create(slider, {
        start: [20, 80],
        connect: true,
        range: {
            'min': 0,
            'max': 100
        }
    });
}

// Slider with tooltips (Allows multiple inputs such as min/max/current)
var tooltipSlider = document.getElementById('slider-tooltips');


if (tooltipSlider !== null) {
    $.ajax({
        url: '/jazz/getMaxPrice',
        success: function(reply) {
            max = Math.ceil(reply);
            createSlider(0, max);
        },
        error: function (req, status, error) {
            console.log('Something went wrong: ', status, error, req);
            createSlider(0, 100);
        }
    });
}

function createSlider(min, max) {
    noUiSlider.create(tooltipSlider, {
        start: [min, max],
        //tooltips: [
        //    false, // no tooltip
        //    wNumb({decimals: 1}), // tooltip with custom formatting
        //    true // tooltip with default formatting
        //],
        /**
         * Tooltip with default formatting on all handles:
         */
        tooltips: true,
        /**
         *
         * Tooltip with specific formatting on all handles:
         * tooltips: {
         *     to: ...,
         *     from: ...
         * }
         *
         * Tooltip with specific formatting on each handle:
         * tooltips: [
         *     { to: ..., from: ... },
         *     { to: ..., from: ... },
         *     { to: ..., from: ... },
         * ]
         */
        margin: 5,
        step: 5,
        range: {
            'min': min,
            'max': max
        }
    });
    tooltipSlider.noUiSlider.on('update', function () {
        searchFilter();
    });
}

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