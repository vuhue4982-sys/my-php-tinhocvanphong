tinymce.init({
    selector:'textarea#default',
    width:1000,
    height:300,
    plugins:[
        'advlist','autolink','link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak', 
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | '+
    'bullist numlist outdent indent | link image | print preview media fullscreen | '+
    'forecolor backcolor emoticons',
    menu: {
        favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit new insert format tools table',
    content_style: 'body { font-family:helvetica,Arial,sans-serif; font-size:16px'
});