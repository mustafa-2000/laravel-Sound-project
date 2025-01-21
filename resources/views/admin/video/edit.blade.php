<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Edit Video</title>
    <style>
        body {
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%), url('{{ asset('img/admin-background.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif; /* Change font for a modern look */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            overflow: hidden;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95); /* More opaque background */
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15); /* Deeper shadow */
            padding: 40px;
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease; /* Hover effect on container */
        }

        .container:hover {
            transform: translateY(-5px); /* Lift effect on hover */
        }

        h1 {
            color: #2B6CB0; /* Change heading color for contrast */
            font-size: 2.8rem;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 600; /* Bold weight for prominence */
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Increased gap for better spacing */
        }

        input[type="text"], input[type="number"] {
            padding: 15px;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            background-color: #f7fafc;
            outline: none; /* Removes the default outline */
        }

        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #4299E1; /* Border color on focus */
            box-shadow: 0 0 5px rgba(66, 153, 225, 0.5); /* Subtle glow effect */
        }

        button {
            padding: 15px;
            border: none;
            border-radius: 6px;
            background-color: #4299E1;
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 600; /* Bold weight for buttons */
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #2B6CB0; /* Darker shade on hover */
            transform: translateY(-2px); /* Lift effect on hover */
        }

        .back-btn {
            background-color: #F56565; /* Red for the back button */
            margin-top: 20px; /* Space above the back button */
            font-weight: 600;
            padding: 15px;
            border: none;
            border-radius: 6px;
            color: #ffffff;
            font-size: 1.1rem;
            cursor: pointer;
            text-align: center;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-btn:hover {
            background-color: #C53030; /* Darker shade on hover */
            transform: translateY(-2px); /* Lift effect on hover */
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem; /* Responsive heading */
            }

            button {
                padding: 12px; /* Responsive button padding */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Video</h1>
        <form action="{{ route('admin.video.update', $video->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $video->title }}" placeholder="Title" required>
            <input type="text" name="director" value="{{ $video->director }}" placeholder="Director" required>
            <input type="number" name="year" value="{{ $video->year }}" placeholder="Year" required>
            <button type="submit">Update Video</button>
        </form>
        <a href="{{ route('admin.video.index') }}" class="back-btn">Back to Video List</a>
    </div>
</body>
</html>
