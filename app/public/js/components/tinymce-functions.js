let buttonPressed = null;

$(document).ready(function() {
   $("#editor-form").submit(function(e) {
       let content = tinymce.get("tiny").getContent();

       $("#data-container").html(content);

       return false; // Prevents page reload
   });
});

/**
 * Method loads and retrieves a page's HTML code and displays it within the editor
 */
function loadPage($page, $param, $button) {
    buttonPressed = $button
    $.ajax({
        url: $page,
        success: function (html) {
            // Testing purposes for displaying
            if ($param !== null) {
                let data = $($.parseHTML(html)).filter($param);
                tinymce.get("tiny").setContent(data[0].innerHTML);
            } else {
                tinymce.get("tiny").setContent(html);
            }
        }
    });
}

/**
 * Method loads and retrieves a page's HTML code and displays it within the editor
 */
function loadCustomPage($page, $param, $id, $button) {
    buttonPressed = $button
    $page += '?id='+$id;
    $.ajax({
        url: $page,
        success: function (html) {
            // Testing purposes for displaying
            let data = $($.parseHTML(html)).filter($param);
            tinymce.get("tiny").setContent(data[0].innerHTML);
        }
    });
}

function savePage() {
    // Get values from last button pressed
    const path = buttonPressed.value;
    const container = buttonPressed.getAttribute('data-value2');
    const html = tinymce.get("tiny").getContent();
    const id = buttonPressed.getAttribute('data-value3');

    $.ajax({
        url: "/admin/tinymceUpdate",
        type: "POST",
        data:
        {
            path: path,
            container: container,
            html: html,
            id: id
        },
        success: function (result) {
            // Testing purposes for displaying
            if (result) {
                console.log("Success: " + result);
            } else {
                console.log("Error: " + result);
            }
        }
    });
}

function deletePage($id) {
    // Get values from last button pressed
    const id = $id;

    $.ajax({
        url: "/admin/deleteCustomPage",
        type: "POST",
        data:
        {
            id: id
        },
        success: function (result) {
            // Testing purposes for displaying
            if (result) {
                console.log("Success: " + result);
                //reload page
                location.reload();
            } else {
                console.log("Error: " + result);
            }
        }
    });
}