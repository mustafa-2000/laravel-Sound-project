<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Media</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .grid {
            display: grid;
            gap: 20px;
        }

        .grid-cols-1 {
            grid-template-columns: 1fr;
        }

        .grid-cols-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, 1fr);
        }

        .media-card {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .media-card h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .media-card p {
            margin: 5px 0;
        }

        @media (max-width: 768px) {
            .grid-cols-2, .grid-cols-3 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Available Media</h1>

        <h2>Music</h2>
        @if ($music->isEmpty())
            <p>No music available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($music as $song)
                    <div class="media-card">
                        <h3>{{ $song->title }}</h3>
                        <p>Artist: {{ $song->artist }}</p>
                        <p>Album: {{ $song->album }}</p>
                        <p>Year: {{ $song->year }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        <h2>Videos</h2>
        @if ($videos->isEmpty())
            <p>No videos available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($videos as $video)
                    <div class="media-card">
                        <h3>{{ $video->title }}</h3>
                        <p>Director: {{ $video->director }}</p>
                        <p>Year: {{ $video->year }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
