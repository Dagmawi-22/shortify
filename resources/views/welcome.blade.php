<!DOCTYPE html>
<html>

<head>
    <title>URL Shortener</title>
</head>

<body>
    @if (session('shortened_url'))
        <p>Shortened URL: <a href="{{ session('shortened_url') }}">{{ session('shortened_url') }}</a></p>
    @endif

    <form action="{{ route('shorten') }}" method="POST">
        @csrf
        <input type="url" name="original_url" placeholder="Enter URL" required>
        <button type="submit">Shorten</button>
    </form>
</body>

</html>