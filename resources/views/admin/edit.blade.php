    <h1>Edit Music</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('music.update', $music->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $music->title }}" required>
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Artist</label>
            <input type="text" name="artist" class="form-control" value="{{ $music->artist }}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" value="{{ $music->year }}" required>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" name="genre" class="form-control" value="{{ $music->genre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Music</button>
    </form>
@endsection
