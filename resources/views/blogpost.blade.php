<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
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
            <textarea id="summernote" style='min-height:600px' name="content">Hello, World!</textarea>
            <br>
            <button type="submit" class="btn btn-succes">Submit</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({minHeight: 300});
        });
    </script>
</body>

</html>
