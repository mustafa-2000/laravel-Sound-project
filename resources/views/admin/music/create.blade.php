<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Music</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file -->
    <style>
        body {
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            font-family: 'Quicksand', sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent white */
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            padding: 40px; /* Increased padding */
            max-width: 600px; /* Increased max width */
            width: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #4A5568;
            font-size: 2.5rem; /* Increased font size */
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .success-message {
            background-color: #48BB78; /* Green */
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px; /* Increased margin for more gap */
            font-weight: bold;
            color: #4A5568;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #CBD5E0; /* Light gray */
            border-radius: 5px;
            transition: border-color 0.3s ease;
            margin-bottom: 20px; /* Added margin bottom to input fields */
        }

        input:focus, select:focus {
            border-color: #4A5568; /* Darker shade on focus */
            outline: none;
            box-shadow: 0 0 5px rgba(74, 85, 104, 0.5); /* Glow effect */
        }

        button {
            background-color: #4299E1; /* Blue */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-bottom: 10px; /* Margin for spacing */
        }

        button:hover {
            background-color: #2B6CB0; /* Darker shade on hover */
            transform: translateY(-2px);
        }

        .back-dashboard {
            background-color: #f6ad55; /* Orange */
            text-decoration: none; /* Remove underline */
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .back-dashboard:hover {
            background-color: #dd6b20; /* Darker orange shade on hover */
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem; /* Adjusted for smaller screens */
            }
            .container {
                padding: 30px; /* Reduced padding for smaller screens */
            }
            button {
                padding: 10px; /* Adjusted padding for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Add New Music</h1>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.storeMusic') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" required>
            </div>

            <div class="mb-4">
                <label for="artist">Artist</label>
                <input type="text" name="artist" id="artist" placeholder="Artist" required>
            </div>

            <div class="mb-4">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" placeholder="Year" required>
            </div>

            <div class="mb-4">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Add Music</button>
        </form>

        <button class="back-dashboard" onclick="window.location.href='{{ route('admin.dashboard') }}'">Back to Music Dashboard</button>
    </div>
</body>
</html>
