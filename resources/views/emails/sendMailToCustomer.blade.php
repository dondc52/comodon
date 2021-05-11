<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
</head>
<body>
    <h1>{{$details['subject']}}</h1>
    <h2>Title: {{$details['title']}}</h2>
    <p>Description: {{$details['description']}}</p>
    {!! $details['content'] !!}
    <a href="{{$details['link']}}">link post</a>
</body>
</html>