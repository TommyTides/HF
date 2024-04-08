
$(document).ready(function() {
    $('td[contenteditable=true]').on('focusout', function() {
        var currentContent = $(this).text();
        var originalContent = $(this).data('original-content');
        if (currentContent !== originalContent) {
            var rowData = {
                'artist_id':            $(this).closest('tr').find('td:nth-child(1)').text(),
                'artist_name':          $(this).closest('tr').find('td:nth-child(2)').text(),
                'first_name':           $(this).closest('tr').find('td:nth-child(3)').text(),
                'last_name':            $(this).closest('tr').find('td:nth-child(4)').text(),
                'biography':            $(this).closest('tr').find('td:nth-child(5)').text(),
                'member_description':   $(this).closest('tr').find('td:nth-child(6)').text(),
                'event_type':           $(this).closest('tr').find('td:nth-child(7)').text()
            };
            if(this.className == "event-type"){
                if(currentContent > 4 || currentContent < 1){
                    $(this).text(originalContent);
                    return;
                }
            }
            $.ajax({
                type: 'POST',
                url: '/admin/artistsTable',
                data: rowData,
                success: function(response) {
                console.log(response);
                },
                error: function(xhr, status, error) {
                console.log(error);
                }
            });
        }
    }).on('focus', function() {
        $(this).data('original-content', $(this).text());
    });
});
