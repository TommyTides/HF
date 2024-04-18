
function exportData(){

    var checkboxes = $("input[type='checkbox']");
    var columns = [];

    checkboxes.each(function() {
        if ($(this).is(":checked")) {
            columns.push($(this).attr("name") + "." + $(this).attr("id"));
        }
    });

    var columnsString = columns.join(",");
    console.log(columnsString);

    var link = "../../../order/exportOrderToCSV?columns=" + columnsString;
    
    window.location.href = link;
}   
