<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/video.js/dist/video-js.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <title>Laravel Encrypted Video</title>
</head>
<body>
    <video-js
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    data-setup='{"fluid":true}'>
    <source src="{{ asset('encrypts/video.m3u8') }}" type="application/x-mpegURL" />
  </video-js>
</body>
<script src="https://unpkg.com/video.js/dist/video.js"></script>
<script src="https://unpkg.com/@videojs/http-streaming/dist/videojs-http-streaming.js"></script>
<script>
    var player = videojs("my-video")
</script>
</html>