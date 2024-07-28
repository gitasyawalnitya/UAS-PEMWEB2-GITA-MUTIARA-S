<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100%;
            height: auto;
        }
        .content {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{!! $data->title !!}</h1>
        <img src="{{ public_path('storage/' . $data->image) }}" alt="Article Image" width="200px" height="200px">
    </div>
    <div class="content">
        {!! $data->body !!}
    </div>
</body>
</html>
