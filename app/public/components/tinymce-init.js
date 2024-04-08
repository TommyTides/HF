tinymce.init({
    selector: 'textarea#tiny',
    skin: 'snow',
    icons: 'thin',
    content_css: [
        '/css/bootstrap.min.css',
        '/css/styles.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        '/css/jazzstyle.css',
    ],
    extended_valid_elements: "i[*],em[*],img[*]",
    min_height: 1000,
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl | code',
    plugins: 'code preview',
});