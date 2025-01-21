<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Media</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #3490dc;
            text-align: center; /* Centering the main heading */
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            border-bottom: 2px solid #3490dc;
            padding-bottom: 5px;
            color: #2c3e50;
            text-align: center; /* Centering all secondary headings */
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
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .media-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .media-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .media-card p {
            margin: 5px 0;
            line-height: 1.5;
        }

        .review-section {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
        }

        .review-form {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
        }

        .review-form label {
            margin: 5px 0;
            font-weight: bold;
        }

        .review-form textarea {
            width: 100%;
            resize: vertical;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .review-form button {
            padding: 10px;
            background-color: #3490dc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .review-form button:hover {
            background-color: #227dc4;
        }

        .current-user-review {
            margin-top: 15px;
            padding: 10px;
            background-color: #e9f5ff;
            border-left: 5px solid #3490dc;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #3490dc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .back-button:hover {
            background-color: #227dc4;
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
        
        <!-- Back to User Index Button -->
        <a href="{{ route('dashboard') }}" class="back-button">Back to User Index</a>

        <!-- Music Section -->
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

                        <!-- Display Reviews for Music -->
                        <div class="review-section">
                            <h4>Reviews</h4>
                            @if($song->musicReviews && $song->musicReviews->isNotEmpty())
                                @foreach ($song->musicReviews as $review)
                                    <p><strong>{{ $review->user->name }}</strong> ({{ $review->rating }}/5): {{ $review->review }}</p>
                                @endforeach
                            @else
                                <p>No reviews available.</p>
                            @endif
                        </div>

                        <!-- Display Current User's Review -->
                        @php
                            $currentUserReview = $song->musicReviews->firstWhere('user_id', $currentUserId);
                        @endphp

                        @if ($currentUserReview)
                            <div class="current-user-review">
                                <h4>Your Review</h4>
                                <p>Rating: {{ $currentUserReview->rating }}/5</p>
                                <p>Review: {{ $currentUserReview->review }}</p>
                            </div>
                        @else
                            <!-- Review Form for Music -->
                            <form action="{{ route('music.review', $song->id) }}" method="POST" class="review-form">
                                @csrf
                                <label for="rating">Rating:</label>
                                <select name="rating" id="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>

                                <label for="review">Review:</label>
                                <textarea name="review" id="review" rows="2"></textarea>

                                <button type="submit">Submit Review</button>
                            </form>
                        @endif
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

                        <!-- Display Reviews for Videos -->
                        <div class="review-section">
                            <h4>Reviews</h4>
                            @if($video->videoReviews && $video->videoReviews->isNotEmpty())
                                @foreach ($video->videoReviews as $review)
                                    <p><strong>{{ $review->user->name }}</strong> ({{ $review->rating }}/5): {{ $review->review }}</p>
                                @endforeach
                            @else
                                <p>No reviews available.</p>
                            @endif
                        </div>

                        <!-- Display Current User's Review -->
                        @php
                            $currentUserVideoReview = $video->videoReviews->firstWhere('user_id', $currentUserId);
                        @endphp

                        @if ($currentUserVideoReview)
                            <div class="current-user-review">
                                <h4>Your Review</h4>
                                <p>Rating: {{ $currentUserVideoReview->rating }}/5</p>
                                <p>Review: {{ $currentUserVideoReview->review }}</p>
                            </div>
                        @else
                            <!-- Review Form for Videos -->
                            <form action="{{ route('video.review', $video->id) }}" method="POST" class="review-form">
                                @csrf
                                <label for="rating">Rating:</label>
                                <select name="rating" id="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>

                                <label for="review">Review:</label>
                                <textarea name="review" id="review" rows="2"></textarea>

                                <button type="submit">Submit Review</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
