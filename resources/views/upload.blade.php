<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
</head>
<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
        <div>
            <a href="{{ asset('storage/' . session('path')) }}" target="_blank">Lihat File</a>
        </div>
    @endif

    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="file" name="file" required>
        </div>
        <div>
            <button type="submit">Upload</button>
        </div>
    </form>
</body>
</html>
