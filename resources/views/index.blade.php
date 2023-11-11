<!DOCTYPE html>
<html>
<head>
    <title>Image to Sketch Converter</title>
</head>
<body>

<div>
    <form action="{{ route('convert') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Convert to Sketch</button>
    </form>

    @if(session('success'))
        <p>{{ session('success') }}</p>
        <img src="{{ asset('images/' . session('imageName')) }}" alt="Sketch Image">
    @endif
</div>

</body>
</html>
