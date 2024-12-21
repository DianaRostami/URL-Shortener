<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body>
<form action="{{ route('url.shorten') }}" method="POST">
    @csrf
    <label for="url">Enter URL:</label>
    <input type="text" name="url" id="url" required>
    <button type="submit">Shorten</button>
</form>

@if (session('shortUrl'))
    <p>Short URL: <a href="{{ session('shortUrl') }}" target="_blank">{{ url(session('shortUrl')) }}</a></p>
@endif
</body>
</html>

