<!DOCTYPE html>
<html>
<head>
    <title>Add Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Add New Example</h2>

    <form action="{{ route('examples.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-primary">Save</button>
        <a href="{{ route('examples.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
