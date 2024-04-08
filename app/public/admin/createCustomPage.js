
function createCustomPage() {
    var pageName = document.getElementById("pageName").value;

    if (pageName.trim() === '') {
        // Stop further execution
        return;
    }   
    //hide exampleModal
    $('#confirmModal').modal('toggle')
    console.log(pageName);

    const templateHTML = `<header><div class="p-5 text-center bg-image header-image" style="background-image: url('../images/philharmonic_header.png');"><div class="d-flex justify-content-center align-items-center h-100"><div class="text-white"><h1 class="mb-3 fw-bold header-title"><span style="text-decoration: underline;"><span style="color: rgb(255, 255, 255);">NEW PAGE</span></span></h1><h4 class="mb-3 fw-semibold header-subtitle"><span style="font-size: 14pt;">NEW PAGE SUB-HEADING</span></h4><a class="btn btn-outline-light btn-lg rounded-0" role="button" href="#!">BUTTON</a></div></div></div></header><section class="container d-flex mt-4 mb-4 flex-column"><div class="row text-center"><h2 class="fw-bold jazz-intro-title">NEW PAGE</h2></div><div class="row jazz-intro-description justify-content-center"><h5 class="w-75" style="text-align: center;">VERY EXCITING NEW PAGE INFORMATION</h5><p>&nbsp;</p><p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p><p style="text-align: left;">&nbsp;</p><p style="text-align: left;">&nbsp;</p><p style="text-align: center;">&nbsp;</p></div></section>`;

    //send the page details via post to apiController/createPage
    $.ajax({
        type: "POST",
        url: "/admin/createPage",
        data: {
            path: '/home/page',
            container: '#data-container',
            html: templateHTML,
            name: pageName
        },
        success: function (data) {
            console.log(data);
            //reload the page
            location.reload();
        },
        error: function (data) {
            console.log(data);
        }
    });
}