<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}" referrerpolicy="origin">
    </script>

    <script>
        tinymce.init({
        selector: '#mytextarea',
        plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            // without images_upload_url set, Upload tab won't show up
            images_upload_url: 'upload.php',

            // override default upload handler to simulate successful upload
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'upload.php');
                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
      });

    </script>

</head>

<body>
    <div class="container">
        <h1>TinyMCE Quick Start Guide</h1>
        <form method="post" action="{{url('/post-store')}}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title" value="{{old('title')}}">
            <br>
            <input type="file" name="image">
            <br>
            <input type="number" name="user_id" placeholder="User" value="{{old('user_id')}}">
            <br>
            <input type="number" name="post_category_id" placeholder="Cate" value="{{old('post_category_id')}}">
            <br>
            <textarea id="mytextarea" style='min-height:600px' name="content">Hello, World!</textarea>
            <br>
            <button type="submit" class="btn btn-succes">Submit</button>
        </form>
    </div>

</body>

</html>
