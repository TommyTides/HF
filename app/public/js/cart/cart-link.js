createLink = function () {
    $.ajax({
        url: '/cart/createlink',
        success: function(reply) {
            link = JSON.parse(reply);
            navigator.clipboard.writeText(link);
        },
        error: function(req, status, error) {
            console.log( 'Something went wrong: ', status, error, req );
        }
    });
}