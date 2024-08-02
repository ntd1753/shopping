<head>
    <meta charset="utf-8">
    <link href="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/logo.png?1708919610274" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FRUITSHOP</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('backend/dist/css/app.css')}}" />
    <!-- END: CSS Assets-->

    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/ju9oytkgovjt42g1goz4bbx8ah5w7br05qbg396440cuw7ty/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea#content',
            plugins: ' anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            file_picker_callback (callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

                tinymce.activeEditor.windowManager.openUrl({
                    url : '/file-manager/tinymce5',
                    title : 'Laravel File manager',
                    width : x * 0.8,
                    height : y * 0.8,
                    onMessage: (api, message) => {
                        console.log(message)
                        let url = message.content;  // Lấy ra url của file ảnh
                        url = "/storage"+url.replace(/^.*\/\/[^\/]+/, ''); // Xóa domain ảnh
                        console.log(url);
                        message.content = url // Gán lại url cho ảnh
                        callback(message.content, { text: message.text })
                    },

                })}

        });
        tinymce.init({
            selector: 'textarea#Seo',
            height:300,
            toolbar: 'undo redo',
            content_css: false,
            menu: false,
            menubar: false,
        });
    </script>

</head>
