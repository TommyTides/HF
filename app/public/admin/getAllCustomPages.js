//get all pages using ajax on load

document.addEventListener("DOMContentLoaded", function(event) {
    $.ajax({
        type: 'GET',
        url: "/admin/getAllPagesWhereNameIsNotNull",
        contentType: "application/json",
        success: function (response) {
            response = JSON.parse(response);
            var html = '';
            for (var i = 0; i < response.length; i += 2) {
                var item = response[i];
                var id = response[i + 1];
                
                if (typeof item === 'string') {
                    html += '<li><a href="/home/page?id=' + id + '" target="" class="dropdown-item">' + item + '</a></li>';
                } else if (typeof item === 'number') {
                    html += '<li><a href="/home/page?id=' + item + '" target="" class="dropdown-item">' + id + '</a></li>';
                }
            }
            $('#more-menu').html(html);
        }
    });
});