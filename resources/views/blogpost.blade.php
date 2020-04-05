<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
        selector: '#mytextarea',
        plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

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
            <textarea id="mytextarea" name="content">Hello, World!</textarea>
            <br>
            <button type="submit" class="btn btn-succes">Submit</button>
        </form>
    </div>

    <div class="container">
        @if (isset($content))
        {!! $content !!}
        @endif
    </div>

</body>

</html>
