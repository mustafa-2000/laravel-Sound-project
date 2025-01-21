<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file -->
    <title>Video List</title>
    <style>
        body {
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%), url('{{ asset('img/admin-background.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Quicksand', sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* White with transparency */
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 800px;
            overflow: hidden;
        }

        h1 {
            color: #4A5568;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .back-btn {
            display: block;
            text-align: center;
            margin-bottom: 20px; /* Space below the button */
            text-decoration: none;
            background-color: #4A5568; /* Darker color for the button */
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #2B6CB0; /* Darker shade on hover */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #4299E1;
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0; /* Light gray border */
        }

        tbody tr:hover {
            background-color: #edf2f7; /* Light gray on hover */
        }

        th {
            font-weight: 600;
        }

        a {
            color: #ffffff;
            text-decoration: none;
            background-color: #4A5568; /* Darker color for buttons */
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #2B6CB0; /* Darker shade on hover */
        }

        button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            background-color: #E53E3E;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #C53030;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            th, td {
                padding: 10px;
            }

            button {
                padding: 6px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Video List</h1>
        <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Dashboard</a> <!-- Button to go back to admin dashboard -->
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Director</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $video)
                <tr>
                    <td>{{ $video->title }}</td>
                    <td>{{ $video->director }}</td>
                    <td>{{ $video->year }}</td>
                    <td>
                        <a href="{{ route('admin.video.edit', $video->id) }}">Edit</a>
                        <form action="{{ route('admin.video.destroy', $video->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
